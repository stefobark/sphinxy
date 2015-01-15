<?php

class SearchdsController extends \BaseController {

	/**
	 * Display a listing of searchds
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
	
		$passIndices = DB::table('indices')->join('conf_indexes', 'indices.id', '=', 'index_id')->where('conf_id', '=', $conf_id)->get();
	
		$passSources = DB::table('sources')->join('conf_sources', 'sources.id', '=', 'source_id')->where('conf_id', '=', $conf_id)->get();
	
		$passSearchds = DB::table('searchds')->join('confs', 'searchds.id', '=', 'searchd_id')->where('confs.id', '=', $conf_id)->get();
		
		
		return View::make('searchds.index', compact('passSearchds', 'passSources', 'passIndices', 'conf_id', 'conf_title'));
	}

	/**
	 * Show the form for creating a new searchd
	 *
	 * @return Response
	 */
	public function create()
	{
	
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
		
		return View::make('searchds.create', compact('conf_id', 'conf_title'));
	}

	/**
	 * Store a newly created searchd in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
	$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
	
		$searchd = new Searchd;
		$searchd->listen = Input::get('listen');
		$searchd->log = Input::get('log');
		$searchd->query_log = Input::get('query_log');
		$searchd->pid = Input::get('pid');
		$searchd->save();
		
		$conf = Conf::where('id', '=', "$conf_id")->first();
		$conf->searchd_id = $searchd->id;
		$conf->save();
		return Redirect::action('SearchdsController@index', array('conf_id'=> $conf_id, 'conf_title'=> $conf_title));
	}

	/**
	 * Display the specified searchd.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified searchd.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
	
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
		$id = Input::get('id');

		$searchd = Searchd::find($id);
		
		return View::make('searchds.edit', compact('conf_title', 'conf_id', 'searchd'));
		
	}

	/**
	 * Update the specified searchd in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
		
		$searchd = Searchd::find($id);
		
		if(!empty(Input::get('listen'))){
		
			$searchd->listen = Input::get('listen');
		}
		
		if(!empty(Input::get('log'))){
		
			$searchd->log = Input::get('log');
		}
		
		if(!empty(Input::get('query_log'))){
		
			$searchd->query_log = Input::get('query_log');
		}
		
		if(!empty(Input::get('pid'))){
		
			$searchd->pid = Input::get('pid');
		}
	
		$searchd->update();
		
		$passSearchds = DB::table('searchds')->join('confs', 'searchds.id', '=', 'searchd_id')->where('confs.id', '=', $conf_id)->get();

				return Redirect::route('searchds.index', compact('conf_id', 'conf_title', 'passSearchds'));
	}

	/**
	 * Remove the specified searchd from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Searchd::destroy($id);

		return Redirect::route('searchds.index');
	}

}
