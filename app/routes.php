<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('chooseSource', 'SourcesController@chooseSource');

Route::post('sources/store', 'SourcesController@store');

Route::post('indices/store', 'IndicesController@store');

Route::resource('indices', 'IndicesController');

Route::resource('sources', 'SourcesController');

Route::resource('searchds', 'SearchdsController');
