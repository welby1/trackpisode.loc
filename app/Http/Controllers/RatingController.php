<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Rating;
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
}
