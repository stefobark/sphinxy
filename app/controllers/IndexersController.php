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
		$indices = Index::all();
		$passIndices = $indices->toArray();
	
		$sources = Source::all();
		$passSources = $sources->toArray();
		
		$searchds = Searchd::find(1);
		$passSearchds = $searchds->toArray();
		
		$indexers = Indexer::find(1);
		$passIndexers = $indexers->toArray();
	
		return View::make('indexers.index', compact(array('passIndices', 'passSources', 'passSearchds', 'passIndexers')));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /indexers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$indices = Index::all();
		$passIndices = $indices->toArray();
	
		$sources = Source::all();
		$passSources = $sources->toArray();
	
		return View::make('indexers.create', compact(array('passIndices', 'passSources')));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /indexers
	 *
	 * @return Response
	 */
	public function store()
	{
	
	if($indexer = Indexer::find('1'))
	{
		$indexer = Indexer::find('1');
			$indexer->mem_limit = Input::get('mem_limit');
			$indexer->max_iops = Input::get('max_iops');
			$indexer->max_iosize = Input::get('max_iosize');
			$indexer->max_xmlpipe2_field = Input::get('max_xmlpipe2_field');
			$indexer->write_buffer = Input::get('write_buffer');
			$indexer->max_file_field_buffer = Input::get('max_file_field_buffer');
			$indexer->on_file_field_error = Input::get('on_file_field_error');
		$indexer->save();
	} else {
		$indexer = new Indexer;
			$indexer->mem_limit = Input::get('mem_limit');
			$indexer->max_iops = Input::get('max_iops');
			$indexer->max_iosize = Input::get('max_iosize');
			$indexer->max_xmlpipe2_field = Input::get('max_xmlpipe2_field');
			$indexer->write_buffer = Input::get('write_buffer');
			$indexer->max_file_field_buffer = Input::get('max_file_field_buffer');
			$indexer->on_file_field_error = Input::get('on_file_field_error');
		$indexer->save();
		}
		return Redirect::route('indexers.index');
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
	public function edit($id)
	{
		//
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
		//
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
