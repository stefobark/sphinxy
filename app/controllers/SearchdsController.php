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
	
		$passSearchds = DB::select(DB::raw("select confs.id, searchds.* from confs, searchds where searchds.id = $conf_id"));
		
		
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
		$searchd = Searchd::findOrFail($id);

		return View::make('searchds.show', compact('searchd'));
	}

	/**
	 * Show the form for editing the specified searchd.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$searchd = Searchd::find($id);

		return View::make('searchds.edit', compact('searchd'));
	}

	/**
	 * Update the specified searchd in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$searchd = Searchd::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Searchd::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$searchd->update($data);

		return Redirect::route('searchds.index');
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
