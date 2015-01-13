@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12">
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2>
			<div class="btn btn-default"><a href="/indices/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}">Create another index</a></div>
			<div class="btn btn-default"><a href="/sources/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}">Create another source</a></div>
			<div class="btn btn-default"><a href="/searchds/create?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}">Redefine searchd settings</a></div>
			<div class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span><a href="/indexers/edit?type=plain&conf_id={{$conf_id}}&conf_title={{$conf_title}}&id={{$passIndexers[0]->indexer_id}}">&nbsp;&nbsp;Redefine indexer settings</a>&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span></a></div>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-4">

		<h2>{{ $conf_title }}.conf</h2>
	
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
		
		<p>searchd {
		<br />
				@foreach ($passSearchds[0] as $sdKey => $sdValue)
			
			
					@if(!empty($sdValue) AND $sdKey != 'title' AND $sdKey != 'searchd_id' AND $sdKey != 'indexer_id' AND $sdKey != 'id' AND $sdKey != 'created_at' AND $sdKey != 'updated_at')
						{{ $sdKey }} = {{ $sdValue }} <br />
					@endif
				 
			@endforeach
			}
			
			<p>indexer {
		<br />
				@foreach ($passIndexers[0] as $iKey => $iValue)
			
			
					@if(!empty($iValue) AND $iKey != 'title' AND $iKey != 'searchd_id' AND $iKey != 'indexer_id' AND $iKey != 'id' AND $iKey != 'created_at' AND $iKey != 'updated_at')
						{{ $iKey }} = {{ $iValue }} <br />
					@endif
				 
			@endforeach
			}

</p>
		
		@stop
