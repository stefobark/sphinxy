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
							{{ Form::open(array('action'=>'IndicesController@store', 'method'=>'post')) }}
								<div class='form-group'>
									<label for='i_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>
									Name this Index (mandatory)</a></label><br />
									<p class='help-block'>Inherit options from other indexes, just add
									a ':' after the index name followed by the name of the index to inherit from.</p>
									<input type='text' name='i_name' placeholder='test_index'>
								</div>
								<div class='form-group'>
									<input type='hidden' name='type' value="{{ $type }}">
								</div>
								<div class='form-group'>
										<label for='agent'><a href='http://sphinxsearch.com/docs/current.html#conf-agent'>
										Sphinx Nodes</a></label><br />
										<p class='help-block'>This is where you point out the remote agents. If there are mirrors, declare them in one line separated by "|"</p>
										<textarea name='agent' placeholder='127.0.0.1:9306|127.0.0.1:9307:rt_test'  style="width:300px!important"></textarea>
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
										Persistent connections to remote agents</a></label><br />
										<p class='help-block'>agent_persistent directive syntax matches that of the agent directive. The only difference is that the master will not open a new connection to the agent for every query and then close it. Rather, it will keep a connection open and attempt to reuse for the subsequent queries. The maximal number of such persistent connections per one agent host is limited by persistent_connections_limit option of searchd section.</p>
										<textarea name='agent_persistent' placeholder='127.0.0.1:9306|127.0.0.1:9307:rt_test'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_blackhole'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-blackhole'>
										Agent blackhole: fire and forget</a></label><br />
										<p class='help-block'>agent_blackhole lets you fire-and-forget queries to remote agents. That is useful for debugging (or just testing) production clusters: you can setup a separate debugging/testing searchd instance, and forward the requests to this instance from your production master (aggregator) instance without interfering with production work. Master searchd will attempt to connect and query blackhole agent normally, but it will neither wait nor process any responses. Also, all network errors on blackhole agents will be ignored. The value format is completely identical to regular agent directive.</p>
										<textarea name='agent_blackhole' placeholder='127.0.0.1:9306|127.0.0.1:9307:rt_test'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_connect_timeout'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-connect-timeout'>
										Connection timeout</a></label><br />
										<p class='help-block'>When connecting to remote agents, searchd will wait at most this much time for connect() call to complete successfully. If the timeout is reached but connect() does not complete, and retries are enabled, retry will be initiated.</p>
										<textarea name='agent_connect_timeout' placeholder='300'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='agent_query_timeout'><a href='http://sphinxsearch.com/docs/current.html#conf-agent-query-timeout'>
										Agent query timeout</a></label><br />
										<p class='help-block'>After connection, searchd will wait at most this much time for remote queries to complete. This timeout is fully separate from connection timeout; so the maximum possible delay caused by a remote agent equals to the sum of agent_connection_timeout and agent_query_timeout. Queries will not be retried if this timeout is reached; a warning will be produced instead.</p>
										<textarea name='agent_query_timeout' placeholder='10000'  style="width:300px!important"></textarea>
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
										Agent mirror selection strategy, for load balancing.</a></label><br />
										<p class='help-block'>The strategy used for mirror selection, or in other words, choosing a specific agent mirror in a distributed index. Essentially, this directive controls how exactly master does the load balancing between the configured mirror agent nodes.</p>
										<textarea name='ha_strategy' placeholder='nodeads'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='ha_period_karma'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-period-karma'>
										Agent mirror statistics window size, in seconds.</a></label><br />
										<p class='help-block'>For a distributed index with agent mirrors, the master node tracks several different per-mirror counters. These counters are then used for failover and balancing (the master picks the best mirror to use based on the counters.) Counters are accumulated in blocks of ha_period_karma seconds.</p>
										<textarea name='ha_period_karma' placeholder='120'  style="width:300px!important"></textarea>
								</div>
								<div class='form-group'>
										<label for='ha_ping_interval'><a href='http://sphinxsearch.com/docs/current.html#conf-ha-period-karma'>
										Interval between agent mirror pings, in milliseconds.</a></label><br />
										<p class='help-block'>For a distributed index with agent mirrors in it, master sends all mirrors a ping command during the idle periods. This is to track the current agent status (alive or dead, network roundtrip, etc). The interval between such pings is defined by this directive.</p>
										<textarea name='ha_ping_interval' placeholder='1000'  style="width:300px!important"></textarea>
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
{{ Form::open(array('action'=>'IndicesController@store', 'method'=>'post')) }}
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
							<label for='i_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>
							Name this Index (mandatory)</a></label><br />
							<p class='help-block'>Inherit options from other indexes, just add
							a ':' after the index name followed by the name of the index to inherit from.</p>
							<input type='text' name='i_name' placeholder='test_index'>
			
					</div>
					<div class='form-group'>
							<input type='hidden' name='type' value="{{ $type }}">
					</div>
					<div class='form-group'>
							<label for='source'><a href='http://sphinxsearch.com/docs/current.html#conf-sql-host'>Choose Source Name (mandatory)</a></label><br />
							<input type='text' name='source' placeholder='src1'>
					</div>
					<div class='form-group'>
							<label for='path'><a href='http://sphinxsearch.com/docs/current.html#conf-path'>Set index data directory (mandatory)</a></label><br />
							<input type='text' name='path' placeholder='/var/data/test'>
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
						<label for='docinfo'><a href='http://sphinxsearch.com/docs/current.html#conf-docinfo'>How to store Attributes</a></label><br />
						<p class='help-block'>This defines how attributes will be stored on disk and RAM. "none" means that there will be no attributes. Sphinx will use 'none' if you don't set any attributes. "inline" means that attributes will be stored in the .spd file, along with the document ID lists. "extern" means that the docinfo (attributes) will be stored separately (externally) from document ID lists, in a special .spa file. </p>
						<input type='text' name='docinfo' placeholder='none, extern, or inline'>
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
							<label for='index_sp'><a href='http://sphinxsearch.com/docs/current.html#conf-index-sp'>Index Sentence and Paragraph Boundaries</a></label><br />
							<p class='help-block'>This directive enables sentence and paragraph boundary indexing. It's required for the SENTENCE and PARAGRAPH operators to work. Sentence boundary detection is based on plain text analysis, so you only need to set index_sp = 1 to enable it. Paragraph detection is however based on HTML markup, and happens in the HTML stripper. So to index paragraph locations you also need to enable the stripper by specifying html_strip = 1. Both types of boundaries are detected based on a few built-in rules which you can learn more about by following the link on this section's title. </p>
							<input type='text' name='index_sp' placeholder='1 or 0. 0 is default.'>
					</div>
					<div class='form-group'>
							<label for='html_strip'><a href='http://sphinxsearch.com/docs/current.html#conf-html-strip'>HTML Stripper (other options need this..)</a></label><br />
							<p class='help-block'>Whether to strip HTML markup from incoming full-text data. HTML tags are removed, their contents are left intact by default. You can choose to keep and index attributes of the tags (e.g., HREF attribute in an A tag, or ALT in an IMG one) with the next option ('html_index_attrs').</p> 
							<input type='text' name='html_strip' placeholder='1 or 0. 0 is default.'>
					</div>
					<div class='form-group'>
							<label for='html_index_attrs'><a href='http://sphinxsearch.com/docs/current.html#conf-html-index-attrs'>HTML/XML tags to index</a></label><br />
							<p class='help-block'>Specifies HTML markup attributes whose contents should be retained and indexed even though other HTML markup is stripped. The format is per-tag enumeration of indexable attributes, as shown in the example below. </p>
							<textarea type='text' name='html_index_attrs' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='index_zones'><a href='http://sphinxsearch.com/docs/current.html#conf-index-zones'>Index HTML/XML zones (tags)</a></label><br />
							<p class='help-block'>Zones can be formally defined as follows. Everything between an opening and a matching closing tag is called a span, and the aggregate of all spans sharing the same tag name is a zone. For instance, everything between the occurrences of H1 and /H1 in the document field belongs to the H1 zone. In short, use this to enable the ZONE search operator!</p>
							<textarea type='text' name='index_zones' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
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
									<label for='morphology'><a href='http://sphinxsearch.com/docs/current.html#conf-morphology'>Morphology Preprocessors</a></label><br />
									<p class='help-block'> These can used, while indexing, to replace different forms of the same word with their normalized form. For instance, The English stemmer will normalize both "dogs" and "dog" to "dog", making search results for both searches the same. Sphinx supports lemmatizers, stemmers, and phonetic algorithms. </p>
									<textarea type='text' name='morphology' placeholder='Comma separated list. Like this: stem_en, libstemmer_sv' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='min_stemming_len'><a href='http://sphinxsearch.com/docs/current.html#conf-min-stemming-len'>Minimum Stemming Length</a></label><br />
												<p class="help-block">Stemmers are not perfect, and might sometimes produce undesired results. For instance, running "gps" keyword through Porter stemmer for English results in "gp", which is not really the intent. min_stemming_len feature lets you suppress stemming based on the source word length, ie. to avoid stemming too short words. Keywords that are shorter than the given threshold will not be stemmed. Note that keywords that are exactly as long as specified will be stemmed. So in order to avoid stemming 3-character keywords, you should specify 4 for the value. For more finely grained control, refer to wordforms feature.</p>
							<input type='text' name='min_stemming_len' placeholder='4'">
					</div>
					<div class='form-group'>
							<label for='stopwords'><a href='http://sphinxsearch.com/docs/current.html#conf-stopwords'>Stopwords Files</a></label><br />
							<p class="help-block">Stopwords are the words that will not be indexed. Typically you'd put most frequent words in the stopwords list because they do not add much value to search results but consume a lot of resources to process.</p>
							<textarea type='text' name='stopwords' placeholder='/usr/local/sphinx/data/stopwords.txt' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='wordforms'><a href='http://sphinxsearch.com/docs/current.html#conf-wordforms'>Wordforms Dictionary</a></label><br />
							<p class='help-block'>Word forms are applied after tokenizing the incoming text by charset_table rules. They essentially let you replace one word with another. Normally, that would be used to bring different word forms to a single normal form (eg. to normalize all the variants such as "walks", "walked", "walking" to the normal form "walk"). It can also be used to implement stemming exceptions, because stemming is not applied to words found in the forms list.</p>
							<input type='text' name='wordforms' placeholder='/usr/local/sphinx/data/wordforms.txt' style="width:300px!important">
					</div>
					<div class='form-group'>
							<label for='embedded_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-embedded-limit'>Embedded File Size Limit</a></label><br />
							<p class="help-block">Before 2.1.1-beta, the contents of exceptions, wordforms, or stopwords files were always kept in the files. Only the file names were stored into the index. Starting with 2.1.1-beta, indexer can either save the file name, or embed the file contents directly into the index. Files sized under embedded_limit get stored into the index. For bigger files, only the file names are stored. This also simplifies moving index files to a different machine; you may get by just copying a single file.</p>
							<input type='text' name='embedded_limit' placeholder='32K'">
					</div>
					<div class='form-group'>
							<label for='exceptions'><a href='http://sphinxsearch.com/docs/current.html#conf-exceptions'>Exceptions File Path</a></label><br />
							<p class="help-block">Exceptions allow to map one or more tokens (including tokens with characters that would normally be excluded) to a single keyword. They are similar to wordforms in that they also perform mapping, but have a number of important differences.</p>
							<input type='text' name='exceptions' placeholder='/usr/local/sphinx/data/exceptions.txt' style="width:300px!important">
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
    {{ Form::open(array('action'=>'IndicesController@store', 'method'=>'post')) }}
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
					{{ Form::open(array('action'=>'IndicesController@store', 'method'=>'post')) }}
						<div class='form-group'>
							<label for='i_name'><a href='http://sphinxsearch.com/docs/current.html#confgroup-index'>
							Name this Index (mandatory)</a></label><br />
							<p class='help-block'>To inherit options from other indexes, just add
							a ':' after the index name followed by the name of the index to inherit from.</p>
							<input type='text' name='i_name' placeholder='test_index'>					
						</div>
						<div class='form-group'>
							<input type='hidden' name='type' value="{{ $type }}">
						</div>
						<div class='form-group'>
							<label for='path'><a href='http://sphinxsearch.com/docs/current.html#conf-path'>Set index data directory (mandatory)</a></label><br />
							<input type='text' name='path' placeholder='/var/data/test'>
						</div>
						<div class='form-group'>
							<label for='rt_field'><a href='http://sphinxsearch.com/docs/current.html#conf-rt-field'>Full-text field declaration (mandatory)</a></label><br />
							<p class='help-block'>Full-text fields to be indexed are declared using rt_field directive. List all fields separated by a comma. The names must be unique. The order is preserved; and so field values in INSERT statements without an explicit list of inserted columns will have to be in the same order as configured.</p>
							<textarea type='text' name='rt_field' placeholder='rt_field = some_field, rt_field = some_other_field, etc..' style="width:300px!important"></textarea>
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
						<label for='rt_attr'><a href='http://sphinxsearch.com/docs/current.html#conf-rt-attr-uint'>RT attributes</a></label><br />
						<p class='help-block'>List all attributes (rt_attr_...) here, separated by a comma. Possible attributes types include: 
						<ul>
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-uint">rt_attr_uint (unsigned integer)</a></li>
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-bool">rt_attr_bool (boolean)</a></li>
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-bigint">rt_attr_bigint (big integer)</a></li>
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-float">rt_attr_float (floating point)</a></li> 
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-multi">rt_attr_multi (multi value attribute)</a></li> 
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-multi-64">rt_attr_multi_64</a></li>
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-timestamp">rt_attr_timestamp (unix timestamp)</a></li> 
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-string">rt_attr_string (string)</a></li> 
							<li><a href="http://sphinxsearch.com/docs/current.html#conf-rt-attr-json">rt_attr_json (JSON)</a></li>
						</ul></p>				
						<textarea type='text' name='rt_attr' placeholder='rt_attr_uint = unsigned, rt_attr_json = json, etc..' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='docinfo'><a href='http://sphinxsearch.com/docs/current.html#conf-docinfo'>How to store Attributes</a></label><br />
							<p class='help-block'>This defines how attributes will be stored on disk and RAM. "none" means that there will be no attributes. Sphinx will use 'none' if you don't set any attributes. "inline" means that attributes will be stored in the .spd file, along with the document ID lists. "extern" means that the docinfo (attributes) will be stored separately (externally) from document ID lists, in a special .spa file. </p>
							<input type='text' name='docinfo' placeholder='none, extern, or inline'>
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
							<label for='morphology'><a href='http://sphinxsearch.com/docs/current.html#conf-morphology'>Morphology Preprocessors</a></label><br />
							<p class='help-block'> These can used, while indexing, to replace different forms of the same word with their normalized form. For instance, The English stemmer will normalize both "dogs" and "dog" to "dog", making search results for both searches the same. Sphinx supports lemmatizers, stemmers, and phonetic algorithms. </p>
							<textarea type='text' name='morphology' placeholder='Comma separated list. Like this: stem_en, libstemmer_sv' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='min_stemming_len'><a href='http://sphinxsearch.com/docs/current.html#conf-min-stemming-len'>Minimum Stemming Length</a></label><br />
							<p class="help-block">Stemmers are not perfect, and might sometimes produce undesired results. For instance, running "gps" keyword through Porter stemmer for English results in "gp", which is not really the intent. min_stemming_len feature lets you suppress stemming based on the source word length, ie. to avoid stemming too short words. Keywords that are shorter than the given threshold will not be stemmed. Note that keywords that are exactly as long as specified will be stemmed. So in order to avoid stemming 3-character keywords, you should specify 4 for the value. For more finely grained control, refer to wordforms feature.</p>
							<input type='text' name='min_stemming_len' placeholder='4'">
					</div>
					<div class='form-group'>
							<label for='stopwords'><a href='http://sphinxsearch.com/docs/current.html#conf-stopwords'>Stopwords Files</a></label><br />
												<p class="help-block">Stopwords are the words that will not be indexed. Typically you'd put most frequent words in the stopwords list because they do not add much value to search results but consume a lot of resources to process.</p>
							<textarea type='text' name='stopwords' placeholder='/usr/local/sphinx/data/stopwords.txt' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='wordforms'><a href='http://sphinxsearch.com/docs/current.html#conf-wordforms'>Wordforms Dictionary</a></label><br />
							<p class='help-block'>Word forms are applied after tokenizing the incoming text by charset_table rules. They essentially let you replace one word with another. Normally, that would be used to bring different word forms to a single normal form (eg. to normalize all the variants such as "walks", "walked", "walking" to the normal form "walk"). It can also be used to implement stemming exceptions, because stemming is not applied to words found in the forms list.</p>
							<input type='text' name='wordforms' placeholder='/usr/local/sphinx/data/wordforms.txt' style="width:300px!important">
					</div>
					<div class='form-group'>
							<label for='exceptions'><a href='http://sphinxsearch.com/docs/current.html#conf-exceptions'>Exceptions File Path</a></label><br />
							<p class="help-block">Exceptions allow to map one or more tokens (including tokens with characters that would normally be excluded) to a single keyword. They are similar to wordforms in that they also perform mapping, but have a number of important differences.</p>
							<input type='text' name='exceptions' placeholder='/usr/local/sphinx/data/exceptions.txt' style="width:300px!important">
					</div>
					<div class='form-group'>
						<label for='embedded_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-embedded-limit'>Embedded File Size Limit</a></label><br />
						<p class="help-block">Before 2.1.1-beta, the contents of exceptions, wordforms, or stopwords files were always kept in the files. Only the file names were stored into the index. Starting with 2.1.1-beta, indexer can either save the file name, or embed the file contents directly into the index. Files sized under embedded_limit get stored into the index. For bigger files, only the file names are stored. This also simplifies moving index files to a different machine; you may get by just copying a single file.</p>
						<input type='text' name='embedded_limit' placeholder='32K'">
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
							<label for='index_sp'><a href='http://sphinxsearch.com/docs/current.html#conf-index-sp'>Index Sentence and Paragraph Boundaries</a></label><br />
							<p class='help-block'>This directive enables sentence and paragraph boundary indexing. It's required for the SENTENCE and PARAGRAPH operators to work. Sentence boundary detection is based on plain text analysis, so you only need to set index_sp = 1 to enable it. Paragraph detection is however based on HTML markup, and happens in the HTML stripper. So to index paragraph locations you also need to enable the stripper by specifying html_strip = 1. Both types of boundaries are detected based on a few built-in rules which you can learn more about by following the link on this section's title. </p>
							<input type='text' name='index_sp' placeholder='1 or 0. 0 is default.'>
					</div>
					<div class='form-group'>
							<label for='html_strip'><a href='http://sphinxsearch.com/docs/current.html#conf-html-strip'>HTML Stripper</a></label><br />
							<p class='help-block'>Whether to strip HTML markup from incoming full-<div class="row" style="margin-top:100px">
	<div class="col-md-12">
		<h2>{{ $conf_title }}.conf</h2>
	</div>
