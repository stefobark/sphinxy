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
			<div class="btn btn-default"><a href="/Confs/newIndex?conf_id={{$conf_id}}&conf_title={{$conf_title}}">&nbsp;&nbsp;Create an index&nbsp;&nbsp;</a></div>
			<div class="btn btn-default"><a href="/sources/create?conf_id={{$conf_id}}&conf_title={{$conf_title}}">Create another source</a></div>
			<div class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span><a href="/searchds/create?conf_id={{$conf_id}}&conf_title={{$conf_title}}">&nbsp;&nbsp;Define searchd settings</a>&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span></div>
		</h2>
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
			@endforeach
</div>
@stop
