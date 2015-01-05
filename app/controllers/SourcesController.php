<?php

class SourcesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sources
	 *
	 * @return Response
	 */
	public function index()
	{
		$sources = Source::all();
		$passSources = $sources->toArray();
		
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
		
		return View::make('sources.index', array('passSources'=>$passSources, 'conf_id'=>$conf_id, 'conf_title'=>$conf_title));
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sources/create
	 *
	 * @return Response
	 */
	public function chooseSource()
	{
		$conf_id = Input::Get('conf_id');
		$conf_title = Input::get('conf_title');
		return View::make('sources.chooseSource', array('conf_id'=>$conf_id, 'conf_title'=>$conf_title));
	}
	
	public function create()
	{
	$source_type = Input::get('source_type');
	$conf_id = Input::get('conf_id');
	$conf_title = Input::get('conf_title');
	
		return View::make('sources.create', array('source_type'=>$source_type, 'conf_id'=>$conf_id, 'conf_title'=>$conf_title));

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sources
	 *
	 * @return Response
	 */
	public function store()
	{
		$conf_title = Input::get('conf_title');
		$conf_id = Input::get('conf_id');
		
		$conf = Conf::orderby('created_at', 'desc')->first();
		
		$source = new Source;
		$source->s_name = Input::get('s_name');
		$source->sql_host = Input::get('sql_host');
		$source->sql_port = Input::get('sql_port');
		$source->sql_user = Input::get('sql_user');
		$source->sql_db = Input::get('sql_db');
		$source->sql_pass = Input::get('sql_pass');
		$source->sql_query = Input::get('sql_query');
		$source->odbc_dsn = Input::get('odbc_dsn');
		$source->sql_column_buffers = Input::get('sql_column_buffers');
		$source->mssql_winauth = Input::get('mssql_winauth');
		$source->sql_sock = Input::get('sql_sock');
		$source->mysql_connect_flags = Input::get('mysql_connect_flags');
		$source->mysql_ssl_ca = Input::get('mysql_ssl_ca');
		$source->mysql_ssl_cert = Input::get('mysql_ssl_cert');
		$source->mysql_ssl_key = Input::get('mysql_ssl_key');
		$source->sql_joined_field = Input::get('sql_joined_field');
		$source->sql_query_range = Input::get('sql_query_range');
		$source->attributes = Input::get('attributes');
		$source->xmlpipe_command = Input::get('xml_command');
		$source->xml_fixup_utf8 = Input::get('xml_fixup_utf8');
		$source->tsvpipe_command = Input::get('tsvpipe_command');
		$source->save();
		
		$confSource = new ConfSource();
		$confSource->source_id = $source->id;
		$confSource->conf_id = $conf_id;
		$confSource->save();

		
		return Redirect::action('SourcesController@index', array('conf_id'=>$conf_id, 'conf_title'=>$conf_title));

	}

	/**
	 * Display the specified resource.
	 * GET /sources/{id}
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
	 * GET /sources/{id}/edit
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
	 * PUT /sources/{id}
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
	 * DELETE /sources/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
