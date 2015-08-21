<?php /*Map goes here.*/?>

<style>
    #left {
        margin-top: 30px;
        min-width: 200px;
    }
    
    #main {
        float: left;
    }
    
    #col_head {
        background-color: rgba(200, 188, 164, 0.5);
        padding: inherit;
    }
    
    .panel {
        background-color: transparent;
    }
    
    .btn-group {
    padding:10px;
    text-align:center;
    margin-left:5%;
    margin-right:5%;
    }
    
</style>

<div id="map-canvas"></div>
<div class="container" id="main">
  <div class="row">
  	<div class="col-xs-4" id="left">
    <div id="col_head"><h2><?php echo($city);?> Heatery<br />Top Ten</h2></div>
  
      <div class="panel panel-default" style="margin-bottom:10px; background-color:rgba(200,188,164, 0.7);">
        <div class="panel-heading">Map Controls</div>
          <div class="btn-group" style="">
<button id="get_heatery" class="btn btn-default btn-md" type="button" onclick="" data-toggle="tooltip" title="Get Heatery Map"><span class="glyphicon glyphicon-fire"></span>
</button>


<button id="get_markers" class="btn btn-default btn-md" type="button" onclick="" data-toggle="tooltip" title="Show/Hide Markers"><span class="glyphicon glyphicon-map-marker"></span></button>


<button id="get_location" class="btn btn-default btn-md" type="button" onclick="getLocation()" data-toggle="tooltip" title="Share Your Current Location"><span class="glyphicon glyphicon-screenshot"></span></button>


<button id="btn-on-off" class="btn btn-default btn-md" type="button" onclick="" data-toggle="tooltip" title="Heatmap On/Off"><span class="glyphicon glyphicon-off"></span></button>


<button id="btn-radius" class="btn btn-default btn-md" type="button" onclick="" data-toggle="tooltip" title="Change Radius"><span class="glyphicon glyphicon-fullscreen"></span></button>


<button id="btn-opacity" class="btn btn-default btn-md" type="button" onclick="" data-toggle="tooltip" title="Change Opacity"><span class="glyphicon glyphicon-adjust"></span>
</button>
    </div>
      </div>       
        
<div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading"><div id="mrk_sidebar9"></div>
          <div id="mrk_sidebar1"></div>
      </div>
  
     <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading">Restaurant 3</div>
         <div id="mrk_sidebar2"></div>
      </div>
     
     <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading">Restaurant 4</div>
         <div id="mrk_sidebar3"></div>
      </div>
  
       <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading">Restaurant 5</div>
           <div id="mrk_sidebar4"></div>
      </div>
   
       <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading">Restaurant 6</div>
           <div id="mrk_sidebar5"></div>
      </div>

        <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading">Restaurant 7</div>
            <div id="mrk_sidebar6"></div>
      </div>
      
       <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading">Restaurant 8</div>
           <div id="mrk_sidebar7"></div>
      </div>

       <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading"><div id="mrk_sidebar9"></div></div>
           
      </div>
      
       <div class="panel panel-default" style="margin-bottom:10px;">
        <div class="panel-heading"><div id="mrk_sidebar9"></div></div>
         
      </div>

    </div>
    <div class="col-xs-8"><!--map-canvas will be postioned here--></div>
  </div>
</div>