<?php

class SearchdsController extends \BaseController {

	/**
	 * Display a listing of searchds
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

		return View::make('searchds.index', compact(array('passSearchds', 'passSources', 'passIndices')));
	}

	/**
	 * Show the form for creating a new searchd
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('searchds.create');
	}

	/**
	 * Store a newly created searchd in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
	if($searchd = Searchd::find('1'))
	{
		$searchd = Searchd::find('1');
		$searchd->listen = Input::get('listen');
		$searchd->log = Input::get('log');
		$searchd->query_log = Input::get('query_log');
		$searchd->pid = Input::get('pid');
		$searchd->save();
		} else {
		
		$searchd = new Searchd;
		$searchd->listen = Input::get('listen');
		$searchd->log = Input::get('log');
		$searchd->query_log = Input::get('query_log');
		$searchd->pid = Input::get('pid');
		$searchd->save();
		}
		return Redirect::action('SearchdsController@index');
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
