@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12">
		<h2>{{$conf_title}}.conf</h2>
	</div>
</div>
<div class="row">
	@if ($type == 'distributed' )

        <div class="col-md-4">
        		<h3>Make a distributed index:</h3>
					<div id="accordion" class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Mandatory Options</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
							{{ Form::model($indices, array('route' => array('indices.update', $indices->id), 'method' => 'put')) }}
								
								<div class='form-group'>
									<input type='hidden' name='type' value="{{ $type }}">
								</div>
								<div class='form-group'>
										<label for='agent'><a href='http://sphinxsearch.com/docs/current.html#conf-agent'>
										Sphinx Nodes</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="agent" data-content="This is where you point out the remote agents. If there are mirrors, declare them in one line separated by '|'"><br />
										<textarea name='agent' placeholder="{{$indices->agent}}"  style="width:100%!important"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Agent Settings</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<div class='form-group'>
										<label for='agent_persistent'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-persistent'>
										Persistent connections to remote agents</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="agent_persistent" data-content="agent_persistent directive syntax matches that of the agent directive. The only difference is that the master will not open a new connection to the agent for every query and then close it. Rather, it will keep a connection open and attempt to reuse for the subsequent queries. The maximal number of such persistent connections per one agent host is limited by persistent_connections_limit option of searchd section."><br />
										<textarea name='agent_persistent' placeholder="{{$indices->agent_persistent}}"  style="width:100%!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_blackhole'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-blackhole'>
										Agent blackhole: fire and forget</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="agent_blackhole" data-content="agent_blackhole lets you fire-and-forget queries to remote agents. That is useful for debugging (or just testing) production clusters: you can setup a separate debugging/testing searchd instance, and forward the requests to this instance from your production master (aggregator) instance without interfering with production work. Master searchd will attempt to connect and query blackhole agent normally, but it will neither wait nor process any responses. Also, all network errors on blackhole agents will be ignored. The value format is completely identical to regular agent directive."><br />
										<textarea name='agent_blackhole' placeholder="{{$indices->agent_blackhole}}"  style="width:100%!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_connect_timeout'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-connect-timeout'>
										Connection timeout</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="agent_connect_timeout" data-content="When connecting to remote agents, searchd will wait at most this much time for connect() call to complete successfully. If the timeout is reached but connect() does not complete, and retries are enabled, retry will be initiated."><br />
										<textarea name='agent_connect_timeout' placeholder="{{$indices->agent_connect_timeout}}"  style="width:100%!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_query_timeout'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-query-timeout'>
										Agent query timeout</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="agent_query_timeout" data-content="After connection, searchd will wait at most this much time for remote queries to complete. This timeout is fully separate from connection timeout; so the maximum possible delay caused by a remote agent equals to the sum of agent_connection_timeout and agent_query_timeout. Queries will not be retried if this timeout is reached; a warning will be produced instead."><br />
										<textarea name='agent_query_timeout' placeholder="{{$indices->agent_query_timeout}}"  style="width:100%!important"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Agent Mirror Options (HA / Failover)</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse">
							<div class="panel-body">
								<div class='form-group'>
										<label for='ha_strategy'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-strategy'>
										Agent mirror selection strategy, for load balancing.</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="ha_strategy" data-content="The strategy used for mirror selection, or in other words, choosing a specific agent mirror in a distributed index. Essentially, this directive controls how exactly master does the load balancing between the configured mirror agent nodes."><br />
										<textarea name='ha_strategy' placeholder="{{$indices->ha_strategy}}"  style="width:100%!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='ha_period_karma'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-period-karma'>
										Agent mirror statistics window size, in seconds.</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="ha_period_karma" data-content="For a distributed index with agent mirrors, the master node tracks several different per-mirror counters. These counters are then used for failover and balancing (the master picks the best mirror to use based on the counters.) Counters are accumulated in blocks of ha_period_karma seconds."><br />
										<textarea name='ha_period_karma' placeholder="{{$indices->ha_period_karma}}"  style="width:100%!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='ha_ping_interval'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-period-karma'>
										Interval between agent mirror pings, in milliseconds.</a></label>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="ha_ping_interval" data-content="For a distributed index with agent mirrors in it, master sends all mirrors a ping command during the idle periods. This is to track the current agent status (alive or dead, network roundtrip, etc). The interval between such pings is defined by this directive."><br />
										<textarea name='ha_ping_interval' placeholder="{{$indices->ha_ping_interval}}"  style="width:100%!important"></textarea>
								</div>
							</div>
						</div>
					</div>
						{{ Form::hidden('conf_id', $conf_id) }}
	{{ Form::hidden('conf_title', $conf_title) }}
					<div class='form-group'>
						<br/><input type='submit' value='Submit'>
					</div>
					</form>
				</div>
			</div>
			{{ Form::close() }}
