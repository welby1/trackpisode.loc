<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Rating;
use App\User;
use App\Serie;
use DB;

class RatingController extends Controller
{
    public function saveVote_ajax(Request $request){

    	if($request->ajax()){

    		$response = array();

    		if($request->operation == "save"){
	    		$save_userVote = new Rating;
	    		$save_userVote->Serie_id = $request->Serie_id;
	    		$save_userVote->User_id = Auth::id();
	    		$save_userVote->vote = $request->voteValue;
	    		$save_userVote->save();

		    	// Asynchronously showing the rating
	    		$sumVotes = Rating::select('vote')
	    			->where('Serie_id', $request->Serie_id)
	    			->sum('vote');

	    		$countVotes = Rating::select('vote')
	    			->where('Serie_id', $request->Serie_id)
	    			->count();

	    		$response['rating'] = number_format($sumVotes / $countVotes, 1);
	    		
	    	} else if($request->operation == "update"){
	    		Rating::where('User_id', Auth::id())
	    			->where('Serie_id', $request->Serie_id)
	    			->update(['vote' => $request->voteValue]);

	    		// Asynchronously showing the rating
	    		$sumVotes = Rating::select('vote')
	    			->where('Serie_id', $request->Serie_id)
	    			->sum('vote');

	    		$countVotes = Rating::select('vote')
	    			->where('Serie_id', $request->Serie_id)
	    			->count();

	    		$response['rating'] = number_format($sumVotes / $countVotes, 1);
	    	}
    		return Response(json_encode($response));
    	}
	}
	
	public function index(){

		/*
			SELECT 	s.id,
					s.title,
					s.status,
					round( avg(r.vote), 1 ) as rating,
					count( DISTINCT uss.User_id ) as watching,
					round( count(DISTINCT uss.User_id) / (select count(*) from users) * 100, 2 ) as audience
			FROM Series s
			inner JOIN Ratings r ON s.id = r.Serie_id
			left JOIN UserSerieStatus uss ON s.id = uss.Serie_id
			GROUP by s.title
			order by rating desc
			limit 50;
		*/

		$totalUsers = User::select()->count();

		$getSeries = Serie::select('Series.id', 'Series.title', 'Series.status', DB::raw("round(avg(Ratings.vote), 1) as rating, count(distinct UserSerieStatus.User_id) as watching, round(count(distinct UserSerieStatus.User_id) / '$totalUsers' * 100, 2) as audience"))
			->join('Ratings', 'Ratings.Serie_id', '=', 'Series.id')
			->leftJoin('UserSerieStatus', 'Series.id', '=', 'UserSerieStatus.Serie_id')
			->groupBy('Series.title')
			->orderBy('rating', 'DESC')
			->limit(50)
			->get();
		
		return view('series.ratings', array(
			'series' => $getSeries
		)); 
	}
}
