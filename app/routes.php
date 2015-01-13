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

Route::get('Confs/new', 'ConfsController@create');
Route::get('Confs/all', 'ConfsController@index');
Route::get('Confs/save', 'ConfsController@saveConf');

Route::post('sources/store', 'SourcesController@store');

Route::post('Confs/newIndex', 'ConfsController@store');
Route::get('Confs/newIndex', 'ConfsController@store');

Route::post('indices/store', 'IndicesController@store');

Route::post('searchds/store', 'SearchdsController@store');

Route::post('indexers/store', 'IndexersController@store');
Route::get('indexers/edit', 'IndexersController@edit');
Route::put('indexers/update/{$id}', 'IndexersController@update');

Route::resource('indices', 'IndicesController');

Route::resource('sources', 'SourcesController');

Route::resource('searchds', 'SearchdsController');

Route::resource('indexers', 'IndexersController');
