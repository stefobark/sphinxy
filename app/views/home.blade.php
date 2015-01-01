<!doctype html>
<html lang="en">
<head>
<title>Sphinxy</title>
<meta name='viewport' content='width=device-width, initial-scale=1', user-scalable=no' charset="UTF-8">>
<link href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
<script src="http://code.jquery.com/jquery.js"></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
</head>

<style>
.navbar-default {
    background-color: #FFF;
    border-color: #E7E7E7;
}
</style>
<body>
 
<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:75px">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img src='http://stevenjbarker.comoj.com/1guysphinx.png'>&nbsp;&nbsp;sphinx.conf maker</a>
		</div>
		<div class="navbar-collapse collapse">
     		<ul class="nav navbar-nav navbar-right" style="margin-top:15px;">
         	<li><a href="about.php">About</a></li>
       	</ul>
     	</div><!--/.nav-collapse -->
   </div>
	<div class="container" style='margin-top:100px!important'>
		<div class="row">
			<div class="col-md-3">
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;<strong>Plain indexes</strong> (or, "batch indexes") are generated with "indexer"-- documents are indexed in batches.</p>
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;With <strong>real time indexes</strong>, indexer is not involved. You just push documents into the index and they are immediately availble for searching.</p>
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;<strong>Template indexes</strong> don't actually hold data-- they're used as "templates", to hold index settings (useful for snippets and a few other things).</p>
					<p class="help-block"><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;&nbsp;The <strong>distributed index</strong> type is really just a map that points to other instances of searchd. Your application can query this distributed index to search all the different Sphinx nodes.</p>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h4>Choose your index type:</h4>
					{{ Form::open(array('action' => 'IndicesController@create', 'method'=>'get')) }}
						{{ Form::radio("type", "plain1") }} Plain<br />
						{{ Form::radio("type", "rt") }} Realtime<br />
						{{ Form::radio('type', "template") }} Template<br />
						{{ Form::radio('type', "distributed") }} Distributed<br />
						{{ Form::submit("Submit") }}
					{{ Form::close() }}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
