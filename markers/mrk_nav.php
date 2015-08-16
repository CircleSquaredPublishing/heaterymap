<?php /*The page navbar.*/?>
<div class="navbar navbar-custom navbar-fixed-top">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">heatery.io</a>
		<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">Heatery Map</a>
			</li>
			<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal</a>
			</li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</li>
			<li>&nbsp;</li>
		</ul>
		<div class="form-group" style="margin-right:20px;">
			<form class="form-inline" action="" method="post">
				<div id="gc-input" class="input-group" style="margin-top:10px; float: right;">
					<span class="input-group-btn">
<input class="btn btn-success btn-md" type="submit" value="Find" />
</span>
					<input style="width:250px; " id="search-box-tt" class="form-control" type="text"
					name="address" placeholder="Your Hot Spot." />
				</div>
			</form>
			<!--<div class="btn-group">
<button id="btn-on-off" class="btn btn-default btn-md" onclick="toggleHeatmap()" data-toggle="tooltip" title="Heatmap On/Off"><span class="glyphicon glyphicon-off"></span>
</button>
<button id="btn-radius" class="btn btn-default btn-md" onclick="changeRadius()" data-toggle="tooltip" title="Change Radius"><span class="glyphicon glyphicon-fullscreen"></span></button>
<button id="btn-opacity" class="btn btn-default btn-md" onclick="changeOpacity()" data-toggle="tooltip" title="Change Opacity"><span class="glyphicon glyphicon-adjust"></span></button></div>-->
		</div>
	</div>
</div>