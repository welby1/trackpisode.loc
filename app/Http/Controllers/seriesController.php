<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Serie;
use App\Genre;
use App\SerieGenre;
use App\Season;
use App\Episode;
use App\UserEpisode;
use App\Rating;
use App\Comment;
use App\UserSerieStatus;
use DB;
use Gate;
class seriesController extends Controller
{
    public function addSeriesForm(){

        //if user is not 'admin' then go to the 404 page
        if(!Gate::allows('isAdmin')){
            abort(404);
        }

        //data for select box
        $genres = Genre::where('id', '>', 0)->orderBy('name', 'asc')->get();

        return view('series.addSeriesForm')->with('genres', $genres);
    }

    public function addSeries(Request $request){
        $request->validate([
                    'title' => 'required',
                    'releaseYear' => 'required|min:4',
                    'summary' => 'required',
                    'genres' => 'required',
                    'status' => 'required',
                    'posterPath' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                ]);
        //if inputs are valid to conditions then execute next lines 
        $data = $request->all();
        if($request->hasFile('posterPath')){
            $file = $request->file('posterPath');
            $destinationPath = '/storage/posters/';
            $fileName = $file->getClientOriginalName();
            $file->storeAs('posters', $fileName);
        } else{
            $destinationPath = '/storage/posters/';
            $fileName = 'default-image.jpg';
        }
        //add serie
        $serie = new Serie;
        $serie->title = $data['title'];
        $serie->releaseYear = $data['releaseYear'];
        $serie->status = $data['status'];
        $serie->summary = $data['summary'];
        //insert file path in the database field
        $serie->posterPath = $destinationPath . $fileName;
        $serie->save();
        //get serie id
        $getTitle = $request->input('title');
        $getSerieID = Serie::where('title', $getTitle)->first(['id']);
        $getSerieID = data_get($getSerieID, 'id');
        //if selected multiple genres
        foreach ($data['genres'] as $genre) {
            //add genres
            $serie_genre = new SerieGenre;
            $serie_genre->Serie_id = $getSerieID;
            $serie_genre->Genre_id = $genre;
            $serie_genre->save();
        }
        $genres = Genre::where('id', '>', 0)->orderBy('name', 'asc')->get();
        return view('series.addSeriesForm')->with('genres', $genres);
    }

    public function shows(){

        $series = Serie::orderBy('id', 'desc')->limit(6)->get();
        $total_count = Serie::count();

        // dropdowns data
        $getYears = Serie::select('releaseYear')->orderBy('releaseYear', 'desc')->distinct()->get();
        $getGenres = Genre::select('name')->orderBy('name', 'asc')->get();
        $getStatuses = Serie::select('status')->orderBy('status', 'asc')->distinct()->get();


        return view('series.shows', array(
            'series' => $series,
            'total_count' => $total_count,
            'years' => $getYears,
            'genres' => $getGenres,
            'statuses' => $getStatuses
        ));
    }

    public function getMoreData(Request $request){

        if($request->ajax()){

            $output = '';
            $response = array();
            $doJoin = 0;
            $selectedItems = json_decode($request->selectedItems, true);
            $lastItemId = $request->lastItemId;

            foreach($selectedItems as $key=>$k){
                ($k['type'] == 'Genre') ? $doJoin = 1 : '';
            }

            $result = DB::table('Series')
                ->select('Series.id', 'Series.releaseYear', 'Series.posterPath', 'Series.title')
                ->where(function($q) use ($selectedItems){
                    foreach($selectedItems as $key=>$k){
                        $q->when($k['type'] == 'Status', function($q) use ($k){
                            return $q->where('Series.status', 'like', $k['selected']);
                        });
                        $q->when($k['type'] == 'Year', function($q) use ($k){
                            return $q->where('Series.releaseYear', $k['selected']);
                        });
                        $q->when($k['type'] == 'Genre', function($q) use ($k){
                            return $q->where('Genres.name', 'like', $k['selected']);
                        });
                    }
                })
                ->where('Series.id', '<', $lastItemId)
                ->when($doJoin == 1, function($q){
                    return $q->join('SeriesGenres','SeriesGenres.Serie_id','=','Series.id')
                        ->join('Genres','Genres.id','=','SeriesGenres.Genre_id');
                })
                ->orderBy('Series.id', 'desc')
                ->limit(6)
                ->get();

            if(!$result->isEmpty()){
                foreach($result as $key=>$item){
                    $output .= '
                        <div class="col-lg-4">
                            <div class="imgBlock rounded" onclick="document.location.href=\'show/'.$item->id.'\'">
                                <div class="hover-shadow"></div>
                                <span class="show-year">'.$item->releaseYear.'</span>
                                <img class="img-fluid" src="'.$item->posterPath.'">
                            </div>
                            <p class="textBlock text-center col-lg-12"><a href="show/'.$item->id.'">'.$item->title.'</a></p>
                        </div>';
                }
                $response['output'] = $output;
            }
            return Response(json_encode($response));
        }
    }

