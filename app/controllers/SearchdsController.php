<?php

class SearchdsController extends \BaseController {

	/**
	 * Display a listing of searchds
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
	
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
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		
		return View::make('searchds.create', compact('conf_id', 'conf_title'));
	}

	/**
	 * Store a newly created searchd in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
		$conf_id = Input::get('conf_id');
	
		$searchd = new Searchd;
		$searchd->listen = Input::get('listen');
		$searchd->log = Input::get('log');
		$searchd->query_log = Input::get('query_log');
		$searchd->pid_file = Input::get('pid_file');
		$searchd->save();
		
		$conf = Conf::where('id', '=', "$conf_id")->first();
		$conf->searchd_id = $searchd->id;
		$conf->save();
		return Redirect::action('SearchdsController@index', array('conf_id'=> $conf_id));
	}


	public function edit()
	{
	
	//get the configuration's id, get it's title, then get the id for the specific searchd block associated with this config
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		$id = Input::get('id');
	
	//we pass this object (i think it's called an object), or this instance of the model, because we'll display the currently set values for this searchd block.
		$searchd = Searchd::find($id);
	
		return View::make('searchds.edit', compact('conf_id', 'conf_title', 'searchd'));
		
	}

	/**
	 * Update the specified searchd in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	
	//get the configuration id, query the model to get it's title.
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		
	//query the searchd model to find our specific searchd block
		$searchd = Searchd::find($id);
	
	//update that row if the input is not empty. otherwise, we assume that they don't want to change that setting
		if(!empty(Input::get('listen'))){
		
			$searchd->listen = Input::get('listen');
		}
		
		if(!empty(Input::get('log'))){
		
			$searchd->log = Input::get('log');
		}
		
		if(!empty(Input::get('query_log'))){
		
			$searchd->query_log = Input::get('query_log');
		}
		
		if(!empty(Input::get('pid_file'))){
		
			$searchd->pid_file = Input::get('pid_file');
		}
	
		$searchd->update();
	
	//this query grabs the specific searchd row for this index (*there is only one searchd block per config*)
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
