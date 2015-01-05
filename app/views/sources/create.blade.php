@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
<div class="col-md-4">

<h3> {{ $conf_title }}.conf </h3>
<br/>

{{ Form::open(array('action'=>'SourcesController@store', 'method'=>'post')) }}
	<div class='form-group'>
		<input type='hidden' name='source_type' value="{{ $source_type }}">
	</div>
	<div class="form-group">
		<label for="s_name"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Source Name (mandatory)</a></label><br />
		<p class='help-block'>To inherit options from other sources, just add
			a ':' followed by the name of the source to inherit from.</p>
		<input type="text" name="s_name" placeholder="src1 or src2:src1">
	</div>

    
    @if ($source_type !== 'xmlpipe2' && $source_type !== 'tsvpipe')
    
	<div class="form-group">
		<label for="sql_host"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-host">Host (mandatory)</a></label><br />
		<input type="text" name="sql_host" placeholder="localhost or 127.0.0.1">
	</div>
	<div class="form-group">
		<label for="sql_port"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-port">Port (mandatory)</a></label><br />
		<input type="text" name="sql_port" placeholder="3306">
	</div>
	<div class="form-group">
		<label for="sql_user"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-root">User (mandatory)</a></label><br />
		<input type="text" name="sql_user" placeholder="root">
	</div>
	<div class="form-group">	
		<label for="sql_pass"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-pass">Password</a></label><br />
		<input type="text" name="sql_pass" placeholder="password">
	</div>
	<div class="form-group">	
		<label for="sql_db"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-db">Database Name (mandatory)</a></label><br />
		<input type="text" name="sql_db" placeholder="db_name">
	</div>
	<div class="form-group">
		<label for="sql_query"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query">Main Query (mandatory)</a></label><br />
		<p class='help-block'>This is the main query, used to fetch the data you want to index.</p>
		<textarea name="sql_query" placeholder="SELECT id, group_id, UNIX_TIMESTAMP(date_added) AS date_added, title, content FROM documents"  style="width:300px!important"></textarea>
		</div>

        
      
        @if ($source_type == 'odbc')
        
		<div class="form-group">	
			<label for="odbc_dsn"><a href="http://sphinxsearch.com/docs/current.html#conf-odbc-dsn">ODBC DSN</a></label><br />
			<p class='help-block'>ODBC DSN (Data Source Name) specifies the credentials (host, user, password, etc) to use when connecting to ODBC data source. The format depends on specific ODBC driver used.</p>
			<textarea name="odbc_dsn" placeholder="Driver={Oracle ODBC Driver};Dbq=myDBName;Uid=myUsername;Pwd=myPassword" style="width:300px!important"></textarea>
		</div>
		<div class="form-group">	
			<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a></label><br />
			<p class='help-block'>ODBC and MS SQL drivers sometimes can not return the maximum actual column size to be expected. For instance, NVARCHAR(MAX) columns always report their length as 2147483647 bytes to indexer even though the actually used length is likely considerably less. However, the receiving buffers still need to be allocated upfront, and their sizes have to be determined. When the driver does not report the column length at all, Sphinx allocates default 1 KB buffers for each non-char column, and 1 MB buffers for each char column. Driver-reported column length also gets clamped by an upper limit of 8 MB, so in case the driver reports (almost) a 2 GB column length, it will be clamped and a 8 MB buffer will be allocated instead for that column. These hard-coded limits can be overridden using the sql_column_buffers directive, either in order to save memory on actually shorter columns, or overcome the 8 MB limit on actually longer columns. The directive values must be a comma-separated lists of selected column names and sizes.</p>
			<textarea name="sql_column_buffers" placeholder="mytitle=64K, mycontent=10M" style="width:300px!important"></textarea>
		</div>
@endif

        @if ($source_type == 'mssql')
			<div class="form-group">	
				<label for="mssql_winauth"><a href="http://sphinxsearch.com/docs/current.html#conf-mssql-winauth">Windows Authorization</a></label><br />
				<input type="text" name="mssql_winauth" placeholder="1 # use currently logged on user credentials"> 
			</div>
			<div class="form-group">	
				<label for="sql_column_buffers"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-column-buffers">SQL Column Buffers</a></label><br />
				<p class="help-block">ODBC and MS SQL drivers sometimes can not return the maximum actual column size to be expected. For instance, NVARCHAR(MAX) columns always report their length as 2147483647 bytes to indexer even though the actually used length is likely considerably less. However, the receiving buffers still need to be allocated upfront, and their sizes have to be determined. When the driver does not report the column length at all, Sphinx allocates default 1 KB buffers for each non-char column, and 1 MB buffers for each char column. Driver-reported column length also gets clamped by an upper limit of 8 MB, so in case the driver reports (almost) a 2 GB column length, it will be clamped and a 8 MB buffer will be allocated instead for that column. These hard-coded limits can be overridden using the sql_column_buffers directive, either in order to save memory on actually shorter columns, or overcome the 8 MB limit on actually longer columns. The directive values must be a comma-separated lists of selected column names and sizes.</p>
				<textarea name="sql_column_buffers" placeholder="content=12M, comments=1M"></textarea>
			</div>

