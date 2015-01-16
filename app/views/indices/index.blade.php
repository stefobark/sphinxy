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
			<a href="/Confs/newIndex?conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Create another index</button></a>
			<a href="/sources/create?conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Create another source</button></a>
			<a href="/searchds/create?conf_id={{$conf_id}}&conf_title={{$conf_title}}"><button class="btn btn-default">Define searchd settings</button></a>
		</h2>
		<p class="help-block">So, now you have at least one index and one source. Let's go define searchd settings.</p>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
	
	<h2>Indexes:</h2>
		@foreach ($passIndices as $index)
		<p>index {{ $index->i_name }}
			@if(empty($index->i_name))
				<strong>MUST NAME INDEX!!!</strong>
			@endif
		 	{
			<br />
			@foreach ($index as $key => $value)
				@if(!empty($value) AND $key != 'id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 'i_name' AND $key != 'index_id' AND $key != 'conf_id')
					{{ $key }} = {{ $value }} <br />
				@endif
			@endforeach
			} <br /></p>
			<a href="/indices/edit?type={{$index->type}}&conf_id={{$conf_id}}&conf_title={{$conf_title}}&id={{$index->id}}"><button class="btn btn-primary">Edit</button></a><br /><br />
		@endforeach
	</div>
	<div class="col-md-4">
		<h2> Sources: </h2>
		@foreach ($passSources as $source)
			<p>source {{ $source->s_name }}
				@if(empty($source->s_name))
					<strong>MUST NAME SOURCE!!!</strong>
				@endif
			 {
			<br />
				@foreach ($source as $sKey => $sValue)
					@if(!empty($sValue) AND $sKey != 'id' AND $sKey != 'created_at' AND $sKey != 'updated_at' AND $sKey != 's_name' AND $sKey != "source_id" AND $sKey != "conf_id")
						
						{{ $sKey }} = {{ $sValue }} <br />
						
					@endif
				@endforeach
				} <br /></p>
									<a href="/sources/edit?conf_id={{$conf_id}}&conf_title={{$conf_title}}&id={{$source->id}}&type={{$source->type}}"><button class="btn btn-primary">Edit</button></a><br /><br />
			@endforeach
</div>
@stop