@endif

    @if ($type == 'plain' | $type == 'template')
							{{ Form::model($indices, array('route' => array('indices.update', $indices->id), 'method' => 'put')) }}
	<div class="col-md-4">
		<h3>Make an index:</h3>
		<div id="accordion" class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Mandatory Options</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse">
				<div class="panel-body">
					{{ Form::open(array('action'=>'IndicesController@store', 'method'=>'post')) }}
	
					<div class='form-group'>
							<input type='hidden' name='type' value="{{ $type }}">
					</div>
					<div class='form-group'>
							<label for='source'><a href='http://sphinxsearch.com/docs/current.html#conf-sql-host'>Choose Source Name (mandatory)</a></label><br />
							<input type='text' name='source' placeholder="{{$indices->source}}">
					</div>
					<div class='form-group'>
							<label for='path'><a href='http://sphinxsearch.com/docs/current.html#conf-path'>Set index data directory (mandatory)</a></label><br />
							<input type='text' name='path' placeholder="{{$indices->path}}">
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Attributes</a>
				</h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
						<label for='docinfo'><a href='http://sphinxsearch.com/docs/current.html#conf-docinfo'>How to store Attributes</a>
						&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="docinfo" data-content="This defines how attributes will be stored on disk and RAM. 'none' means that there will be no attributes. Sphinx will use 'none' if you don't set any attributes. 'inline' means that attributes will be stored in the .spd file, along with the document ID lists. 'extern' means that the docinfo (attributes) will be stored separately (externally) from document ID lists, in a special .spa file."></label><br />
						<input type='text' name='docinfo' placeholder="{{$indices->docinfo}}">
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">HTML-Related Options</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
							<label for='index_sp'><a href='http://sphinxsearch.com/docs/current.html#conf-index-sp'>Index Sentence and Paragraph Boundaries</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="index_sp" data-content="This directive enables sentence and paragraph boundary indexing. It's required for the SENTENCE and PARAGRAPH operators to work. Sentence boundary detection is based on plain text analysis, so you only need to set index_sp = 1 to enable it. Paragraph detection is however based on HTML markup, and happens in the HTML stripper. So to index paragraph locations you also need to enable the stripper by specifying html_strip = 1. Both types of boundaries are detected based on a few built-in rules which you can learn more about by following the link on this section's title. "></label><br />

							<input type='text' name='index_sp' placeholder="{{$indices->index_sp}}">
					</div>
					<div class='form-group'>
							<label for='html_strip'><a href='http://sphinxsearch.com/docs/current.html#conf-html-strip'>HTML Stripper (other options need this..)</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="html_strip" data-content="Whether to strip HTML markup from incoming full-text data. HTML tags are removed, their contents are left intact by default. You can choose to keep and index attributes of the tags (e.g., HREF attribute in an A tag, or ALT in an IMG one) with the next option ('html_index_attrs')."><br />
							</label>
							<input type='text' name='html_strip' placeholder="{{$indices->html_strip}}">
					</div>
					<div class='form-group'>
							<label for='html_index_attrs'><a href='http://sphinxsearch.com/docs/current.html#conf-html-index-attrs'>HTML/XML tags to index</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="html_index_attrs" data-content="Specifies HTML markup attributes whose contents should be retained and indexed even though other HTML markup is stripped. The format is per-tag enumeration of indexable attributes, as shown in the example below."><br />
							</label><textarea type='text' name='html_index_attrs' placeholder="{{$indices->html_index_attrs}}" style="width:100%!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='index_zones'><a href='http://sphinxsearch.com/docs/current.html#conf-index-zones'>Index HTML/XML zones (tags)</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="index_zones" data-content="Zones can be formally defined as follows. Everything between an opening and a matching closing tag is called a span, and the aggregate of all spans sharing the same tag name is a zone. For instance, everything between the occurrences of H1 and /H1 in the document field belongs to the H1 zone. In short, use this to enable the ZONE search operator!"><br />
							</label><textarea type='text' name='index_zones' placeholder="{{$indices->index_zones}}" style="width:100%!important"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Text Processing Options</a>
				</h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
									<label for='morphology'><a href='http://sphinxsearch.com/docs/current.html#conf-morphology'>Morphology Preprocessors</a>
									&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="morphology" data-content="These can used, while indexing, to replace different forms of the same word with their normalized form. For instance, 
									The English stemmer will normalize both 'dogs' and 'dog' to 'dog', making search results for both searches the same. Sphinx supports lemmatizers, stemmers, and phonetic algorithms."><br />
