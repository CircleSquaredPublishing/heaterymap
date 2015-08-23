<?php /*Map goes here.*/?>
<div class="navbar navbar-custom navbar-fixed-top">

        <div class="navbar-header">

            <a class="navbar-brand" href="#">heatery.io</a>

            <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </a>

        </div>
        <!-- @end .navbar-header -->

        <div class="navbar-collapse collapse">

            <ul class="nav navbar-nav">

                <li class="active"><a href="#">Heatery Map</a></li>

                <li><a href="#"><span class="glyphicon glyphicon-user">
</span>&nbsp;&nbsp;Client Portal</a>
                </li>

                <li><a href="#"><span class="glyphicon glyphicon-log-in">
</span>&nbsp;&nbsp;The Speak Easy&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </li>

                <li>&nbsp;</li>

            </ul>
            <!-- @end .navbar-collapse collapse -->

<div class="container" style="margin-right:20px;">

<!-- Single button -->    
    
<div class="btn-group">
    <button id="mrk_controls" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Map Controls&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker"></span></button>
    <ul class="dropdown-menu">
        <li>
            <button id="btn-heatery" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Get Heatery Map"><span class="glyphicon glyphicon-fire"></span>&nbsp;&nbsp;Get Heatery</button>
        </li>
        <li>
            <button id="btn-on-off" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Heatmap On/Off"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Toggle Heatery</button>
        </li>
        <li>
            <button id="btn-radius" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Change Radius"><span class="glyphicon glyphicon-fullscreen"></span>&nbsp;&nbsp;Change Radius</button>
        </li>
        <li>
            <button id="btn-opacity" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Change Opacity"><span class="glyphicon glyphicon-adjust"></span>&nbsp;&nbsp;Change Opacity</button>
        </li>
        <li>
            <form class="form-inline" action="" method="post">
                <div id="gc-input" class="input-group"><span class="input-group-btn"><input id="btn-find"class="btn btn-default btn-md" type="submit" value="Find" style="color:#E1F5C4; background-color:#E33258; border: 1px solid #ccc;"/></span>
                    <input id="gc-search-box" class="form-control" type="text" name="address" placeholder="Your Hot Spot." style="width:250px; background-color:#6C6352; color:#E1F5C4; letter-spacing:1.5px; font-weight:200;"/>
                </div>
            </form>
        </li>
    </ul>
</div>
    
</div>
<!--@end .navbar-collapse collapse -->
</div>
<!--@end .navbar navbar-custom navbar-fixed-top -->
</div>
<div id="map-canvas"></div>
<div class="container" id="main" style="float:left;">

<div class="row">

<div class="col-xs-4" id="left">
    
<div class="panel panel-default">

<div id="info_head" class="panel-heading"><h2><?php echo($city);?> Heatery</h2></div>

</div><!--@end .panel-heading-->
            
<div id="info_panel" class="panel panel-default" style="margin-bottom:5px;">
    
<div id="info_card" class="panel-heading"></div>
    
</div><!--@end .panel-heading-->

</div><!--@end .col-xs-4-->

<div class="col-xs-8"></div><!--@end .col-xs-8-->

</div><!--@end .row-->

</div><!--@end .container-->