</div>text data. HTML tags are removed, their contents are left intact by default. You can choose to keep and index attributes of the tags (e.g., HREF attribute in an A tag, or ALT in an IMG one) with the next option ('html_index_attrs').</p> 
							<input type='text' name='html_strip' placeholder='1 or 0. 0 is default.'>
					</div>
					<div class='form-group'>
							<label for='html_index_attrs'><a href='http://sphinxsearch.com/docs/current.html#conf-html-index-attrs'>HTML/XML tags to index</a></label><br />
							<p class='help-block'>Specifies HTML markup attributes whose contents should be retained and indexed even though other HTML markup is stripped. The format is per-tag enumeration of indexable attributes, as shown in the example below. </p>
							<textarea type='text' name='html_index_attrs' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
					</div>
					<div class='form-group'>
							<label for='index_zones'><a href='http://sphinxsearch.com/docs/current.html#conf-index-zones'>Index HTML/XML zones (tags)</a></label><br />
							<p class='help-block'>Zones can be formally defined as follows. Everything between an opening and a matching closing tag is called a span, and the aggregate of all spans sharing the same tag name is a zone. For instance, everything between the occurrences of H1 and /H1 in the document field belongs to the H1 zone. In short, use this to enable the ZONE search operator!</p>
							<textarea type='text' name='index_zones' placeholder='A comma separated list of in-field HTML/XML tags to index. Like this: h*, th, title. Requires html_strip = 1!' style="width:300px!important"></textarea>
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
			@if(!empty($value) AND $key != 'id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 's_name')
				{{ $key }} = {{ $value }} <br />
			@endif
		@endforeach
		} <br /></p>
	@endforeach

@else
	<h4 class="text-center">Distributed and RT indexes don't need a source.</h4>
@endif
@stop
