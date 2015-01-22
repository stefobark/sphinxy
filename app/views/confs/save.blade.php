@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<a href="/Confs/new"><button class="btn btn-default">New Configuration</button></a>
		<a href="/indexers/edit?type=plain&conf_id={{$conf_id}}"><button class="btn btn-default">Edit this Configuration</button></a>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">

		<h3>{{ $conf_title }}.conf was saved in /public.</h3>
		
	</div>
</div>
@stop
