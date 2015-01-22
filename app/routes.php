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

Route::get('/startIndexer', function()
{
	$conf_title = $_GET['conf_title'];
	$data = exec("indexer -c /var/www/html/configuration/public/$conf_title.conf mysql");
	return Response::json($data);
});

Route::get('chooseSource', 'SourcesController@chooseSource');

Route::get('Confs/new', 'ConfsController@create');
Route::post('Confs/newIndex', 'ConfsController@store');
Route::get('Confs/newIndex', 'ConfsController@store');
Route::get('Confs/all', 'ConfsController@index');
Route::get('Confs/save', 'ConfsController@saveConf');

Route::post('sources/store', 'SourcesController@store');
Route::get('sources/edit', 'SourcesController@edit');
Route::put('sources/update/{$id}', 'SourcesController@update');


Route::post('indices/store', 'IndicesController@store');
Route::get('indices/edit', 'IndicesController@edit');
Route::put('indices/update/{$id}', 'IndicesController@update');

Route::post('searchds/store', 'SearchdsController@store');
Route::get('searchds/edit', 'SearchdsController@edit');
Route::put('searchds/update/{$id}', 'SearchdsController@update');

Route::post('indexers/store', 'IndexersController@store');
Route::get('indexers/edit', 'IndexersController@edit');
Route::put('indexers/update/{$id}', 'IndexersController@update');

Route::resource('indices', 'IndicesController');

Route::resource('sources', 'SourcesController');

Route::resource('searchds', 'SearchdsController');

Route::resource('indexers', 'IndexersController');
