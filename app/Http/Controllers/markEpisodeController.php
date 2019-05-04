<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserEpisode;
use DB;

class markEpisodeController extends Controller
{
	public function markEpisode_ajax(Request $request){

		if($request->ajax()){

			$response = "";
			if($request->isActive == "save"){

				$save_userEpisode = new UserEpisode;
				$save_userEpisode->User_id = Auth::id();  //user id
				$save_userEpisode->Episode_id = $request->episode_id;
				$save_userEpisode->save();

				$response = "Marked";
			} else if($request->isActive == "delete"){

				UserEpisode::where([
					['Episode_id', $request->episode_id],
					['User_id', Auth::id()]
				])
				->delete();

				$response = "Unmarked";
			}
			return Response($response);
		}
	}
}