    public function showContent($id){
        
        $serie = Serie::findOrFail($id);

        // SELECT Genres.name
        // FROM Genres INNER JOIN SeriesGenres ON Genres.id = SeriesGenres.Genre_id
        // WHERE SeriesGenres.Serie_id = $serie
        $getGenreNamesById = Genre::select('name')->join('SeriesGenres', 'SeriesGenres.Genre_id', '=', 'Genres.id')->whereIn('Serie_id',$serie)->get();

        $getSeasons = Season::select('seasonNumber')->whereIn('Serie_id', $serie)->get();

        $getEpisodes = Episode::select('Episodes.*','Seasons.seasonNumber')
            ->join('Seasons', 'Seasons.id', '=', 'Episodes.Season_id')
            ->join('Series', 'Series.id', '=', 'Seasons.Serie_id')
            ->whereIn('Series.id',$serie)
            ->get();

        $user_id = Auth::id();

        $getMarkedUserEpisodes = UserEpisode::select('Episode_id')
            ->where('User_id', '=', $user_id)
            ->orderBy('Episode_id', 'asc')
            ->get();

        // getting serie rating
        $sumVotes = Rating::select('vote')->whereIn('Serie_id', $serie)->sum('vote');
        $countVotes = Rating::select('vote')->whereIn('Serie_id', $serie)->count();
        $countVotes == 0 ? $getRating = 0 : $getRating = number_format($sumVotes / $countVotes, 1);

        // getting the user's vote
        $userVote = Rating::where([
            ['User_id', $user_id],
            ['Serie_id', $serie->id]
        ])->get();

        //getting serie's comments
        $getComments = Comment::select('Comments.*', 'users.name')
            ->join('users', 'users.id', '=', 'Comments.User_id')
            ->where('Comments.Serie_id', '=', $id)
            ->orderBy('Comments.created_at', 'desc')
            ->limit(5)
            ->get();

        $totalComments = Comment::where('Serie_id', '=', $id)->count();

        // getting serie status for this user
        $getSerieStatus = UserSerieStatus::select('status')
            ->where([
                ['Serie_id', $id],
                ['User_id', Auth::id()]
            ])
            ->get();

        return view('series.showContent', array(
            'serie' => $serie,
            'genres' => $getGenreNamesById,
            'seasons' => $getSeasons,
            'episodes' => $getEpisodes,
            'markedEpisodes' => $getMarkedUserEpisodes,
            'serieRating' => $getRating,
            'totalVoted' => $countVotes,
            'userVote' => $userVote->toArray(),
            'comments' => $getComments,
            'totalComments' => $totalComments,
            'serieStatus' => $getSerieStatus->toArray()
        ));
    }
    
    public function get_IMDBrating(Request $request){
        if($request->ajax()){
            $serie = Serie::findOrFail($request->id);
            $IMDBdata = Serie::scraping_IMDB(Serie::search_IMDB($serie->title));

            return Response(json_encode($IMDBdata));
        }
    }

    public function addSeasonsForm(){

        //if user is not 'admin' then go to the 404 page
        if(!Gate::allows('isAdmin')){
            abort(404);
        }

        //data for select box
        $series = Serie::orderBy('title', 'asc')->get();
        return view('series.addSeasonsForm')->with('series', $series);
    }

