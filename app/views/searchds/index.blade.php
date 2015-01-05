@extends('layout')
@section('content')

<div class="row" style="margin-top:100px">
	<div class="col-md-12">
		<h2>
			<div class="btn btn-default"><a href="/">Create another index</a></div>
			<div class="btn btn-default"><a href="/sources/create">Create another source</a></div>
			<div class="btn btn-default"><a href="/searchds/create">Redefine searchd settings</a></div>
			<div class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span><a href="/indexers/create">&nbsp;&nbsp;Define indexer settings</a>&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span></a></div>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
	<h2>Indexes:</h2>
		@foreach ($passIndices as $index)
		<p>index {{ $index['i_name'] }}
			@if(empty($index['i_name']))
				<strong>MUST NAME INDEX!!!</strong>
			@endif
		 	{
			<br />
			@foreach ($index as $key => $value)
				@if(!empty($value) AND $key != 'id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 'i_name')
					{{ $key }} = {{ $value }} <br />
				@endif
			@endforeach
			} <br /></p>
		@endforeach
	</div>
	<div class="col-md-4">
		<h2> Sources: </h2>
		@foreach ($passSources as $source)
			<p>source {{ $source['s_name'] }}
				@if(empty($source['s_name']))
					<strong>MUST NAME SOURCE!!!</strong>
				@endif
			 {
			<br />
				@foreach ($source as $sKey => $sValue)
					@if(!empty($sValue) AND $sKey != 'id' AND $sKey != 'created_at' AND $sKey != 'updated_at' AND $sKey != 's_name')
						{{ $sKey }} = {{ $sValue }} <br />
					@endif
				@endforeach
				} <br /></p>
			@endforeach
	</div>
	<div class="col-md-4">
		<h2> Searchd: </h2>
		<p>searchd {
		<br />
				@foreach ($passSearchds as $sdKey => $sdValue)
			
			
					@if(!empty($sdValue) AND $sdKey != 'id' AND $sdKey != 'created_at' AND $sdKey != 'updated_at')
						{{ $sdKey }} = {{ $sdValue }} <br />
					@endif
				 
			@endforeach
			}
</p>
	</div>
@stop
