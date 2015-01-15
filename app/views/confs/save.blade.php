@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<div class="btn btn-default"><a href="/Confs/new">New Configuration</a></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<h2>
			<div class="btn btn-default"><a href="/indices/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}">Create another index</a></div>
			<div class="btn btn-default"><a href="/sources/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}">Create another source</a></div>
			<div class="btn btn-default"><a href="/searchds/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}">Redefine searchd settings</a></div>
			<div class="btn btn-default"><a href="/indexers/edit?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}&id={{$passIndexers[0]->indexer_id}}">&nbsp;&nbsp;Redefine indexer settings</a>&nbsp;&nbsp;</a></div>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">

		<h2>{{ $conf_title }}.conf was saved in /public.</h2>
		
	</div>
</div>
@stop
