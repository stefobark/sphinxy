@extends('layout')
@section('content')

<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
	<h2>{{ $conf_title }}.conf &nbsp; <a href="/Confs/save?conf_id={{$conf_id}}"><button class="btn btn-primary">Save Configuration</button></a>
</h2>
		<h2>
			<a href="/indices/create?type=plain&conf_id={{$conf_id}}"><button class="btn btn-default">Create another index</button></a>
			<a href="/sources/create?type=plain&conf_id={{$conf_id}}"><button class="btn btn-default">Create another source</button></a>


		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
	<h2>Indexes:</h2>
		@foreach ($passIndices as $index)
		<p>index {{ $index->i_name }}
			@if(empty($index->i_name))
				<strong>MUST NAME INDEX!!!</strong>
			@endif
		 	{
			<br />
			@foreach ($index as $key => $value)
				@if(!empty($value) AND $key != 'id' AND $key != 'conf_id' AND $key != 'index_id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 'i_name')
					{{ $key }} = {{ $value }} <br />
				@endif
				
			@endforeach
			} <br /></p>
			<a href="/indices/edit?type={{$index->type}}&conf_id={{$conf_id}}&id={{$index->id}}"><button class="btn btn-primary">Edit</button></a><br /><br />
		@endforeach
	</div>
	<div class="col-md-3">
		<h2> Sources: </h2>
		@foreach ($passSources as $source)
			<p>source {{ $source->s_name }}
				@if(empty($source->s_name))
					<strong>MUST NAME SOURCE!!!</strong>
				@endif
			 {
			<br />
				@foreach ($source as $sKey => $sValue)
					@if(!empty($sValue) AND $sKey != 'id' AND $sKey != 'source_id' AND $sKey != 'conf_id' AND $sKey != 'created_at' AND $sKey != 'updated_at' AND $sKey != 's_name')
						{{ $sKey }} = {{ $sValue }} <br />
					@endif
				@endforeach
				} <br /></p>
													<a href="/sources/edit?conf_id={{$conf_id}}&id={{$source->id}}&type={{$source->type}}"><button class="btn btn-primary">Edit</button></a><br /><br />
			@endforeach
	</div>
	<div class="col-md-3">
		<h2> Searchd: </h2>
		<p>searchd {
		<br />
				@foreach ($passSearchds[0] as $sdKey => $sdValue)
			
			
					@if(!empty($sdValue) AND $sdKey != 'id' AND $sdKey != 'searchd_id' AND $sdKey != 'indexer_id' AND $sdKey != 'title' AND $sdKey != 'created_at' AND $sdKey != 'updated_at')
						{{ $sdKey }} = {{ $sdValue }} <br />
					@endif
				 
			@endforeach
			}<br /><br />
						<a href="/searchds/edit?type=plain&conf_id={{$conf_id}}&id={{$passSearchds[0]->searchd_id}}"><button class="btn btn-primary">Edit</button></a>
</p>
</div>
@if(!empty($passIndexers[0]))
<div class="col-md-3">
		<h2> Indexer: </h2>
		<p>indexer {
		<br />
				@foreach ($passIndexers[0] as $iKey => $iValue)
			
			
					@if(!empty($iValue) AND $iKey != 'id' AND $iKey != 'searchd_id' AND $iKey != 'indexer_id' AND $iKey != 'title' AND $iKey != 'created_at' AND $iKey != 'updated_at')
						{{ $iKey }} = {{ $iValue }} <br />
					@endif
				 
			@endforeach
			}<br /><br />
						<a href="/indexers/edit?type=plain&conf_id={{$conf_id}}&id={{$passIndexers[0]->indexer_id}}"><button class="btn btn-primary">Edit</button></a>
</p>
@endif
@stop
