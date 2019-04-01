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

        $data = $request->all();

        $serie = new Serie;
        
        //inserting serie in Serie model
        if(!empty($data['title'] && $data['releaseYear'] && $data['summary'])){
            
            $serie->title = $data['title'];
            $serie->releaseYear = $data['releaseYear'];
            $serie->summary = $data['summary'];
            $serie->save();
        }

        //inserting genres in SerieGenre model
        if(!empty($data['genres'])){
            
            //get serie id
            $getTitle = $request->input('title');
            $getSerieID = Serie::where('title', $getTitle)->first(['id']);
            $getSerieID = data_get($getSerieID, 'id');

            //if selected multiple genres
            foreach ($data['genres'] as $genre) {

                $serie_genre = new SerieGenre;

                $serie_genre->Serie_id = $getSerieID;
                $serie_genre->Genre_id = $genre;
                $serie_genre->save();
            }
        }

        $genres = Genre::where('id', '>', 0)->orderBy('name', 'asc')->get();
        
        return view('series.showForm')->with('genres', $genres);
    }
}
