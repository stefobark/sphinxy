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
	
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		
		$passSources = DB::table('sources')->join('conf_sources', 'sources.id', '=', 'source_id')->where('conf_id', '=', $conf_id)->get();
		
		
		return View::make('sources.index', compact('passSources', 'conf_id', 'conf_title'));
		
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
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		
		return View::make('sources.chooseSource', compact('conf_id', 'conf_title'));
	}
	
	public function create()
	{
	$source_type = Input::get('source_type');
	$conf_id = Input::get('conf_id');
	$conf = Conf::find("$conf_id");
	$conf_title = $conf->title;
	
		return View::make('sources.create', compact('source_type', 'conf_id', 'conf_title'));

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sources
	 *
	 * @return Response
	 */
	public function store()
	{
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		$sql_pass = Input::get('sql_pass');		
		
		$source = new Source;
			$source->type = Input::get('type');
			$source->s_name = Input::get('s_name');
			$source->sql_host = Input::get('sql_host');
			$source->sql_port = Input::get('sql_port');
			$source->sql_user = Input::get('sql_user');
			$source->sql_db = Input::get('sql_db');
			if(!empty($sql_pass)){
			$source->sql_pass = $sql_pass;
			} else {
			$source->sql_pass = ' ';
			}
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

		
		return Redirect::action('SourcesController@index', compact('conf_id'));

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
	public function edit()
	{
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
		$id = Input::get('id');
		$type = Input::get('type');
		$source = Source::find($id);
		
		return View::make('sources.edit', compact('conf_title', 'conf_id', 'indices', 'type', 'source'));
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
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
	
		$source = Source::findOrFail($id);
		
		if(!empty(Input::get('type'))){
		
			$source->type = Input::get('type');
		}

		if(!empty(Input::get('sql_host'))){
		
			$source->sql_host = Input::get('sql_host');
		}
		
		if(!empty(Input::get('sql_port'))){
		
			$source->sql_port = Input::get('sql_port');
		}
		
		if(!empty(Input::get('sql_user'))){
		
			$source->sql_user = Input::get('sql_user');
		}
		
		if(!empty(Input::get('sql_pass'))){
		
			$source->sql_pass = Input::get('sql_pass');
		}
		
		if(!empty(Input::get('sql_db'))){
		
			$source->sql_db = Input::get('sql_db');
		}
		
		if(!empty(Input::get('sql_sock'))){
		
			$source->sql_sock = Input::get('sql_sock');
		}
		
		if(!empty(Input::get('mysql_connect_flags'))){
		
			$source->mysql_connect_flags = Input::get('mysql_connect_flags');
		}
		
		if(!empty(Input::get('mysql_ssl_cert'))){
		
			$source->mysql_ssl_cert = Input::get('mysql_ssl_cert');
		}
		
		if(!empty(Input::get('mysql_ssl_key'))){
		
			$source->mysql_ssl_key = Input::get('mysql_ssl_key');
		}
		
		if(!empty(Input::get('mysql_ssl_ca'))){
		
			$source->mysql_ssl_ca = Input::get('mysql_ssl_ca');
		}
		
		if(!empty(Input::get('attributes'))){
		
			$source->attributes = Input::get('attributes');
		}
		
		if(!empty(Input::get('sql_query'))){
		
			$source->sql_query = Input::get('sql_query');
		}
		
		if(!empty(Input::get('sql_joined_field'))){
		
			$source->sql_joined_field = Input::get('sql_joined_field');
		}
		
		if(!empty(Input::get('sql_query_range'))){
		
			$source->sql_query_range = Input::get('sql_query_range');
		}
		
		if(!empty(Input::get('mssql_winauth'))){
		
			$source->mssql_winauth = Input::get('mssql_winauth');
		}
		
		if(!empty(Input::get('sql_column_buffers'))){
		
			$source->sql_column_buffers = Input::get('sql_column_buffers');
		}
		
		if(!empty(Input::get('odbc_dsn'))){
		
			$source->odbc_dsn = Input::get('odbc_dsn');
		}
		
		
		if(!empty(Input::get('xmlpipe_command'))){
		
			$source->xmlpipe_command = Input::get('xmlpipe_command');
		}
		
		if(!empty(Input::get('xml_fixup_utf8'))){
		
			$source->xml_fixup_utf8 = Input::get('xml_fixup_utf8');
		}
		
		if(!empty(Input::get('tsvpipe_command'))){
		
			$source->tsvpipe_command = Input::get('tsvpipe_command');
		}
		
		$source->update();
		
		return Redirect::route('sources.index', compact('conf_id'));
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
