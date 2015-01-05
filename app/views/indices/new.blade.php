@extends('layout')
@section('content')

		<div class="row" style="margin-top:100px">
			<div class="col-md-3">
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;<strong>Plain indexes</strong> (or, "batch indexes") are generated with "indexer"-- documents are indexed in batches.</p>
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;With <strong>real time indexes</strong>, indexer is not involved. You just push documents into the index and they are immediately availble for searching.</p>
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;<strong>Template indexes</strong> don't actually hold data-- they're used as "templates", to hold index settings (useful for snippets and a few other things).</p>
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;The <strong>distributed index</strong> type is really just a map that points to other instances of searchd. Your application can query this distributed index to search all the different Sphinx nodes.</p>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<h2>{{ $conf->title }}.conf</h2>
					{{ Form::open(array('action' => 'IndicesController@create', 'method'=>'get')) }}
					
				<br /><br />
					<h4>What kind of index will this be?</h4>
						{{ Form::radio("type", "plain1") }} Plain<br />
						{{ Form::radio("type", "rt") }} Realtime<br />
						{{ Form::radio('type', "template") }} Template<br />
						{{ Form::radio('type', "distributed") }} Distributed<br />
						{{ Form::hidden('conf_id', $conf->id) }}
						{{ Form::hidden('conf_title', $conf->title) }}
						<br />
						{{ Form::submit("Submit") }}
					{{ Form::close() }}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
