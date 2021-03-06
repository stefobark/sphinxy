@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<h2>{{ $conf_title }}.conf</h2>
	</div>
</div>
<div class="row">
<div class="col-md-4">
<h3>Searchd Options:</h3>
		{{ Form::model($searchd, array('route' => array('searchds.update', $searchd->id), 'method' => 'put')) }}
					<div class='form-group'>
				<label for='listen'><a href='http://sphinxsearch.com/docs/current.html#conf-listen'>Where (and how) to listen (mandatory)</a></label><br />
				<textarea style="width:300px!important" name='listen' placeholder="{{$searchd->listen}}"></textarea>
			</div>
			<div class='form-group'>
				<label for='log'><a href='http://sphinxsearch.com/docs/current.html#conf-log'>Where to log searchd runtime events (mandatory)</a></label><br />
				<input type='text' name='log' placeholder="{{$searchd->log}}">
			</div>
			<div class='form-group'>
				<label for='query_log'><a href='http://sphinxsearch.com/docs/current.html#conf-query-log'>Where to log queries (mandatory)</a></label><br />
				<input type='text' name='query_log' placeholder="{{$searchd->query_log}}">
			</div>
			<div class='form-group'>
				<label for='pid_file'><a href='http://sphinxsearch.com/docs/current.html#conf-pid-file'>Where to put the PID (mandatory)</a></label><br />
				<input type='text' name='pid_file' placeholder="{{$searchd->pid_file}}">
			</div>
			<div class='form-group'>
				<input type='submit' value='Submit'>
			</div>
				{{ Form::hidden('conf_id', $conf_id) }}
	{{ Form::hidden('conf_title', $conf_title) }}
		{{ Form::close() }}
		</div>
		</div>
	
		@stop
