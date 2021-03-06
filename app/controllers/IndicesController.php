<?php

class IndicesController extends \BaseController {

	/**
	 * Display a listing of indices
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
	
		$queries = DB::getQueryLog();
		$last_query = end($queries);
	
		return View::make('indices.index', compact('passIndices', 'passSources', 'conf_title', 'conf_id', 'queries'));
	}

	/**
	 * Show the form for creating a new index
	 *
	 * @return Response
	 */
	public function create()
	{
		$type = Input::get('type');
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
	
		
		$passSources = DB::table('sources')->join('conf_sources', 'sources.id', '=', 'source_id')->where('conf_id', '=', $conf_id)->get();
		
		
		if ($type == 'plain1'){
		
			$conf_id = Input::get('conf_id');
			$conf_title = Input::get('conf_title');
			return Redirect::action('SourcesController@chooseSource', compact('conf_id', 'conf_title'));
			
		}
	
			return View::make('indices.create', compact('type', 'passSources', 'conf_id', 'conf_title'));
		
	}
	

	/**
	 * Store a newly created index in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
	$conf_id = Input::get('conf_id');
	$conf = Conf::find("$conf_id");
	$conf_title = $conf->title;
	
	$index = new Index;
		$index->i_name = Input::get('i_name');
		$index->type = Input::get('type');
		$index->agent = Input::get('agent');
		$index->agent_persistent = Input::get('agent_persistent');
		$index->agent_blackhole = Input::get('agent_blackhole');
		$index->agent_connect_timeout = Input::get('agent_connect_timeout');
		$index->agent_query_timeout = Input::get('agent_query_timeout');
		$index->ha_strategy = Input::get('ha_strategy');
		$index->ha_period_karma = Input::get('ha_period_karma');
		$index->ha_ping_interval = Input::get('ha_ping_interval');
		$index->source = Input::get('source');
		$index->path = Input::get('path');
		$index->docinfo = Input::get('docinfo');
		$index->index_sp = Input::get('index_sp');
		$index->index_zones = Input::get('index_zones');
		$index->html_strip = Input::get('html_strip');
		$index->html_index_attrs = Input::get('html_index_attrs');
		$index->morphology = Input::get('morphology');
		$index->min_stemming_len = Input::get('min_stemming_len');
		$index->stopwords = Input::get('stopwords');
		$index->wordforms = Input::get('wordforms');
		$index->embedded_limit = Input::get('embedded_limit');
		$index->exceptions = Input::get('exceptions');
		$index->rt_field = Input::get('rt_field');
		$index->rt_attr = Input::get('rt_attr');
	$index->save();
	
		$confIndex = new ConfIndex();
		$confIndex->index_id = $index->id;
		$confIndex->conf_id = $conf_id;
		$confIndex->save();

	
		return Redirect::action('IndicesController@index', compact('conf_id'));
	}

	/**
	 * Display the specified index.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$index = Index::findOrFail($id);

		return View::make('indices.show', compact('index'));
	}

	/**
	 * Show the form for editing the specified index.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		$id = Input::get('id');
		$type = Input::get('type');
		$indices = Index::find($id);
		
		$passSources = DB::table('sources')->join('conf_sources', 'sources.id', '=', 'source_id')->where('conf_id', '=', $conf_id)->get();
		
		return View::make('indices.edit', compact('conf_title', 'conf_id', 'indices', 'type', 'passSources'));
	}

	/**
	 * Update the specified index in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
	
		$index = Index::findOrFail($id);

		if(!empty(Input::get('agent'))){
		
			$index->agent = Input::get('agent');
		}

		if(!empty(Input::get('agent_blackhole'))){
		
			$index->agent_blackhole = Input::get('agent_blackhole');
		}

		if(!empty(Input::get('agent_connect_timeout'))){
		
			$index->agent_connect_timeout = Input::get('agent_connect_timeout');
		}
		
		if(!empty(Input::get('agent_persistent'))){
		
			$index->agent_persistent = Input::get('agent_persistent');
		}
		
		if(!empty(Input::get('agent_query_timeout'))){
		
			$index->agent_query_timeout = Input::get('agent_query_timeout');
		}
		
		if(!empty(Input::get('ha_strategy'))){
		
			$index->ha_strategy = Input::get('ha_strategy');
		}
		
		if(!empty(Input::get('ha_ping_interval'))){
		
			$index->ha_ping_interval = Input::get('ha_ping_interval');
		}
		
		if(!empty(Input::get('ha_period_karma'))){
		
			$index->ha_period_karma = Input::get('ha_period_karma');
		}
		
		if(!empty(Input::get('source'))){
		
			$index->source = Input::get('source');
		}
		
		if(!empty(Input::get('path'))){
		
			$index->path = Input::get('path');
		}
		
		if(!empty(Input::get('docinfo'))){
		
			$index->docinfo = Input::get('docinfo');
		}
		
		if(!empty(Input::get('morphology'))){
		
			$index->morphology = Input::get('morphology');
		}
		
		if(!empty(Input::get('index_sp'))){
		
			$index->index_sp = Input::get('index_sp');
		}
		
		if(!empty(Input::get('index_zones'))){
		
			$index->index_zones = Input::get('index_zones');
		}
		
		if(!empty(Input::get('html_strip'))){
		
			$index->html_strip = Input::get('html_strip');
		}
		
		if(!empty(Input::get('min_stemming_len'))){
		
			$index->min_stemming_len = Input::get('min_stemming_len');
		}
		
		if(!empty(Input::get('stopwords'))){
		
			$index->stopwords = Input::get('stopwords');
		}
		
		if(!empty(Input::get('wordforms'))){
		
			$index->wordforms = Input::get('wordforms');
		}
		
		if(!empty(Input::get('embedded_limit'))){
		
			$index->embedded_limit = Input::get('embedded_limit');
		}
		
		if(!empty(Input::get('exceptions'))){
		
			$index->exceptions = Input::get('exceptions');
		}
		
		if(!empty(Input::get('html_index_attrs'))){
		
			$index->html_index_attrs = Input::get('html_index_attrs');
		}
		
		if(!empty(Input::get('rt_field'))){
		
			$index->rt_field = Input::get('rt_field');
		}
		
		if(!empty(Input::get('rt_attr'))){
		
			$index->rt_attr = Input::get('rt_attr');
		}
		
		$index->update();

		return Redirect::route('indices.index', compact('conf_title', 'conf_id', 'index'));
	}

	/**
	 * Remove the specified index from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Index::destroy($id);

		return Redirect::route('indices.index');
	}

}
