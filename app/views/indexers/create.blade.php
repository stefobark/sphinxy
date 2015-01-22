@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
	<div class="col-md-12 text-center">
		<h2>{{ $conf_title }}.conf</h2>
		<p class="help-block">Feel free to skip this and save this configuration file now. If you leave these blank, Sphinx will just use defaults.</p> <a href="/Confs/save?conf_id={{$conf_id}}"><button class="btn btn-default">Save Configuration</button></a>
	</div>
</div>
<div class="row">
<div class="col-md-4">
<h3>Indexer Options:</h3>
		{{ Form::open(array('action'=>'IndexersController@store', 'method'=>'post')) }}
			<div class='form-group'>
				
				<label for='mem_limit'><a href='http://sphinxsearch.com/docs/current.html#conf-mem-limit'>Indexing RAM usage limit. Optional, default is 128M.</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="Enforced memory usage limit that the indexer 
				will not go above. Can be specified in bytes, or kilobytes (using K postfix), or megabytes (using M postfix); see the example. This limit will be 
				automatically raised if set to extremely low value causing I/O buffers to be less than 8 KB; the exact lower bound for that depends on the indexed 
				data size. If the buffers are less than 256 KB, a warning will be produced. 					<br />Maximum possible limit is 2047M. Too low values can 
				hurt indexing speed, but 256M to 1024M should be enough for most if not all datasets. Setting this value too high can cause SQL server timeouts. During 
				the document collection phase, there will be periods when the memory buffer is partially sorted and no communication with the database is performed; and 
				the database server can timeout. You can resolve that either by raising timeouts on SQL server side or by lowering mem_limit."></span></label><br />
				<textarea style="width:300px!important" name='mem_limit' placeholder='256M'></textarea>
			</div>
			<div class='form-group'>
				
					<label for='max_iops'><a href='http://sphinxsearch.com/docs/current.html#conf-max-iops'>Maximum I/O operations per second, for I/O throttling. Optional, default is 0 (unlimited).</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="I/O throttling related option. 
				It limits maximum count of I/O operations (reads or writes) per any given second. A value of 0 means that no limit is imposed.
					<br />indexer can cause bursts of intensive disk I/O during indexing, and it might desired to limit its disk activity 
					(and keep something for other programs running on the same machine, such as searchd). I/O throttling helps to do that. It works 
					by enforcing a minimum guaranteed delay between subsequent disk I/O operations performed by indexer. Modern SATA HDDs are able to 
					perform up to 70-100+ I/O operations per second (that's mostly limited by disk heads seek time). Limiting indexing I/O to a fraction 
					of that can help reduce search performance degradation caused by indexing."></span></label><br />
				
				<input type='text' name='max_iops' placeholder='40'>
			</div>
			<div class='form-group'>
				
				<label for='max_iosize'><a href='http://sphinxsearch.com/docs/current.html#conf-max-iosize'>Maximum allowed I/O operation size, in bytes, for I/O throttling. Optional, default is 0 (unlimited).</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="I/O throttling related option. It limits maximum 
				file I/O operation (read or write) size for all operations performed by indexer. A value of 0 means that no limit is imposed. Reads or writes that are 
				bigger than the limit will be split in several smaller operations, and counted as several operation by max_iops setting. At the time of this writing, 
				all I/O calls should be under 256 KB (default internal buffer size) anyway, so max_iosize values higher than 256 KB must not affect anything."></span></label><br />
				
				<input type='text' name='max_iosize' placeholder='1048576'>
			</div>
			<div class='form-group'>
				<label for='max_xmlpipe2_field'><a href='http://sphinxsearch.com/docs/current.html#conf-max-xmlpipe2-field'>Maximum allowed field size for XMLpipe2 source type, bytes. Optional, default is 2 MB.</a></label><br />
				<input type='text' name='max_xmlpipe2_field' placeholder='8M'>
			</div>
			<div class='form-group'>
				
				<label for='write_buffer'><a href='http://sphinxsearch.com/docs/current.html#conf-write-buffer'>Write buffer size, bytes. Optional, default is 1 MB.</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="Write buffers are used to write both temporary and final index 
				files when indexing. Larger buffers reduce the number of required disk writes. Memory for the buffers is allocated in addition to mem_limit. Note that several 
				(currently up to 4) buffers for different files will be allocated, proportionally increasing the RAM usage."></span></label><br />
				<input type='text' name='write_buffer' placeholder='4M'>
			</div>
			<div class='form-group'>
				
				<label for='max_file_field_buffer'><a href='http://sphinxsearch.com/docs/current.html#conf-max-file-field-buffer'>Maximum file field adaptive buffer size, bytes. Optional, default is 8 MB, minimum is 1 MB.</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="File field buffer is used to load files referred to 
				from sql_file_field columns. This buffer is adaptive, starting at 1 MB at first allocation, and growing in 2x steps until either file contents can be loaded,
				 or maximum buffer size, specified by max_file_field_buffer directive, is reached.<br />Thus, if there are no file fields are specified, no buffer is allocated
				  at all. If all files loaded during indexing are under (for example) 2 MB in size, but max_file_field_buffer value is 128 MB, peak buffer usage would still be
				   only 2 MB. However, files over 128 MB would be entirely skipped."></span></label><br />
				
				<input type='text' name='max_file_field_buffer' placeholder='128M'>
				
			</div>
			<div class='form-group'>
				
				<label for='on_file_field_error'><a href='http://sphinxsearch.com/docs/current.html#conf-on-file-field-error'>How to handle IO errors in file fields. Optional, default is ignore_field. Introduced in version 2.0.2-beta.</a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="When there is a problem indexing a file referenced 
				by a file field (Section 12.1.27, “sql_file_field”), indexer can either index the document, assuming empty content in this particular field, or skip the 
				document, or fail indexing entirely. on_file_field_error directive controls that behavior. The values it takes are:
					<ul>
						<li><strong>ignore_field</strong>, index the current document without field;</li>
						<li><strong>skip_document</strong>, skip the current document but continue indexing;</li>
						<li><strong>fail_index</strong>, fail indexing with an error message.</li>
					</ul>
					The problems that can arise are: open error, size error (file too big), and data read error. Warning messages on any problem will be given at all times,
					 regardless of the phase and the on_file_field_error setting.</p>
					<br />
					Note that with on_file_field_error = skip_document documents will only be ignored if problems are detected during an early check phase, and not 
					during the actual file parsing phase. indexer will open every referenced file and check its size before doing any work, and then open it again when 
					doing actual parsing work. So in case a file goes away between these two open attempts, the document will still be indexed."></span></label><br />
				
				<input type='text' name='on_file_field_error' placeholder='skip_document'>
			</div>
			<div class='form-group'>
				<label for='lemmatizer_cache'><a href='http://sphinxsearch.com/docs/current.html#conf-lemmatizer-cache'>Lemmatizer cache size. Optional, default is 256K. </a>&nbsp;<span class='glyphicon glyphicon-question-sign redish' data-toggle="popover" title="name" data-content="Our lemmatizer implementation (see Section 12.2.6, 
				“morphology” for a discussion of what lemmatizers are) uses a compressed dictionary format that enables a space/speed tradeoff. It can either perform 
				lemmatization off the compressed data, using more CPU but less RAM, or it can decompress and precache the dictionary either partially or fully, thus using 
				less CPU but more RAM. And the lemmatizer_cache directive lets you control how much RAM exactly can be spent for that uncompressed dictionary cache.
				<br />
				Note that the dictionary stays in memory at all times, too. The default cache size is 256 KB. The accepted cache sizes are 0 to 2047 MB. It's safe to 
				raise the cache size too high; the lemmatizer will only use the needed memory. For instance, the entire Russian dictionary decompresses to approximately 
				110 MB; and thus setting lemmatizer_cache anywhere higher than that will not affect the memory use: even when 1024 MB is allowed for the cache, if only 110 
				MB is needed, it will only use those 110 MB."></span></label><br />
				
				<input type='text' name='lemmatizer_cache' placeholder='256M'>
			</div>
			<div class='form-group'>
				<input type='submit' value='Submit'>
			</div>
				{{ Form::hidden('conf_id', $conf_id) }}
		{{ Form::close() }}
		</div>
	</div>
	
		@stop
		
