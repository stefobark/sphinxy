<?php

class IndicesController extends \BaseController {

	/**
	 * Display a listing of indices
	 *
	 * @return Response
	 */
	public function index()
	{
		$indices = Index::all();
		$passIndices = $indices->toArray();
	
		$sources = Source::all();
		$passSources = $sources->toArray();
	
		return View::make('indices.index', compact(array('passIndices', 'passSources')));
	}

	/**
	 * Show the form for creating a new index
	 *
	 * @return Response
	 */
	public function create()
	{
		$sources = Source::all();
		$passSources = $sources->toArray();
		
		$type = Input::get('type');
		
		if ($type == 'plain1'){
		return Redirect::action('SourcesController@chooseSource');
		}
		
		return View::make('indices.create', array('type'=>$type, 'passSources'=>$passSources));
	}

	/**
	 * Store a newly created index in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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
	

		return Redirect::route('indices.index');
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
	public function edit($id)
	{
		$index = Index::find($id);

		return View::make('indices.edit', compact('index'));
	}

	/**
	 * Update the specified index in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$index = Index::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Index::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$index->update($data);

		return Redirect::route('indices.index');
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
