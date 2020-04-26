<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Season;
use App\Episode;
use App\UserEpisode;
use App\UserSerieStatus;
use App\Serie;

class profileController extends Controller
{
    public function index($id){
        if($id == Auth::id()){
            $user = Auth::user();

            // 1st chart episodes data
            $unseenEpisodes = Serie::select('Series.id','Series.title','Episodes.id as episode_id','Episodes.ep_number','Episodes.title as episode_title')
                ->join('Seasons', 'Seasons.Serie_id', '=', 'Series.id')
                ->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
                ->whereIn('Series.id', function($query){
                    $query->select('UserSerieStatus.Serie_id')->from('UserSerieStatus')->where([['UserSerieStatus.status', '=', 'watching'],['UserSerieStatus.User_id', '=', Auth::id()]]);
                })
                ->whereNotIn('Episodes.id', function($query){
                    $query->select('UsersEpisodes.Episode_id')->from('UsersEpisodes')->where('UsersEpisodes.User_id', '=', Auth::id());
                })
                ->groupBy('Series.title', 'Series.id', 'Episodes.id', 'Episodes.title')
                ->orderBy('Episodes.id', 'ASC')
                ->get()
                ->count();

            $seenEpisodes = Serie::select('Series.id','Series.title','Episodes.id as episode_id','Episodes.ep_number','Episodes.title as episode_title')
                ->join('Seasons', 'Seasons.Serie_id', '=', 'Series.id')
                ->join('Episodes', 'Episodes.Season_id', '=', 'Seasons.id')
                ->whereIn('Series.id', function($query){
                    $query->select('UserSerieStatus.Serie_id')->from('UserSerieStatus')->where([['UserSerieStatus.status', '=', 'watching'],['UserSerieStatus.User_id', '=', Auth::id()]]);
                })
                ->whereIn('Episodes.id', function($query){
                    $query->select('UsersEpisodes.Episode_id')->from('UsersEpisodes')->where('UsersEpisodes.User_id', '=', Auth::id());
                })
                ->groupBy('Series.title', 'Series.id', 'Episodes.id', 'Episodes.title')
                ->orderBy('Episodes.id', 'ASC')
                ->get()
                ->count();

            $dataPoints = array( 
                array("label" => "Seen episodes", "symbol" => "seen", "y" => $seenEpisodes),
                array("label" => "Unseen episodes", "symbol" => "unseen", "y" => $unseenEpisodes),
            );

            // 2nd chart series data
            $watchingSeries = Serie::select('Series.id', 'Series.title', 'UserSerieStatus.status as UserStatus')
            ->join('UserSerieStatus', 'UserSerieStatus.Serie_id', '=', 'Series.id')
            ->where([
                ['UserSerieStatus.User_id', '=', Auth::id()],
                ['UserSerieStatus.status', '=', 'watching']
            ])
            ->orderBy('Series.title', 'asc')
            ->get()
            ->count();

            $seenSeries = Serie::select('Series.id', 'Series.title', 'UserSerieStatus.status as UserStatus')
            ->join('UserSerieStatus', 'UserSerieStatus.Serie_id', '=', 'Series.id')
            ->where([
                ['UserSerieStatus.User_id', '=', Auth::id()],
                ['UserSerieStatus.status', '=', 'seen']
            ])
            ->orderBy('Series.title', 'asc')
            ->get()
            ->count();

            $planningSeries = Serie::select('Series.id', 'Series.title', 'UserSerieStatus.status as UserStatus')
            ->join('UserSerieStatus', 'UserSerieStatus.Serie_id', '=', 'Series.id')
            ->where([
                ['UserSerieStatus.User_id', '=', Auth::id()],
                ['UserSerieStatus.status', '=', 'planning']
            ])
            ->orderBy('Series.title', 'asc')
            ->get()
            ->count();

            $seriesPoints = array( 
                array("label" => "Watching", "y" => $watchingSeries),
                array("label" => "Seen", "y" => $seenSeries),
                array("label" => "Planning", "y" => $planningSeries),
            );

            return view('profile.user-profile', array(
                'user' => $user,
                'dataPoints' => $dataPoints,
                'seriesPoints' => $seriesPoints
            )); 
        } else {
            abort(404);
        }
    }
}