</label>
									<textarea type='text' name='morphology' placeholder="{{$indices->morphology}}" style="width:100%!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='min_stemming_len'><a href='http://sphinxsearch.com/docs/current.html#conf-min-stemming-len'>Minimum Stemming Length</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="min_stemming_len" data-content="Stemmers are not perfect, and might sometimes produce undesired results. For instance, running "gps" keyword through Porter stemmer for English results in "gp", which is not really the intent. min_stemming_len feature lets you suppress stemming based on the source word length, ie. to avoid stemming too short words. Keywords that are shorter than the given threshold will not be stemmed. Note that keywords that are exactly as long as specified will be stemmed. So in order to avoid stemming 3-character keywords, you should specify 4 for the value. For more finely grained control, refer to wordforms feature."><br />
							</label><input type='text' name='min_stemming_len' placeholder="{{$indices->min_stemming_len}}"">
					</div>
					<div class='form-group'>
							<label for='stopwords'><a href='http://sphinxsearch.com/docs/current.html#conf-stopwords'>Stopwords Files</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="stopwords" data-content="Stopwords are the words that will not be indexed. Typically you'd put most frequent words in the stopwords list because they do not add much value to search results but consume a lot of resources to process."><br />
							</label><textarea type='text' name='stopwords' placeholder="{{$indices->stopwords}}" style="width:100%!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='wordforms'><a href='http://sphinxsearch.com/docs/current.html#conf-wordforms'>Wordforms Dictionary</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="wordforms" data-content="Word forms are applied after tokenizing the incoming text by charset_table rules. They essentially let you replace one word with another. Normally, that would be used to bring different word forms to a single normal form (eg. to normalize all the variants such as 'walks', 'walked', 'walking' to the normal form 'walk'). It can also be used to implement stemming exceptions, because stemming is not applied to words found in the forms list."><br />
</label>
							<input type='text' name='wordforms' placeholder="{{$indices->wordforms}}" style="width:100%!important">
					</div>
					<div class='form-group'>
							<label for='embedded_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-embedded-limit'>Embedded File Size Limit</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="embedded_limit" data-content="Before 2.1.1-beta, the contents of exceptions, wordforms, or stopwords files were always kept in the files. Only the file names were stored into the index. Starting with 2.1.1-beta, indexer can either save the file name, or embed the file contents directly into the index. Files sized under embedded_limit get stored into the index. For bigger files, only the file names are stored. This also simplifies moving index files to a different machine; you may get by just copying a single file."><br />

							</label><input type='text' name='embedded_limit' placeholder="{{$indices->embedded_limit}}"">
					</div>
					<div class='form-group'>
							<label for='exceptions'><a href='http://sphinxsearch.com/docs/current.html#conf-exceptions'>Exceptions File Path</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="exceptions" data-content="Exceptions allow to map one or more tokens (including tokens with characters that would normally be excluded) to a single keyword. They are similar to wordforms in that they also perform mapping, but have a number of important differences."><br />
</label>
							<input type='text' name='exceptions' placeholder="{{$indices->exceptions}}" style="width:100%!important">
					</div>
				</div>
			</div>
		</div>
			{{ Form::hidden('conf_id', $conf_id) }}
	{{ Form::hidden('conf_title', $conf_title) }}
		<div class='form-group'>
						<br/><input type='submit' value='Submit'>
		</div>
		</form>
	</div>
</div>
{{ Form::close() }}
@endif

    @if ($type == 'rt')
							{{ Form::model($indices, array('route' => array('indices.update', $indices->id), 'method' => 'put')) }}
