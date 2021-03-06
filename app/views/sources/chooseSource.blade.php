@extends('layout')

@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12">
		<h2>{{ $conf_title }}.conf </h2>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<h4>Choose your source type:</h4>
				{{ Form::open(array('action' => 'SourcesController@create', 'method'=>'get')) }}
			<input type="radio" name="source_type" value="mysql">MySQL<br>
			<input type="radio" name="source_type" value="pgsql">PostgreSQL<br>
			<input type="radio" name="source_type" value="mssql">MSSQL<br>
			<input type="radio" name="source_type" value="xmlpipe2">XML<br>
			<input type="radio" name="source_type" value="tsvpipe">TSV<br>
			<input type="radio" name="source_type" value="odbc">ODBC<br>
			{{ Form::hidden('conf_id', $conf_id) }}
			<input type="submit" value="Submit">
		</form>
		<h5><a href="http://sphinxsearch.com/docs/current.html#confgroup-source">learn more</a></h5>
	</div>
	<div class="col-md-3">
		<h4>Or, if you already have sources, skip this:</h4>
		<div class="btn btn-default"><a href="/indices/create?type=plain&conf_id={{$conf_id}}">Create a plain index</a></div>
</div>
	@stop
