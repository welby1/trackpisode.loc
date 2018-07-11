<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class seriesController extends Controller
{
	public function showForm(){
		return view('series.showForm');
	}

    public function addSeries(Request $request){
    	//print_r($request->input());
    	$title = $request->input('title');
    	$releaseYear = $request->input('releaseYear');
    	$summary = $request->input('summary');
 		$timestamps = true;

    	$data = array('title'=>$title, 'releaseYear'=>$releaseYear, 'summary'=>$summary);

    	DB::table('Series')->insert($data);


    	return "data inserted";	
    }
}