    public function addSeasons(Request $request){

        $request->validate([
                    'seasonNumber' => 'required|max:3',
                ]);

        $serie = $request->input('series');
        $seasonNumber = $request->input('seasonNumber');

        $result = Season::select('seasonNumber')->where([
            ['Serie_id', $serie],
            ['seasonNumber', $seasonNumber]
        ])->get();


        /*
         * if requested seasonNumber doesnt exist for this serie_id in 'Seasons' table
         * then save seasonNumber in table
         * else show custom error message 
         */
        if($result->isEmpty()){
            $season = new Season;
            $season->seasonNumber = $request->input('seasonNumber');
            $season->Serie_id = $request->input('series');
            $season->save();

            return redirect()->route('add_seasons_route');
        } else{
            $series = Serie::orderBy('title', 'asc')->get();
            $seasonExistsError = "This season already exists for this serie";

            return view('series.addSeasonsForm')->with('series', $series)->with('seasonExistsError', $seasonExistsError);
        }
    }

    public function addEpisodesForm(){

        //if user is not 'admin' then go to the 404 page
        if(!Gate::allows('isAdmin')){
            abort(404);
        }

        return view('series.addEpisodesForm');
    }

    //post request
    public function addEpisodes(Request $request){

        /*
        SELECT e.id, e.title
        FROM Series s
        INNER JOIN Seasons ss ON s.id = ss.Serie_id
        INNER JOIN Episodes e ON ss.id = e.Season_id
        WHERE s.id=12 and ss.seasonNumber=1;
         */
        // calculating the next episode number based on the last existing number 
        function calc_EpisodeNumber($serie_id, $season_number){
            $lastEpisodeNumber = Serie::select('Episodes.ep_number')
                ->join('Seasons', 'Seasons.Serie_id', '=', 'Series.id')
                ->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
                ->where([
                    ['Series.id', $serie_id],
                    ['Seasons.seasonNumber', $season_number]
                ])
                ->orderBy('ep_number', 'desc')
                ->first();

            $episode_number = ($lastEpisodeNumber === null) ? 1 : $lastEpisodeNumber->ep_number + 1;

            return $episode_number;
        }

        // hidden fields
        $serieId = $request->input('serieId');
        $seasonNumber = $request->input('seasonNumber');
        
        $episode = new Episode;
        $episode->title = $request->input('episodeTitle');
        $episode->ep_number = calc_EpisodeNumber($serieId, $seasonNumber);
        $episode->airdate = $request->input('airdate');
        $episode->Season_id = $request->input('seasons');
        $episode->save();

        return redirect()->route('add_episodes_route');
    }

    //load async data in suggestion list
    public function loadSeries_ajax(Request $request){

        if($request->ajax()){
            $output = "";
            $searchSerie = $request->input('searchSerie');
            $searchHeaderSerie = $request->input('searchHeaderSerie');

            //when searching serie on 'adding episode' page
            if(isset($searchSerie)){
                //get searching value
                $searchSerie = $request->input('searchSerie');
                //select data according searching value
                $series = Serie::where('title', 'like', '%'.$searchSerie.'%')->get();

                foreach ($series as $serie) {
                    $output .= '<li class="li-custom" data-id="'.$serie->id.'">'.$serie->title.'</li>';
                }
            }
            //when searching serie from the header input
            else if(isset($searchHeaderSerie)){
                //get searching value
                $searchHeaderSerie = $request->input('searchHeaderSerie');
                //select data according searching value
                $series = Serie::where('title', 'like', '%'.$searchHeaderSerie.'%')->get();

                foreach ($series as $serie) {
                    $output .= '<li class="li-custom" data-id="'.$serie->id.'"><a href="/show/'.$serie->id.'">'.$serie->title.'</a></li>';
                    // <li data-id="{id}"><a href="shows/{id}">text</a></li>
                }
            }
            return Response($output);
        }
    }

    //load async data in select box
    public function loadSeasons_ajax(Request $request){

        if($request->ajax()){
            $output = "";

            $getSerie_id = $request->getSerie_id;

            $seasons = Season::where('Serie_id', $getSerie_id)->orderBy('seasonNumber', 'asc')->get();

            foreach ($seasons as $season) {
                $output .= '<option value="'.$season->id.'">'.$season->seasonNumber.'</option>';
            }
            return Response($output);
        }
    }


}