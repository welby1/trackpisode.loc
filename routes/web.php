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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add_series', 'seriesController@addSeriesForm')->name('add_series_route');
Route::post('/add_series', 'seriesController@addSeries');

Route::get('/shows', 'seriesController@shows')->name('shows_route');
Route::get('/show/{id}', 'seriesController@showContent');