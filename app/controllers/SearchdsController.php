<?php

class SearchdsController extends \BaseController {

	/**
	 * Display a listing of searchds
	 *
	 * @return Response
	 */
	public function index()
	{
		$searchds = Searchd::all();

		return View::make('searchds.index', compact('searchds'));
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
		$validator = Validator::make($data = Input::all(), Searchd::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Searchd::create($data);

		return Redirect::route('searchds.index');
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