@endif
        
			<div class="form-group">	
				<label for="sql_sock"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-sock">UNIX Socket Name</a></label><br />
				<input type="text" name="sql_sock" placeholder="/tmp/mysql.sock">
			</div>

        
        @if ($source_type == 'mysql')

			<div class="form-group">	
				<label for="mysql_connect_flags"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-connect-flags">MySQL Connect Flags</a></label><br />
				<input type="text" name="mysql_connect_flags" placeholder="32 # enables compression"> 
			</div>
			<div class="form-group">	
				<label for="mysql_ssl_cert"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">MySQL Client Certificate</a></label><br />
				<input type="text" name="mysql_ssl_cert" placeholder="/etc/ssl/client-cert.pem">
			</div>
			<div class="form-group">	
				<label for="mysql_ssl_key"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">MySQL Client Key</a></label><br />
				<input type="text" name="mysql_ssl_key" placeholder="/etc/ssl/client-key.pem"> 
			</div>
			<div class="form-group">
				<label for="mysql_ssl_ca"><a href="http://sphinxsearch.com/docs/current.html#conf-mysql-ssl">CA Certificate</a></label><br />
				<input type="text" name="mysql_ssl_ca" placeholder="/etc/ssl/client-cacert.pem">
			</div>
            
        @endif
        
			<div class="form-group">
				<label for="sql_joined_field"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-joined-field">Joined Field(s)</a></label><br />
				<p class="help-block">Joined fields let you avoid JOIN and/or GROUP_CONCAT statements in the main document fetch query (sql_query). This can be useful when SQL-side JOIN is slow, or needs to be offloaded on Sphinx side, or simply to emulate MySQL-specific GROUP_CONCAT functionality in case your database server does not support it.</p>
				<textarea name="sql_joined_field" type="text" placeholder="tagstext from query; SELECT docid, CONCAT('tag',tagid) FROM tags ORDER BY docid ASC" style="width:300px!important"></textarea>
			</div>
			<div class="form-group">
				<label for="sql_query_range"><a href="http://sphinxsearch.com/docs/current.html#conf-sql-query-range">Ranged Query</a></label><br />
				<p class="help-block">Main query, which needs to fetch all the documents, can impose a read lock on the whole table and stall the concurrent queries (eg. INSERTs to MyISAM table), waste a lot of memory for result set, etc. To avoid this, Sphinx supports so-called ranged queries. With ranged queries, Sphinx first fetches min and max document IDs from the table, and then substitutes different ID intervals into main query text and runs the modified query to fetch another chunk of documents.</p>
				<textarea type="text" name="sql_query_range" placeholder="SELECT MIN(id),MAX(id) FROM documents" style="width:300px!important"></textarea>
			</div>

   @endif
   
			<div class="form-group">
				<label for="attributes"><a href="http://sphinxsearch.com/docs/current.html#attributes">Attributes</a> <br /></label><br />
				<p class='help-block'>**Note that for xml and tsv source types, you'll have to use 'tsvpipe_attr' or 'xmlpipe_attr' instead of 'sql_attr',
				and you have to explicitly declare the full text field (with: "xmlpipe_attr_field" or "tsvpipe_attr_field") in addition to its attributes.</p>
				<p class='help-block'>Also, be aware that you can configure xmlpipe within the stream itself. Take a look at
				<a href='http://sphinxsearch.com/docs/current.html#ex-xmlpipe2-document'>this nice example</a>.</p>
				<p class='help-block'>And, be sure that the first column of tsvpipe is a unique document id-- and remember to separate each field/attribute with a comma.</p> 
				<textarea name="attributes" rows="4" placeholder="for sql type: sql_attr_uint=something, for xml type: xmlpipe_field_string, for tsv type: tsvpipe_attr_json" style="width:300px!important"></textarea>
			</div>
    
    @if ($source_type == 'xmlpipe2') 
				<div class="form-group">	
					<label for="xmlpipe_command"><a href="http://sphinxsearch.com/docs/current.html#conf-xmlpipe-command">xml_command</a></label><br />
					<p class="help-block">Are you thinking, "what does cat mean"? It means that we will be reading this file. Go <a href="http://www.linfo.org/cat.html">here</a> to learn more.</p>
					<input type="text" name="xmlpipe_command" placeholder="cat /home/sphinx/test.xml"> 
				</div>
				<div class="form-group">	
					<label for="xmlpipe_fixup_utf8"><a href="http://sphinxsearch.com/docs/current.html#conf-xmlpipe-fixup-utf8">xml_fixup_utf8</a></label><br />
					<p class="help-block">Perform Sphinx-side UTF-8 validation and filtering to prevent XML parser from choking on non-UTF-8 documents. </p>
					<input type="text" name="xmlpipe_fixup_utf8" placeholder="1"> 
				</div>
    @endif
    
    @if ($source_type == 'tsvpipe')
				<div class="form-group">	
					<label for="tsvpipe_command"><a href="http://sphinxsearch.com/docs/current.html#tsvpipe">tsvpipe_command</a></label><br />
					<p class="help-block">Are you thinking, "what does cat mean"? Well, here it means that we will be reading this file. Go <a href="http://www.linfo.org/cat.html">here</a> to learn more.</p>
					<input type="text" name="tsvpipe_command" placeholder="cat /home/sphinx/test.tsv"> 
				</div>

    @endif
{{ Form::hidden('conf_id', $conf_id) }}
			{{ Form::hidden('conf_title', $conf_title) }}
		<div class="form-group">
			<input type="submit" value="Submit">
		</div>
	</form>
@stop
