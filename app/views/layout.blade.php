<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1', user-scalable=no'>
		<link href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
		<script type="text/javascript">
			$(document).ready(function(){
				 $('[data-toggle="popover"]').popover({
					  placement : 'right'
				 });
			});
			</script>
		<style>
			.navbar-default {
				 background-color: #FFF;
				 border-color: #E7E7E7;
			}
			.redish {
				 color: #FF6666;
			}
			
			.popover {
			 min-width: 600px;
			 }
			
		</style>
		
		

	</head>

	<body>

		<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:75px">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#"><img src='http://stevenjbarker.comoj.com/1guysphinx.png'>&nbsp;&nbsp;Sphinxy</a>
				</div>
			  	<div class="navbar-collapse">
					<ul class="nav navbar-nav navbar-right" style="margin-top:15px;">
						<li><a href="/Confs/new">New Configuration</a></li>
						<li><a href="/Confs/all">All Configurations</a></li>
					</ul>
			  	</div><!--/.nav-collapse -->
			</div>
		</div>
		<div class="container">
		@yield('content')
		</div>
	</body>
</html>
