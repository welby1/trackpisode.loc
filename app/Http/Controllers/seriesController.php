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

        $request->validate([
                    'title' => 'required',
                    'releaseYear' => 'required',
                    'summary' => 'required',
                    'genres' => 'required',
                    'posterPath' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                ]);
        //if inputs are valid to conditions then execute next lines 

        $data = $request->all();

        if($request->hasFile('posterPath')){

            $file = $request->file('posterPath');
            $destinationPath = 'upload/';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
        } else{
            
            $destinationPath = 'upload/';
            $fileName = 'default-image.jpg';
        }

        //add serie
        $serie = new Serie;

        $serie->title = $data['title'];
        $serie->releaseYear = $data['releaseYear'];
        $serie->summary = $data['summary'];
        //insert file path in the database field
        $serie->posterPath = $destinationPath . $fileName;
        $serie->save();
    
        //get serie id
        $getTitle = $request->input('title');
        $getSerieID = Serie::where('title', $getTitle)->first(['id']);
        $getSerieID = data_get($getSerieID, 'id');

        //if selected multiple genres
        foreach ($data['genres'] as $genre) {
            //add genres
            $serie_genre = new SerieGenre;

            $serie_genre->Serie_id = $getSerieID;
            $serie_genre->Genre_id = $genre;
            $serie_genre->save();
        }

        $genres = Genre::where('id', '>', 0)->orderBy('name', 'asc')->get();
        
        return view('series.showForm')->with('genres', $genres);
    }

    public function show(){

        $series = Serie::all();
        return view('series.shows')->with('series', $series);
    }
    public function showById($id){
        $serie = Serie::findOrFail($id);
        dd($serie->title,$serie->releaseYear,$serie->summary,$serie->posterPath);
    }
}
