<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1', user-scalable=no'>
		<link href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
		<style>
			.navbar-default {
				 background-color: #FFF;
				 border-color: #E7E7E7;
			}
		</style>

	</head>

	<body>

		<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:75px">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#"><img src='http://stevenjbarker.comoj.com/1guysphinx.png'>&nbsp;&nbsp;sphinx.conf maker</a>
				</div>
			  	<div class="navbar-collapse">
					<ul class="nav navbar-nav navbar-right" style="margin-top:15px;">
				   	<li><a href="/">New Index</a></li>
				  		<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sources<span class="caret"></span></a>
						 <!--if they click these links, it will send them to index or source and specify 'MySQL' type-->
						 		<ul class="dropdown-menu" role="menu">
							  		<li><a href="/sources/create?source_type=mysql">Add MySQL Source</a></li>
							  		<li><a href="/sources/create?source_type=pgsql">Add PostgreSQL Source</a></li>
							  		<li><a href="/sources/create?source_type=mssql">Add MSSQL Source</a></li>
							  		<li><a href="/sources/create?source_type=xmlpipe2">Add XML Source</a></li>
							  		<li><a href="/sources/create?source_type=tsvpipe">Add TSV Source</a></li>
							  		<li><a href="/sources/create?source_type=odbc">Add ODBC Source</a></li>
						 		</ul>
						</li>
						<li><a href="searchd_options.php">(re)Set Searchd Options</a></li>
						<li><a href="final.php">Config (what you have so far)</a></li>
						<li><a href="about.php">About</a></li>
					</ul>
			  	</div><!--/.nav-collapse -->
			</div>
		</div>
		<div class="container">
		@yield('content')
		</div>
	</body>
</html>
