@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
	<h2>All Configurations</h2>
			<div class="btn btn-default"><a href="/Confs/new">Create another configuration</a></div>
	</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	<h3>Edit</h3>
	<ol>
		@foreach ($confs as $conf)
			<li><a href="/indexers?conf_id={{$conf->id}}&conf_title={{ $conf->title }}"><strong>{{$conf->title}}</strong></a></li>
			@endforeach
	</ol>
	</div>
</div>
		@stop
