<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Serie;
use App\Season;
use App\Episode;
use App\UserEpisode;
use App\UserSerieStatus;
use DB;

class myshowsController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
		}
		
    public function index(){

		/* selects serie of user  
		SELECT s.id,s.title,s.releaseYear
		FROM Series s
		inner join UserSerieStatus uss on s.id = uss.Serie_id
		where uss.User_id=15;
		*/


		/* counts episodes of each serie for this user that are marked
		SELECT s.id,s.title,count(*) as markedEpisodesNumber
		FROM Series s
		INNER join Seasons ss on s.id = ss.Serie_id
		INNER join Episodes e on ss.id = e.Season_id
		inner join UsersEpisodes ue on e.id = ue.Episode_id
		where ue.User_id=15
		group by s.title,s.id;
		*/


		/*  selects total number of episodes for each serie (only series that user follows)
		select s.id,s.title, COUNT(*) as totalEpisodes
		from Series s
		INNER join Seasons ss on s.id = ss.Serie_id
		INNER join Episodes e on ss.id = e.Season_id
		where s.id in (select Serie_id from UserSerieStatus where User_id=15)
		GROUP by s.title,s.id

		*/

		// get user's followed(watching,planning,seen) series
		$getSeries = Serie::select('Series.id', 'Series.title', 'Series.releaseYear', 'Series.status', 'UserSerieStatus.status as UserStatus')
			->join('UserSerieStatus', 'UserSerieStatus.Serie_id', '=', 'Series.id')
			->where('UserSerieStatus.User_id', '=', Auth::id())
			->orderBy('Series.title', 'asc')
			->get();

		// get number of marked episodes for each serie of this user
		$countUserEpisodes = Serie::select('Series.id', 'Series.title', DB::raw('count(*) as markedEpisodesNumber'))
			->join('Seasons', 'Seasons.Serie_id', '=', 'Series.id')
			->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
			->join('UsersEpisodes', 'UsersEpisodes.Episode_id', '=', 'Episodes.id')
			->where('UsersEpisodes.User_id', '=', Auth::id())
			->groupBy('Series.id', 'Series.title')
			->get();

		// get number of episodes for each serie that is followed by user
		$countSerieEpisodes = Serie::select('Series.id', 'Series.title', DB::raw('count(*) as totalSerieEpisodes'))
			->join('Seasons', 'Seasons.Serie_id', '=', 'Series.id')
			->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
			->whereIn('Series.id', function($query){
				$query->select('Serie_id')->from('UserSerieStatus')->where('User_id', Auth::id());
			})
			->groupBy('Series.id', 'Series.title')
			->get();


    	return view('series.myShows', array(
    		'series' => $getSeries,
    		'userEpisodes' => $countUserEpisodes,
    		'serieEpisodes' => $countSerieEpisodes
    	));
    }
}
