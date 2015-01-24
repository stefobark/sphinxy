@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
	<h2>All Configurations</h2>
			<a href="/Confs/new"><button class="btn btn-default">Create another configuration</button></a>
	</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@foreach ($confs as $conf)
		<h3>{{$conf->title}}</h3>
		<ul>
			<li><a href="/indexers?conf_id={{$conf->id}}"><strong>Edit</strong></a></li>
			<li><a href="/actions?conf_id={{$conf->id}}"><strong>Take Action</strong></li>
		</ul>
			@endforeach
	</ol>
	</div>
</div>
		@stop
