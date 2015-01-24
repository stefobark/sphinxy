@extends('layout')
@section('content')

<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<a href="/Confs/new"><button class="btn btn-default">New Configuration</button></a>
		<a href="/indexers?conf_id={{$conf_id}}"><button class="btn btn-default">Edit this Configuration</button></a>
		<a href="/actions?conf_id={{$conf_id}}"><button class="btn btn-primary">Start Sphinx</button></a>
		</h2>
		<h3>{{ $conf_title }}.conf was saved in /public.</h3>
	</div>
</div>
@stop
