<?php /* The navbar for the AJAX markers map page. */ ?>
    <style>

    </style>
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
                <button id="mrk_controls" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-map-marker">
                    Map Controls&nbsp;<span class="caret"></span></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button id="get_heatery" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Get Heatery Map"><span class="glyphicon glyphicon-fire">&nbsp;Get Heatery</span>
                        </button>
                    </li>
                    <li>
                        <button id="get_markers" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Show/Hide Markers"><span class="glyphicon glyphicon-map-marker">&nbsp;Get Markers</span></button>
                    </li>
                    <li>
                        <button id="btn-on-off" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Heatmap On/Off"><span class="glyphicon glyphicon-off">&nbsp;Toggle Heatery</span></button>
                    </li>

                    <li>
                        <button id="btn-radius" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Change Radius"><span class="glyphicon glyphicon-fullscreen"></span>&nbsp;Change Radius</button>
                    </li>

                    <li>
                        <button id="btn-opacity" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Change Opacity"><span class="glyphicon glyphicon-adjust">&nbsp;Change Opacity</span>
                        </button>
                    </li>

                    <li role="separator" class="divider"></li>
                    <li>
                        <form class="form-inline" action="" method="post">
                            <div id="gc-input" class="input-group" style="margin-top:10px; float: right;"><span class="input-group-btn"><input class="btn btn-success btn-md" type="submit" value="Find" /></span>
                                <input style="width:250px; " id="search-box-tt" class="form-control" type="text" name="address" placeholder="Your Hot Spot." />
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
<!-- Modal 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title" id="myModalLabel">heatery.io </h3>
      </div>
      <div class="modal-body"><h4>
        Welcome to the Heatery Map. To get started enter a location name you are interested into the search box and click Find.</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script> -->