@extends('layout')

@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-1"></div>
	<div class="col-md-3">
	<h3>{{ $conf_title }}.conf </h3><br/>
		<h4>Choose your source type:</h4>
				{{ Form::open(array('action' => 'SourcesController@create', 'method'=>'get')) }}
			<input type="radio" name="source_type" value="mysql">MySQL<br>
			<input type="radio" name="source_type" value="pgsql">PostgreSQL<br>
			<input type="radio" name="source_type" value="mssql">MSSQL<br>
			<input type="radio" name="source_type" value="xmlpipe2">XML<br>
			<input type="radio" name="source_type" value="tsvpipe">TSV<br>
			<input type="radio" name="source_type" value="odbc">ODBC<br>
			{{ Form::hidden('conf_id', $conf_id) }}
			{{ Form::hidden('conf_title', $conf_title) }}
			<input type="submit" value="Submit">
		</form>
		<h5><a href="http://sphinxsearch.com/docs/current.html#confgroup-source">learn more</a></h5>
	</div>
	<div class="col-md-3">
		<h4>Or, skip this step <br />(if you already have sources):</h4>
		<div class="btn btn-default"><a href="/indices/create?type=plain">Create an index</a></div>
</div>
	@stop
