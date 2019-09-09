<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use DB;

class filterDataController extends Controller
{
    public function getFilteredData(Request $request){

        if($request->ajax()){

            $output = '';
            $response = array();
            $doJoin = 0;
            $queryCondition = "";
            $selectedItems = json_decode($request->selectedItems, true);

            // IF any filter is selected, get data by filter(s) ELSE get all data
            if(!empty($selectedItems)){
                foreach($selectedItems as $key=>$k){
                    $queryCases = ["Year","Genre","Status"];
                    
                    if(in_array($k['type'], $queryCases)){
                        if(!empty($queryCondition)){
                            $queryCondition .= " AND";
                        }
                    }

                    switch($k['type']){
                        case "Year":
                            $queryCondition .= " Series.releaseYear=" . $k['selected'];
                            break;
                        case "Genre":
                            $queryCondition .= " Genres.name like '" . $k['selected'] . "'";
                            $doJoin = 1;
                            break;
                        case "Status":
                            $queryCondition .= " Series.status like '" . $k['selected'] . "'";
                            break;
                    }
                }

                // $filteredData = DB::table('Series')->whereRaw($queryCondition)->orderBy('Series.id', 'desc')->limit(6)->get();
                $filteredData = DB::table('Series')
                    ->select('Series.id', 'Series.releaseYear', 'Series.posterPath', 'Series.title')
                    ->whereRaw($queryCondition)
                    ->when($doJoin == 1, function($q){
                        return $q->join('SeriesGenres','SeriesGenres.Serie_id','=','Series.id')
                            ->join('Genres','Genres.id','=','SeriesGenres.Genre_id');
                    })
                    ->orderBy('Series.id', 'desc')
                    ->limit(6)
                    ->get();
                // todo when() instead of switch cases ;)

                if(!$filteredData->isEmpty()){
                    foreach($filteredData as $key=>$item){
                        $output .= '
                            <div class="col-lg-4">
                                <div class="imgBlock rounded" onclick="document.location.href=\'show/'.$item->id.'\'">
                                    <div class="hover-shadow"></div>
                                    <span class="show-year">'.$item->releaseYear.'</span>
                                    <img class="img-fluid" src="'.$item->posterPath.'">
                                </div>
                                <p class="textBlock text-center col-lg-12"><a href="show/'.$item->id.'">'.$item->title.'</a></p>
                            </div>';
                    }
                    // total records according the filter
                    $response['total_count'] = DB::table('Series')
                        ->whereRaw($queryCondition)
                        ->when($doJoin == 1, function($q){
                            return $q->join('SeriesGenres','SeriesGenres.Serie_id','=','Series.id')
                                ->join('Genres','Genres.id','=','SeriesGenres.Genre_id');
                        })
                        ->count();
                    $response['output'] = $output;
                }
                return Response(json_encode($response));

            } else {
                $series = Serie::orderBy('id', 'desc')->limit(6)->get();
                
                foreach($series as $key=>$item){
                    $output .= '
                        <div class="col-lg-4">
                            <div class="imgBlock rounded" onclick="document.location.href=\'show/'.$item->id.'\'">
                                <div class="hover-shadow"></div>
                                <span class="show-year">'.$item->releaseYear.'</span>
                                <img class="img-fluid" src="'.$item->posterPath.'">
                            </div>
                            <p class="textBlock text-center col-lg-12"><a href="show/'.$item->id.'">'.$item->title.'</a></p>
                        </div>
                    ';
                }
                $response['total_count'] = Serie::count();
                $response['output'] = $output;
                return Response(json_encode($response));
            }


        }
    }
}