<div class="col-md-4">
<h3>Make a RT index:</h3>
	<div id="accordion" class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Mandatory Options</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse">
				<div class="panel-body">
					<p class='help-block'>RealTime indexes are great! Just push data in, update it, search it. Awesome!</p>
						
						<div class='form-group'>
							<input type='hidden' name='type' value="{{ $type }}">
						</div>
						<div class='form-group'>
							<label for='path'><a href='http://sphinxsearch.com/docs/current.html#conf-path'>Set index data directory (mandatory)</a></label><br />
							<input type='text' name='path' placeholder="{{$indices->path}}">
						</div>
						<div class='form-group'>
							<label for='rt_field'><a href='http://sphinxsearch.com/docs/current.html#conf-rt-field'>Full-text field declaration (mandatory)</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="rt_field" data-content="Full-text fields to be indexed are declared using rt_field directive. List all fields separated by a comma. The names must be unique. 
							The order is preserved; and so field values in INSERT statements without an explicit list of inserted columns will have to be in the same order as configured."><br />
							</label><textarea type='text' name='rt_field' placeholder="{{$indices->rt_field}}" style="width:100%!important"></textarea>
						</div>
					</div>
				</div>
			</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Attribute stuff</a>
				</h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
						<label for='rt_attr'><a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-uint'>RT attributes</a>
						&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="rt_attr" data-content="List all attributes (rt_attr_...) here, separated by a 
						comma. Possible attributes types include: <br />
		
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-uint'>rt_attr_uint (unsigned integer)</a><br />
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-bool'>rt_attr_bool (boolean)</a><br />
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-bigint'>rt_attr_bigint (big integer)</a><br />
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-float'>rt_attr_float (floating point)</a><br /> 
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-multi'>rt_attr_multi (multi value attribute)</a><br /> 
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-multi-64'>rt_attr_multi_64</a><br />
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-timestamp'>rt_attr_timestamp (unix timestamp)</a><br /> 
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-string'>rt_attr_string (string)</a><br />
							<a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-json'>rt_attr_json (JSON)</a><br />
						"><br />
					</label>			
						<textarea type='text' name='rt_attr' placeholder="{{$indices->rt_attr}}" style="width:100%!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='docinfo'><a href='http://sphinxsearch.com/docs/current.html#conf-docinfo'>How to store Attributes</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="docinfo" data-content="This defines how attributes will be stored on disk and RAM. 'none' 
							means that there will be no attributes. Sphinx will use 'none' 
							if you don't set any attributes. 'inline' means that attributes will be stored in the .spd file, along with the document ID lists. 'extern' means that 
							the docinfo (attributes) will be stored separately (externally) from document ID lists, in a special .spa file. "><br />
</label>
							<input type='text' name='docinfo' placeholder="{{$indices->docinfo}}">
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Morphology</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
							<label for='morphology'><a href='http://sphinxsearch.com/docs/current.html#conf-morphology'>Morphology Preprocessors</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="morphology" data-content="These can used, while indexing, to replace different forms of the same word with their normalized form. For instance, The English 
							stemmer will normalize both 'dogs' and 'dog' to 'dog', making search results for both searches the same. Sphinx supports lemmatizers, stemmers, and phonetic algorithms."><br />
							</label>
							<textarea type='text' name='morphology' placeholder="{{$indices->morphology}}" style="width:100%!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='min_stemming_len'><a href='http://sphinxsearch.com/docs/current.html#conf-min-stemming-len'>Minimum Stemming Length</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="min_stemming_len" data-content="Stemmers are not perfect, and might sometimes produce 
							undesired results. For instance, running 'gps' keyword through Porter stemmer 
							for English results in 'gp', which is not really the intent. min_stemming_len feature lets you suppress stemming based on the source word length, ie. to 
							avoid stemming too short words. Keywords that are shorter than the given threshold will not be stemmed. Note that keywords that are exactly as long as 
							specified will be stemmed. So in order to avoid stemming 3-character keywords, you should specify 4 for the value. For more finely grained control, refer 
							to wordforms feature."><br /></label>
							<input type='text' name='min_stemming_len' placeholder="{{$indices->min_stemming_len}}"">
					</div>
					<div class='form-group'>
							<label for='stopwords'><a href='http://sphinxsearch.com/docs/current.html#conf-stopwords'>Stopwords Files</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="stopwords" data-content="Stopwords are the words that will not be indexed. Typically you'd put most frequent words in the stopwords list because 
												they do not add much value to search results but consume a lot of resources to process."><br />
