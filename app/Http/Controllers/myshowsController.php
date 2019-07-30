<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myshowsController extends Controller
{
    public function index(){

    	$a = 1;
    	
    	return view('series.myShows', array('a' => $a));
    }
}
