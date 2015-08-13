<!DOCTYPE html>
<html>
<head>
<title>Radius Sizer</title>
<meta charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!----------EXTERNAL LIBRARIES, SCRIPTS & STYLESHEETS---------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>       
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places">
</script> 
<link rel="stylesheet" type="text/css" href="/github/geocodedmap-master/css/style.css"/> 
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="/github/geocodedmap-master/js/custom_style.js"></script>
</head>
<!----------BEGIN CONTENT---------->  
<body style="background-color: #000">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">heatery.io</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Heatery Map</a></li>

                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                   
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="Toolbar">
    <div>
    
        <div class="input-group input-group-sm">
            <span class="input-group-btn"><button id="ButtonSearch" class="btn btn-default btn-sm" onclick="codeAddress()" title="Search"><span class="glyphicon glyphicon-search"></span></button>
            </span>
            <input id="address" type="text" class="form-control" style="width: 150px;" placeholder="Find Your Hot Spot.">
        </div>
    </div>

    <div>
        <div class="btn-group">
            <button id="toggle" class="btn btn-default btn-sm" onclick="toggleHeatmap()" data-toggle="tooltip" title="Heatmap On/Off"><span class="glyphicon glyphicon-off
"></span></button>
            <button id="radius" class="btn btn-default btn-sm" onclick="changeRadius()" data-toggle="tooltip" title="Change Radius"><span class="glyphicon glyphicon-fullscreen"></span></button>
            <button id="opacity" class="btn btn-default btn-sm" onclick="changeOpacity()" data-toggle="tooltip" title="Change Opacity"><span class="glyphicon glyphicon-adjust"></span></button>

        </div>
        <!--@end .btn-group-->
    </div>
    <!--@end #toolbar-btns .btn-group-->
 
</div>
<!--@end #inputs .Toolbar-->
       <div id="info"></div>
   <script src="/github/geocodedmap-master/js/get_loc.js"></script>
<script>
var heatmap;
var geocoder; 
var map;     
/************************************************************\
*A distance widget that will display a circle that can be resized and will
 provide the radius in km.
 @param {google.maps.Map} map The map to attach to.
 @constructor
\************************************************************/
function DistanceWidget(map) {
    this.set('map', map);
    this.set('position', map.getCenter());
    var marker = new google.maps.Marker({
        draggable: true, title: 'Move me!'
    }
    );
     // Bind the marker map property to the DistanceWidget map property
    marker.bindTo('map', this);
    // Bind the marker position property to the DistanceWidget position property
    marker.bindTo('position', this);
    // Create a new radius widget
    var radiusWidget = new RadiusWidget();
    // Bind the radiusWidget map to the DistanceWidget map
    radiusWidget.bindTo('map', this);
    // Bind the radiusWidget center to the DistanceWidget position
    radiusWidget.bindTo('center', this, 'position');
    // Bind to the radiusWidgets' distance property
    this.bindTo('distance', radiusWidget);
    // Bind to the radiusWidgets' bounds property
    this.bindTo('bounds', radiusWidget);
}
DistanceWidget.prototype = new google.maps.MVCObject();
/************************************************************\
* A radius widget that add a circle to a map and centers on a marker.
  @constructor
\************************************************************/
function RadiusWidget() {
    var circle = new google.maps.Circle({
        strokeWeight: 2
    }
    );
    // Set the distance property value, default to 50km.
    this.set('distance', 1);
    // Bind the RadiusWidget bounds property to the circle bounds property.
    this.bindTo('bounds', circle);
    // Bind the circle center to the RadiusWidget center property
    circle.bindTo('center', this);
    // Bind the circle map to the RadiusWidget map
    circle.bindTo('map', this);
    // Bind the circle radius property to the RadiusWidget radius property
    circle.bindTo('radius', this);
    // Add the sizer marker
    this.addSizer_();
}
RadiusWidget.prototype = new google.maps.MVCObject();
/* Update the radius when the distance has changed.*/
RadiusWidget.prototype.distance_changed = function() {
    this.set('radius', this.get('distance') * 1000);
};
/* Add the sizer marker to the map. @private*/
RadiusWidget.prototype.addSizer_ = function() {
    var sizer = new google.maps.Marker({
        draggable: true, title: 'Drag me!'
    }
    );
    sizer.bindTo('map', this);
    sizer.bindTo('position', this, 'sizer_position');
    var me = this;
    google.maps.event.addListener(sizer, 'drag', function() {
        // Set the circle distance (radius)
        me.setDistance();
    }
    );
};
/*Update the center of the circle and position the sizer back on the line.
*Position is bound to the DistanceWidget so this is expected to change when
*the position of the distance widget is changed.
*/    
RadiusWidget.prototype.center_changed = function() {
    var bounds = this.get('bounds');
    if (bounds) {
        var lng = bounds.getNorthEast().lng();
        var position = new google.maps.LatLng(this.get('center').lat(), lng);
        this.set('sizer_position', position);
    }
};
/**
 * Calculates the distance between two latlng locations in km.
 * @see http://www.movable-type.co.uk/scripts/latlong.html
 *
 * @param {google.maps.LatLng} p1 The first lat lng point.
 * @param {google.maps.LatLng} p2 The second lat lng point.
 * @return {number} The distance between the two points in km.
 * @private
 */