</label>
							<textarea type='text' name='stopwords' placeholder="{{$indices->stopwords}}" style="width:100%!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='wordforms'><a href='http://sphinxsearch.com/docs/current.html#conf-wordforms'>Wordforms Dictionary</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="wordforms" data-content="Word forms are applied after tokenizing the
							 incoming text by charset_table rules. They essentially let you replace one word with another. 
							Normally, that would be used to bring different word forms to a single normal form (eg. to normalize all the variants such as 'walks', 'walked', 'walking' to 
							the normal form 'walk'). It can also be used to implement stemming exceptions, because stemming is not applied to words found in the forms list."><br />
							</label>
							<input type='text' name='wordforms' placeholder="{{$indices->wordforms}}" style="width:100%!important">
					</div>
					<div class='form-group'>
							<label for='exceptions'><a href='http://sphinxsearch.com/docs/current.html#conf-exceptions'>Exceptions File Path</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="exceptions" data-content="Exceptions allow to map one or more tokens (including tokens with characters that would normally be excluded) to a single keyword. They 
							are similar to wordforms in that they also perform mapping, but have a number of important differences."><br /></label>
							<input type='text' name='exceptions' placeholder="{{$indices->exceptions}}" style="width:100%!important">
					</div>
					<div class='form-group'>
						<label for='embedded_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-embedded-limit'>Embedded File Size Limit</a>
						&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="embedded_limit" data-content="Before 2.1.1-beta, the contents of exceptions, wordforms, or stopwords files were always kept in the files. Only the file names were stored 
						into the index. Starting with 2.1.1-beta, indexer can either save the file name, or embed the file contents directly into the index. Files sized under embedded_limit 
						get stored into the index. For bigger files, only the file names are stored. This also simplifies moving index files to a different machine; you may get by just copying 
						a single file."><br /></label>
						<input type='text' name='embedded_limit' placeholder="{{$indices->embedded_limit}}"">
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">HTML/Zones/Boundaries</a>
				</h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse">
				<div class="panel-body">
					<div class='form-group'>
							<label for='index_sp'><a href='http://sphinxsearch.com/docs/current.html#conf-index-sp'>Index Sentence and Paragraph Boundaries</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="index_sp" data-content="This directive enables sentence and paragraph boundary indexing.
							 It's required for the SENTENCE and PARAGRAPH operators to work. Sentence 
							boundary detection is based on plain text analysis, so you only need to set index_sp = 1 to enable it. Paragraph detection is however based on HTML markup, and 
							happens in the HTML stripper. So to index paragraph locations you also need to enable the stripper by specifying html_strip = 1. Both types of boundaries are 
							detected based on a few built-in rules which you can learn more about by following the link on this section's title."><br />
</label>
							<input type='text' name='index_sp' placeholder="{{$indices->index_sp}}">
					</div>
					<div class='form-group'>
							<label for='html_strip'><a href='http://sphinxsearch.com/docs/current.html#conf-html-strip'>HTML Stripper</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="html_strip" data-content="Whether to strip HTML markup from incoming 
							full-text data. HTML tags are removed, their contents are left intact by default. You can choose to keep and index attributes of the tags (e.g., HREF attribute 
							in an A tag, or ALT 
							in an IMG one) with the next option ('html_index_attrs')."><br /></label>
							<input type='text' name='html_strip' placeholder="{{$indices->html_strip}}">
					</div>
					<div class='form-group'>
							<label for='html_index_attrs'><a href='http://sphinxsearch.com/docs/current.html#conf-html-index-attrs'>HTML/XML tags to index</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="html_index_attrs" data-content="Specifies HTML markup attributes whose contents should be retained and indexed even though other HTML markup is stripped. The format is per-tag 
							enumeration of indexable attributes, as shown in the example below."><br /></label>
							<textarea type='text' name='html_index_attrs' placeholder="{{$indices->html_index_attrs}}" style="width:100%!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='index_zones'><a href='http://sphinxsearch.com/docs/current.html#conf-index-zones'>Index HTML/XML zones (tags)</a>
							&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="html_index_attrs" data-content="Zones can be formally defined as follows. Everything between an opening and a matching closing tag is called a span, and the aggregate of all 
							spans sharing the same tag name is a zone. For instance, everything between the occurrences of H1 and /H1 in the document field belongs to the H1 zone. In short, 
							use this to enable the ZONE search operator!"><br /></label>

							<textarea type='text' name='index_zones' placeholder="{{$indices->index_zones}}" style="width:100%!important"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{ Form::hidden('conf_id', $conf_id) }}
	{{ Form::hidden('conf_title', $conf_title) }}
	<div class='form-group'>
		<input type='submit' value='Submit'>
	</div>
</div>	
{{ Form::close() }}
@endif
@if($type == 'plain' | $type == 'template')
	<div class="col-md-2"></div>
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
			@if(!empty($value) AND $key != 'id' AND $key != 'source_id' AND $key != 'conf_id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 's_name')
				{{ $key }} = {{ $value }} <br />
			@endif
		@endforeach
		} <br /></p>
					<a href="/sources/edit?conf_id={{$conf_id}}&conf_title={{$conf_title}}&id={{$source->id}}&type={{$source->type}}"><button class="btn btn-primary">Edit</button></a><br /><br />
	@endforeach

@else
	<h4 class="text-center">Distributed and RT indexes don't need a source.</h4>
@endif
@stop
