<?php

namespace App\Http\Controllers;

use App\showProgress;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Season;
use App\Episode;
use App\UserEpisode;
use App\UserSerieStatus;
use App\Serie;


class showProgressController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        /* get series with status='watching' which have unmarked episodes in usersEpisodes table ...(title||counts unseenEpisodes )
        SELECT s.id,s.title,count(*) as unmarkedEpisodes
        FROM Series s
        INNER join Seasons ss on s.id = ss.Serie_id
        INNER join Episodes e on ss.id = e.Season_id
        where s.id in (select Serie_id from UserSerieStatus where status='watching' and User_id=15) and
        e.id not in (select Episode_id from UsersEpisodes where User_id = 15)
        group by s.title,s.id; 
        */

        /* get user's series with counting seen episodes for each serie that got 'watching' status
        SELECT s.id,s.title,count(*) as markedEpisodesNumber
        FROM Series s
        INNER join Seasons ss on s.id = ss.Serie_id
        INNER join Episodes e on ss.id = e.Season_id
        inner join UsersEpisodes ue on e.id = ue.Episode_id
        where ue.User_id=15 and s.id in (select Serie_id from UserSerieStatus where status='watching')
        group by s.title,s.id;
        */

        /* unseen episodes for each season for current user_id
        SELECT s.id, s.title, ss.seasonNumber, COUNT(*) AS unseen_Episodes
        FROM Series s
        INNER JOIN Seasons ss ON s.id = ss.Serie_id
        INNER JOIN Episodes e ON ss.id = e.Season_id
        WHERE e.id NOT IN (SELECT Episode_id FROM UsersEpisodes WHERE User_id = 15) AND 
              s.id IN (SELECT Serie_id FROM UserSerieStatus WHERE status = 'watching')
        GROUP BY s.title, s.id, ss.seasonNumber;
        */

        /* shows serie and title of unseen episodes for current user
        SELECT s.id,s.title,e.id as 'title_id',e.title as 'title_episode'
        FROM Series s
        INNER join Seasons ss on s.id = ss.Serie_id
        INNER join Episodes e on ss.id = e.Season_id
        where s.id in (select Serie_id from UserSerieStatus where status='watching' and User_id=15) and
        e.id not in (select Episode_id from UsersEpisodes where User_id = 15)
        group by s.id,s.title,e.id,e.title
        order by e.id ASC;
        */

        // shows for each serie a number of unmarked episodes for current user 
        $getSeries = Serie::select('Series.id','Series.title','Series.posterPath',DB::raw('count(*) as unmarkedEpisodes'))
            ->join('Seasons', 'Seasons.Serie_id', '=', 'Series.id')
            ->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
            ->whereIn('Series.id', function($query){
                $query->select('UserSerieStatus.Serie_id')->from('UserSerieStatus')->where([['UserSerieStatus.status', '=', 'watching'],['UserSerieStatus.User_id', '=', Auth::id()]]);
            })
            ->whereNotIn('Episodes.id', function($query){
                $query->select('UsersEpisodes.Episode_id')->from('UsersEpisodes')->where('UsersEpisodes.User_id', '=', Auth::id());
            })
            ->groupBy('Series.title','Series.id')
            ->get();

        // shows only seasons which have unmarked episodes
        $getSeasons = Season::select('seasonNumber','Serie_id',DB::raw('count(Serie_id) as unwatched'))
            ->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
            ->whereIn('Serie_id', function($query){
                $query->select('UserSerieStatus.Serie_id')->from('UserSerieStatus')->where([['UserSerieStatus.status', '=', 'watching'],['UserSerieStatus.User_id', '=', Auth::id()]]);
            })
            ->whereNotIn('Episodes.id', function($query){
                $query->select('UsersEpisodes.Episode_id')->from('UsersEpisodes')->where('UsersEpisodes.User_id', '=', Auth::id());
            })
            ->groupBy('seasonNumber','Serie_id')
            ->orderBy('Serie_id', 'ASC')
            ->get();

        // shows serie and title of unseen episodes for current user
        $getEpisodes = Serie::select('Series.id','Series.title','Episodes.id as episode_id','Episodes.ep_number','Episodes.title as episode_title','Episodes.airdate','Seasons.seasonNumber')
            ->join('Seasons', 'Seasons.Serie_id', '=', 'Series.id')
            ->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
            ->whereIn('Series.id', function($query){
                $query->select('UserSerieStatus.Serie_id')->from('UserSerieStatus')->where([['UserSerieStatus.status', '=', 'watching'],['UserSerieStatus.User_id', '=', Auth::id()]]);
            })
            ->whereNotIn('Episodes.id', function($query){
                $query->select('UsersEpisodes.Episode_id')->from('UsersEpisodes')->where('UsersEpisodes.User_id', '=', Auth::id());
            })
            ->groupBy('Series.title', 'Series.id', 'Episodes.id', 'Episodes.title')
            ->orderBy('Episodes.id', 'ASC')
            ->get();

        return view('series.show_progress', array(
            'series' => $getSeries,
            'seasons' => $getSeasons,
            'episodes' => $getEpisodes
        ));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\showProgress  $showProgress
     * @return \Illuminate\Http\Response
     */
    public function show(showProgress $showProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\showProgress  $showProgress
     * @return \Illuminate\Http\Response
     */
    public function edit(showProgress $showProgress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\showProgress  $showProgress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, showProgress $showProgress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\showProgress  $showProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(showProgress $showProgress)
    {
        //
    }
}
