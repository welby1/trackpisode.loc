<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\UserSerieStatus;

class StatusController extends Controller
{
    public function setStatus_ajax(Request $request){
    	if($request->ajax()){

    		if($request->serieStatus != "not_watching"){

    			$checkRecord = UserSerieStatus::where([
    				['Serie_id', $request->Serie_id],
    				['User_id', Auth::id()]
    			])->get();

    			if($checkRecord->isEmpty()){
    				$saveStatus = new UserSerieStatus;
	    			$saveStatus->Serie_id = $request->Serie_id;
	    			$saveStatus->User_id = Auth::id();
	    			$saveStatus->status = $request->serieStatus;
	    			$saveStatus->save();
    			} else {
    				UserSerieStatus::where('Serie_id', $request->Serie_id)
	    			->where('User_id', Auth::id())
	    			->update(['status' => $request->serieStatus]);
    			}
    		} else {
    			UserSerieStatus::where([
    				['Serie_id', $request->Serie_id],
    				['User_id', Auth::id()]
    			])->delete();
    		}
    	}
    }
}
