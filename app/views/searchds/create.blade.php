@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">

	<div class="col-md-12">
		<h2>{{ $conf_title }}.conf</h2>
	</div>
</div>
<div class="row">
<div class="col-md-4">
<h2>Searchd Options:</h2>
		{{ Form::open(array('action'=>'SearchdsController@store', 'method'=>'post')) }}
			<div class='form-group'>
				<label for='listen'><a href='http://sphinxsearch.com/docs/current.html#conf-listen'>Where (and how) to listen (mandatory)</a></label><br />
				<textarea style="width:300px!important" name='listen' placeholder='separate them with a comma! localhost:9306:mysql41, 127.0.0.1:9306:mysqli41, 9306, etc...'></textarea>
			</div>
			<div class='form-group'>
				<label for='log'><a href='http://sphinxsearch.com/docs/current.html#conf-log'>Where to log searchd runtime events (mandatory)</a></label><br />
				<input type='text' name='log' placeholder='/var/log/searchd.log'>
			</div>
			<div class='form-group'>
				<label for='query_log'><a href='http://sphinxsearch.com/docs/current.html#conf-query-log'>Where to log queries (mandatory)</a></label><br />
				<input type='text' name='query_log' placeholder='/var/log/query.log'>
			</div>
			<div class='form-group'>
				<label for='pid_file'><a href='http://sphinxsearch.com/docs/current.html#conf-pid-file'>Where to put the PID (mandatory)</a></label><br />
				<input type='text' name='pid_file' placeholder='/var/run/searchd.pid'>
			</div>
			<div class='form-group'>
				<input type='submit' value='Submit'>
			</div>
				{{ Form::hidden('conf_id', $conf_id) }}
		{{ Form::close() }}
		</div>
		</div>
	
		@stop
