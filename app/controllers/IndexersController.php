<?php

class IndexersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /indexers
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
		
		$passIndexers = DB::table('indexers')->join('confs', 'indexers.id', '=', 'indexer_id')->where('confs.id', '=', $conf_id)->get();

	
		$queries = DB::getQueryLog();
		$last_query = end($queries);
	
		return View::make('indexers.index', compact(array('passIndices', 'passSources', 'passSearchds', 'passIndexers', 'conf_id', 'conf_title', 'queries')));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /indexers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	
		
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');

		return View::make('indexers.create', compact('conf_title', 'conf_id'));
		
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /indexers
	 *
	 * @return Response
	 */
	public function store()
	{
	
	$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
	
		$indexer = new Indexer;
			$indexer->mem_limit = Input::get('mem_limit');
			$indexer->max_iops = Input::get('max_iops');
			$indexer->max_iosize = Input::get('max_iosize');
			$indexer->max_xmlpipe2_field = Input::get('max_xmlpipe2_field');
			$indexer->write_buffer = Input::get('write_buffer');
			$indexer->max_file_field_buffer = Input::get('max_file_field_buffer');
			$indexer->on_file_field_error = Input::get('on_file_field_error');
		$indexer->save();
		
		$conf = Conf::where('id', '=', "$conf_id")->first();
		$conf->indexer_id = $indexer->id;
		$conf->save();
		
		return Redirect::route('indexers.index', compact('conf_id', 'conf_title'));
	}

	/**
	 * Display the specified resource.
	 * GET /indexers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /indexers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
		$id = Input::get('id');

		$indexers = Indexer::find($id);
		
		return View::make('indexers.edit', compact('conf_title', 'conf_id', 'indexers'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /indexers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');

		
		$indexer = Indexer::find($id);
		
		if(!empty(Input::get('mem_limit'))){
		
			$indexer->mem_limit = Input::get('mem_limit');
		}
		
		if(!empty(Input::get('max_iops'))){
		
			$indexer->max_iops = Input::get('max_iops');
		}
		
		if(!empty(Input::get('max_iosize'))){
		
			$indexer->max_iosize = Input::get('max_iosize');
		}
		
		if(!empty(Input::get('max_xmlpipe2_field'))){
		
			$indexer->max_xmlpipe2_field = Input::get('max_xmlpipe2_field');
			
		}
		
		if(!empty(Input::get('write_buffer'))){
		
			$indexer->write_buffer = Input::get('write_buffer');
			
		}
		
		if(!empty(Input::get('max_file_field_buffer'))){
		
			$indexer->max_file_field_buffer = Input::get('max_file_field_buffer');
			
		}
		
		if(!empty(Input::get('on_file_field_error'))){
		
			$indexer->on_file_field_error = Input::get('on_file_field_error');
		
		}
		$indexer->update();
		
		return Redirect::route('indexers.index', compact('conf_id', 'conf_title'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /indexers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
