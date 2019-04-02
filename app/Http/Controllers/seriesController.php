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

            if($request->hasFile('posterPath')){

                $request->validate([
                    'posterPath' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                ]);
                //if input 'posterPath' valid to conditions then execute next lines 

                $file = $request->file('posterPath');
                $destinationPath = 'upload/';
                $fileName = $file->getClientOriginalName();
                $file->move($destinationPath, $fileName);

                //insert the full path of uploaded file in the database field
                $serie->posterPath = $destinationPath . $fileName;
            }

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
