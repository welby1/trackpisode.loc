<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Genre;
use App\SerieGenre;
use App\Season;
use DB;
class seriesController extends Controller
{
    public function addSeriesForm(){

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
                    'posterPath' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                ]);
        //if inputs are valid to conditions then execute next lines 

        $data = $request->all();

        if($request->hasFile('posterPath')){

            $file = $request->file('posterPath');
            $destinationPath = '/upload/';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
        } else{

            $destinationPath = '/upload/';
            $fileName = 'default-image.jpg';
        }

        //add serie
        $serie = new Serie;

        $serie->title = $data['title'];
        $serie->releaseYear = $data['releaseYear'];
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

        $series = Serie::paginate(6);
        return view('series.shows')->with('series', $series);
    }

    public function showContent($id){
        
        $serie = Serie::findOrFail($id);
        // SELECT Genres.name
        // FROM Genres INNER JOIN SeriesGenres ON Genres.id = SeriesGenres.Genre_id
        // WHERE SeriesGenres.Serie_id = $serie
        $getGenreNamesById = Genre::select('name')->join('SeriesGenres', 'SeriesGenres.Genre_id', '=', 'Genres.id')->whereIn('Serie_id',$serie)->get();

        return view('series.showContent')->with('serie', $serie)->with('genres', $getGenreNamesById);
    }

    public function addSeasonsForm(){

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

        //checking for existance requested seasonNumber in 'Seasons' table for this serie
        if($result->isEmpty()){
            $season = new Season;
            $season->seasonNumber = $request->input('seasonNumber');
            $season->Serie_id = $request->input('series');
            $season->save();

            return redirect()->route('add_seasons_route');
        } else{
            //return redirect()->back()->withInput(['message' => 'Not allowed']);
            echo "Ths season already exists for this serie";
        }
    }




}