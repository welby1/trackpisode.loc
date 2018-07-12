<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Genre;
use App\SerieGenre;
use DB;
class seriesController extends Controller
{
	public function showForm(){

		//data for select box
		$genres = Genre::where('id', '>', 0)->orderBy('name', 'asc')->get();

		return view('series.showForm')->with('genres', $genres);
	}

    public function addSeries(Request $request){
    	$serie = new Serie;
    	$serie_genre = new SerieGenre;

    	//inserting a serie
    	$serie->title = $request->input('title');
    	$serie->releaseYear = $request->input('releaseYear');
    	$serie->summary = $request->input('summary');
    	$serie->save();
    	//
    	//inserting genre for serie
    	$getTitle = $request->input('title');
		$serie = Serie::where('title', $getTitle)->first(['id']);
		$getValue = data_get($serie, 'id'); 		//get title value
    	$optionValue = $request->input('genres');	//get combo box value

		$serie_genre->Serie_id = $getValue;
    	$serie_genre->Genre_id = $optionValue;
		$serie_genre->save();
		//


		//echo $serie_genre; echo"<br>";
		//var_dump($optionValue);
    	return view('series.showForm');

    }
}