RadiusWidget.prototype.distanceBetweenPoints_ = function(p1, p2) {
    if (!p1 || !p2) {
        return 0;
    }

    var R = 6371; // Radius of the Earth in km
    var dLat = (p2.lat() - p1.lat()) * Math.PI / 180;
    var dLon = (p2.lng() - p1.lng()) * Math.PI / 180;
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(p1.lat() * Math.PI / 180) * Math.cos(p2.lat() * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;
    return d.toFixed(2);
};


/**
 * Set the distance of the circle based on the position of the sizer.
 */
RadiusWidget.prototype.setDistance = function() {
    // As the sizer is being dragged, its position changes.  Because the
    // RadiusWidget's sizer_position is bound to the sizer's position, it will
    // change as well.
    var pos = this.get('sizer_position');
    var center = this.get('center');
    var distance = this.distanceBetweenPoints_(center, pos);

    // Set the distance property for any objects that are bound to it
    this.set('distance', distance);
};

function displayMap(coords) {  var mapDiv = document.getElementById('map-canvas');
    var retro_style = new google.maps.StyledMapType(retroStyle, {  name:"Retro"  }  );
    var apple_style = new google.maps.StyledMapType(appleStyle, {  name:"Apple"  }  );
    var light_style = new google.maps.StyledMapType(lightStyle, {  name:"Dusk"  }  );
    var old_style = new google.maps.StyledMapType(oldStyle, {  name:"Vintage"  }  );
    var pale_style = new google.maps.StyledMapType(paleStyle, {  name:"Cloud"  }  );
    var brown_style = new google.maps.StyledMapType(brownStyle, {  name:"Organic"  }  );
    var map = new google.maps.Map(mapDiv, {  
        center: new google.maps.LatLng(26.461635, -80.071123),  
        zoom: 13,  
        panControl: false, 
        zoomControl: true, 
        mapTypeControl: true, 
        mapTypeControlOptions: {  
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,                 position: google.maps.ControlPosition.TOP_RIGHT, mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage","Cloud","Organic", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.TERRAIN]  
        }  
    });
    map.mapTypes.set("Retro", retro_style);
    map.mapTypes.set("Apple", apple_style);
    map.mapTypes.set("Dusk", light_style);
    map.mapTypes.set("Vintage", old_style);
    map.mapTypes.set("Cloud", pale_style);
    map.mapTypes.set("Organic", brown_style);
    map.setMapTypeId("Vintage");
                             
    var distanceWidget = new DistanceWidget(map);
    google.maps.event.addListener(distanceWidget, 'distance_changed', function() {  displayInfo(distanceWidget);
    }  );
    google.maps.event.addListener(distanceWidget, 'position_changed', function() {  displayInfo(distanceWidget);
    }  );
}
/************************************************************\
*
\************************************************************/
function displayInfo(widget) {
    var info = document.getElementById('info');
    
    info.innerHTML = 'Position: ' + widget.get('position') + '<br /> distance: ' + widget.get('distance') + ' km';
}
google.maps.event.addDomListener(window, 'load', displayMap);
</script>

<div id="map-canvas"></div>
<script src="/github/geocodedmap-master/js/ajax.js"></script> 
</body>

</html>