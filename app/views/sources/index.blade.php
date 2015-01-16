@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<h2>{{ $conf_title }}.conf</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<h2>
			<a href="/indices/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default"></span>Create a plain index</button></a>
			<a href="/Confs/newIndex?conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Or, create a different kind of index</button></a>
			<a href="/sources/create?conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Create another source</button></a>
		</h2>
		
		<p class="help-block">Plain indexes need sources. Now, you can go create one for the source below. Or, change course and go make a different kind of index.</p>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
	<h3>Sources:</h3>
		@foreach ($passSources as $source)
		<p>source {{ $source->s_name }}
			@if(empty($source->s_name))
				<strong>MUST NAME SOURCE!!!</strong>
			@endif
		 {
		<br />
			@foreach ($source as $key => $value)
			@if(!empty($value) AND $key != 'id' AND $key != 'conf_id' AND $key != 'source_id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 's_name')
			{{ $key }} = {{ $value }} <br />
			@endif
			@endforeach
			} <br /></p>
		@endforeach
	</div>
</div>
@stop
