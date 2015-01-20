@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<a href="/Confs/new"><button class="btn btn-default">New Configuration</button></a>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<h2>
			<a href="/indices/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Create another index</button></a>
			<a href="/sources/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Create another source</button></a>
			<a href="/searchds/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Redefine searchd settings</button></a>
			<a href="/indexers/edit?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}&id={{$passIndexers[0]->indexer_id}}"><button class="btn btn-default">Redefine indexer settings</button></a>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">

		<h3>{{ $conf_title }}.conf was saved in /public.</h3>
		
	</div>
</div>
@stop
