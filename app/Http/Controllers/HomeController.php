<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Rating;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get top 6 rated series
        $series = Serie::select('Series.*', DB::raw('COUNT(vote) as numberOFvotes, SUM(vote) / COUNT(vote) as rating'))
        ->join('Ratings', 'Ratings.Serie_id', '=', 'Series.id')
        ->groupBy('Ratings.Serie_id')
        ->orderBy('rating', 'desc')
        ->limit(6)
        ->get();

        /* Clear SQL
        SELECT COUNT(vote) as numberofvote, SUM(vote) / COUNT(vote) as rating,Series.title
        FROM `Ratings` join Series on Ratings.Serie_id = Series.id
        GROUP by Ratings.Serie_id
        order by rating desc
        LIMIT 6
        */

        return view('home', array('series' => $series));
    }
}

