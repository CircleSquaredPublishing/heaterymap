<!DOCTYPE html>
<html>

<head>
	<title>Heatery Dashboard</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/keen-dashboards.css" />
</head>

<body class="application">

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="assets/fonts/glyphicons-halflings-regular.woff">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="navbar-brand" href="assets/fonts/glyphicons-halflings-regular.ttf">heatery.io</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="#">Dashboard</a>
					</li>
                    <li><a href="#">Home</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-6" style="height:500px;">
				<div class="chart-wrapper">
					<div class="chart-title">
						Social Trends
					</div>
					<div class="chart-stage" style="height:475px;">
					
					</div>
					<div class="chart-notes">
						What it Means.
					</div>
				</div>
			</div>

			<div class="col-sm-6" style="height:500px;">
				<div class="chart-wrapper">
					<div class="chart-title">
						<?php ?>
					</div>
                    
  
					<div class="chart-stage" style="height:475px;">
                        
				</div>

					<div class="chart-notes">
						Notes
					</div>
				</div>
			</div>

		</div>


		<div class="row">

            <div class="col-sm-12" style="margin-top:50px;">
				<div class="chart-wrapper">
					<div class="chart-title">
						Impressions by advertiser
					</div>
					<div class="chart-stage">
					
					</div>
					<div class="chart-notes">
						Notes go down here
					</div>
				</div>
			</div>

		</div>

		<hr>

		<p class="small text-muted">Built with &#9829; by <a href="https://heatery.io">Heatery IO</a>
		</p>

	</div>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/holder.js"></script>
    
	<script>
		Holder.add_theme("white",
		{
			background: "#fff",
			foreground: "#a7a7a7",
			size: 10
		});
	</script>

	<script type="text/javascript" src="assets/js/keen.min.js"></script>
	<script type="text/javascript" src="assets/js/meta.js"></script>

</body>

</html>