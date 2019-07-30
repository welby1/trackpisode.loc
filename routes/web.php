<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

	//admin routes
	Route::get('/add_series', 'seriesController@addSeriesForm')->name('add_series_route');
	Route::post('/add_series', 'seriesController@addSeries');

	Route::get('/add_seasons', 'seriesController@addSeasonsForm')->name('add_seasons_route');
	Route::post('/add_seasons', 'seriesController@addSeasons');

	Route::get('/add_episodes', 'seriesController@addEpisodesForm')->name('add_episodes_route');
	Route::post('/add_episodes', 'seriesController@addEpisodes');

//ajax routes
Route::get('/search_serie', 'seriesController@loadSeries_ajax');
Route::get('/load_seasons', 'seriesController@loadSeasons_ajax');
Route::post('/mark_episode', 'markEpisodeController@markEpisode_ajax');
Route::post('/save_vote', 'RatingController@saveVote_ajax');
Route::post('/status', 'StatusController@setStatus_ajax');

//ajax comment route
Route::post('/comments/load/ajax', 'commentController@loadComments_ajax');
Route::middleware('auth')->group(function(){
	Route::post('/comment/add/ajax', 'commentController@addComment_ajax');
});


Route::get('/shows', 'seriesController@shows')->name('shows_route');
Route::get('/show/{id}', 'seriesController@showContent');

Route::get('/my-shows', 'myshowsController@index')->name('myshows_route');

/* Socialite authorization through Google or Vkontakte */
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
