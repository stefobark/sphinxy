@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<h2> {{ $conf_title }}.conf </h2>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
<h3>Source Options:</h3>
	
		<div id="accordion" class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Mandatory Options</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse">
					<div class="panel-body">
							{{ Form::model($source, array('route' => array('sources.update', $source->id), 'method' => 'put')) }}
						<div class='form-group'>
							<input type='hidden' name='type' value="{{ $type }}">
						</div>
						<div class="form-group">
							<label for="s_name"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Source Name</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="To inherit options from other sources, just add
								a ':' followed by the name of the source to inherit from."></span></label><br />
							<input type="text" name="s_name" placeholder="{{$source->s_name}}">
						</div>
		 
		 @if ($type !== 'xmlpipe2' && $type !== 'tsvpipe')
		 
					<div class="form-group">
						<label for="sql_host"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Host </a></label><br />
						<input type="text" name="sql_host" placeholder="{{$source->sql_host}}">
					</div>
					<div class="form-group">
						<label for="sql_port"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-port">Port</a></label><br />
						<input type="text" name="sql_port" placeholder="{{$source->sql_port}}">
					</div>
					<div class="form-group">
						<label for="sql_user"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-root">User</a></label><br />
						<input type="text" name="sql_user" placeholder="{{$source->sql_user}}">
					</div>
					<div class="form-group">	
						<label for="sql_pass"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-pass">Password</a></label><br />
						<input type="text" name="sql_pass" placeholder="{{$source->sql_pass}}">
					</div>
					<div class="form-group">	
						<label for="sql_db"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-db">Database Name</a></label><br />
						<input type="text" name="sql_db" placeholder="{{$source->sql_db}}">
					</div>
					<div class="form-group">
						<label for="sql_query"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query">Main Query (mandatory)</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="sql_query" data-content="This is the main query, used to fetch the data you want to index."></span></label><br />
						<textarea name="sql_query" placeholder="{{$source->sql_query}}" style="width:100%!important"></textarea>
					</div>
				</div>
			</div>
		</div>

		     
		   
		     @if ($type == 'odbc')
		     
					<div class="form-group">	
						<label for="odbc_dsn"><a href="http://sphinxsearch.com/docs/current.html#conf-odbc-dsn">ODBC DSN</a><span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="odbc_dsn" data-content="ODBC DSN (Data Source Name) specifies the credentials (host, user, password, etc) to use when connecting to ODBC data source. The format depends on specific ODBC driver used."></span></label><br />
						<textarea name="odbc_dsn" placeholder="{{$source->odbc_dsn}}" style="width:100%!important"></textarea>
					</div>
					<div class="form-group">	
						<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="sql_column_buffers" data-content="ODBC and MS SQL drivers sometimes can not return the maximum actual column size to be expected. For instance, NVARCHAR(MAX) columns always report their length as 2147483647 bytes to indexer even though the actually used length is likely considerably less. However, the receiving buffers still need to be allocated upfront, and their sizes have to be determined. When the driver does not report the column length at all, Sphinx allocates default 1 KB buffers for each non-char column, and 1 MB buffers for each char column. Driver-reported column length also gets clamped by an upper limit of 8 MB, so in case the driver reports (almost) a 2 GB column length, it will be clamped and a 8 MB buffer will be allocated instead for that column. These hard-coded limits can be overridden using the sql_column_buffers directive, either in order to save memory on actually shorter columns, or overcome the 8 MB limit on actually longer columns. The directive values must be a comma-separated lists of selected column names and sizes."></span></label><br />
						<textarea name="sql_column_buffers" placeholder="{{$source->sql_column_buffers}}" style="width:100%!important"></textarea>
					</div>
				</div>
			</div>
		</div>
	@endif

		     @if ($type == 'mssql')
				<div class="form-group">	
					<label for="mssql_winauth"><a href="http://sphinxsearch.com/docs/current.html#conf-mssql-winauth">Windows Authorization</a></label><br />
					<input type="text" name="mssql_winauth" placeholder="{{$source->mssql_winauth}}"> 
				</div>
				<div class="form-group">	
					<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="sql_column_buffers" data-content="ODBC and MS SQL drivers sometimes can not return the maximum actual column size to be expected. For instance, NVARCHAR(MAX) columns always report their length as 2147483647 bytes to indexer even though the actually used length is likely considerably less. However, the receiving buffers still need to be allocated upfront, and their sizes have to be determined. When the driver does not report the column length at all, Sphinx allocates default 1 KB buffers for each non-char column, and 1 MB buffers for each char column. Driver-reported column length also gets clamped by an upper limit of 8 MB, so in case the driver reports (almost) a 2 GB column length, it will be clamped and a 8 MB buffer will be allocated instead for that column. These hard-coded limits can be overridden using the sql_column_buffers directive, either in order to save memory on actually shorter columns, or overcome the 8 MB limit on actually longer columns. The directive values must be a comma-separated lists of selected column names and sizes."></span></label><br />
					<textarea name="sql_column_buffers" placeholder="{{$source->sql_column_buffers}}"></textarea>
				</div>

	@endif
		     	<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Eveything else</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="form-group">	
								<label for="sql_sock"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-sock">UNIX Socket Name</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="sql_sock" data-content="UNIX socket name to connect to for local SQL servers. Optional, default value is empty (use client library default settings)."></span></label><br />
								<input type="text" name="sql_sock" placeholder="{{$source->sql_sock}}">
							</div>

							<div class="form-group">
								<label for="attributes"><a href="http://sphinxsearch.com/docs/current.html#attributes">Attributes</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="attributes" data-content="**Note that for xml and tsv source types, you'll 
								have to use 'tsvpipe_attr' or 'xmlpipe_attr' instead of 'sql_attr',
								and you have to explicitly declare the full text field (with: 'xmlpipe_attr_field' or 'tsvpipe_attr_field') in addition to its attributes. Also, be aware that 
								you can configure xmlpipe within the stream itself. And, be sure that the first column of tsvpipe is a unique document id-- and remember to separate each 
								field/attribute with a comma."></span> <br /></label><br />
								<textarea name="attributes" rows="4" placeholder="{{$source->attributes}}" style="width:100%!important"></textarea>
							</div>
		     
		     @if ($type == 'mysql')

				<div class="form-group">	
					<label for="mysql_connect_flags"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-connect-flags">MySQL Connect Flags</a></label><br />
					<input type="text" name="mysql_connect_flags" placeholder="{{$source->mysql_connect_flags}}"> 
				</div>
				<div class="form-group">	
					<label for="mysql_ssl_cert"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">MySQL Client Certificate</a></label><br />
					<input type="text" name="mysql_ssl_cert" placeholder="{{$source->mysql_ssl_cert}}">
				</div>
				<div class="form-group">	
					<label for="mysql_ssl_key"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">MySQL Client Key</a></label><br />
					<input type="text" name="mysql_ssl_key" placeholder="{{$source->mysql_ssl_key}}"> 
				</div>
				<div class="form-group">
					<label for="mysql_ssl_ca"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">CA Certificate</a></label><br />
					<input type="text" name="mysql_ssl_ca" placeholder="{{$source->mysql_ssl_ca}}">
				</div>
		         
		     @endif
		     
				<div class="form-group">
					<label for="sql_joined_field"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-joined-field">Joined Field(s)</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="sql_joined_field" data-content="Joined fields let you avoid JOIN and/or GROUP_CONCAT statements in the main document fetch query (sql_query). This can be useful when SQL-side JOIN is slow, or needs to be offloaded on Sphinx side, or simply to emulate MySQL-specific GROUP_CONCAT functionality in case your database server does not support it."></span></label><br />
					<textarea name="sql_joined_field" type="text" placeholder="{{$source->sql_joined_field}}" style="width:100%!important"></textarea>
				</div>
				<div class="form-group">
					<label for="sql_query_range"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query-range">Ranged Query</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="sql_query_range" data-content="Main query, which needs to fetch all the documents, can impose a read lock on the whole table and stall the concurrent queries (eg. INSERTs to MyISAM table), waste a lot of memory for result set, etc. To avoid this, Sphinx supports so-called ranged queries. With ranged queries, Sphinx first fetches min and max document IDs from the table, and then substitutes different ID intervals into main query text and runs the modified query to fetch another chunk of documents."></span></label><br />
					<p class="help-block"></p>
					<textarea type="text" name="sql_query_range" placeholder="{{$source->sql_query_range}}" style="width:100%!important"></textarea>
				</div>

		@endif
		
		 @if ($type == 'xmlpipe2') 
					<div class="form-group">	
						<label for="xmlpipe_command"><a href="http://sphinxsearch.com/docs/current.html#conf-xmlpipe-command">xml_command</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="sql_query_range" data-content="Point to the directory of your xml file."></span></label><br />
						<input type="text" name="xmlpipe_command" placeholder="{{$source->xmlpipe_command}}"> 
					</div>
					<div class="form-group">	
						<label for="xmlpipe_fixup_utf8"><a href="http://sphinxsearch.com/docs/current.html#conf-xmlpipe-fixup-utf8">xml_fixup_utf8</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="xmlpipe_fixup_utf8" data-content="Perform Sphinx-side UTF-8 validation and filtering to prevent XML parser from choking on non-UTF-8 documents."></span></label><br />
						<input type="text" name="xmlpipe_fixup_utf8" placeholder="{{$source->xmlpipe_fixup_utf8}}"> 
					</div>
		 @endif
		 
		 @if ($type == 'tsvpipe')
					<div class="form-group">	
						<label for="tsvpipe_command"><a href="http://sphinxsearch.com/docs/current.html#tsvpipe">tsvpipe_command</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="tsvpipe_command" data-content="Point to the directory of your tsv file"></span></label><br />
						<input type="text" name="tsvpipe_command" placeholder="{{$source->tsvpipe_command}}"> 
					</div>
				
		 @endif
		 </div>
			</div>
		</div>
	</div>
	{{ Form::hidden('conf_id', $conf_id) }}
	{{ Form::hidden('conf_title', $conf_title) }}
			<div class="form-group">
				<input type="submit" value="Submit">
			</div>
		</form>
	@stop
