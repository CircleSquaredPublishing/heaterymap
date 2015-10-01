<script>
    var map;
    var marker;
    var infoWindow;
    var myData=[];
    var TILE_SIZE = 256;
/*Begin Mercator Projection*/
function bound(value, opt_min, opt_max) {
	if (opt_min !== null) value = Math.max(value, opt_min);
	if (opt_max !== null) value = Math.min(value, opt_max);
	return value;
}
function degreesToRadians(deg) {
	return deg * (Math.PI / 180);
}
function radiansToDegrees(rad) {
	return rad / (Math.PI / 180);
}
function MercatorProjection() {
	this.pixelOrigin_ = new google.maps.Point(TILE_SIZE / 2, TILE_SIZE / 2);
	this.pixelsPerLonDegree_ = TILE_SIZE / 360;
	this.pixelsPerLonRadian_ = TILE_SIZE / (2 * Math.PI);
}
MercatorProjection.prototype.fromLatLngToPoint = function(latLng, opt_point) {
	var me = this;
	var point = opt_point || new google.maps.Point(0, 0);
	var origin = me.pixelOrigin_;
	point.x = origin.x + latLng.lng() * me.pixelsPerLonDegree_;
	var siny = bound(Math.sin(degreesToRadians(latLng.lat())), -0.9999, 0.9999);
	point.y = origin.y + 0.5 * Math.log((1 + siny) / (1 - siny)) * -me.pixelsPerLonRadian_;
	return point;
};
MercatorProjection.prototype.fromPointToLatLng = function(point) {
	var me = this;
	var origin = me.pixelOrigin_;
	var lng = (point.x - origin.x) / me.pixelsPerLonDegree_;
	var latRadians = (point.y - origin.y) / -me.pixelsPerLonRadian_;
	var lat = radiansToDegrees(2 * Math.atan(Math.exp(latRadians)) - Math.PI / 2);
	return new google.maps.LatLng(lat, lng);
};
var desiredRadiusPerPointInMeters = 150;
function getNewRadius() {
	var numTiles = 1 << map.getZoom();
	var center = map.getCenter();
	var moved = google.maps.geometry.spherical.computeOffset(center, 10000, 90); /*1000 meters to the right*/
	var projection = new MercatorProjection();
	var initCoord = projection.fromLatLngToPoint(center);
	var endCoord = projection.fromLatLngToPoint(moved);
	var initPoint = new google.maps.Point(
		initCoord.x * numTiles,
		initCoord.y * numTiles);
	var endPoint = new google.maps.Point(
		endCoord.x * numTiles,
		endCoord.y * numTiles);
	var pixelsPerMeter = (Math.abs(initPoint.x - endPoint.x)) / 10000.0;
	var totalPixelSize = Math.floor(desiredRadiusPerPointInMeters * pixelsPerMeter);
	console.log(totalPixelSize);
	return totalPixelSize;
}
/*End Mercator Projection*/
function displayMap() {
        var retro_style = new google.maps.StyledMapType(retroStyle, {
            name: "Retro"
});
        var apple_style = new google.maps.StyledMapType(appleStyle, {
            name: "Apple"
});
        var light_style = new google.maps.StyledMapType(lightStyle, {
            name: "Dusk"
});
        var old_style = new google.maps.StyledMapType(oldStyle, {
            name: "Vintage"
});
        var pale_style = new google.maps.StyledMapType(paleStyle, {
            name: "Cloud"
});
        var brown_style = new google.maps.StyledMapType(brownStyle, {
            name: "Organic"
});
        var myOptions = {
            zoom: 15,
            center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude;?>),
            panControl: false,
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_BOTTOM,
                style: google.maps.ZoomControlStyle.SMALL
            },
            mapTypeControl: true,
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP,
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage", "Cloud", "Organic", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.TERRAIN]
            }
        };
        map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
        map.mapTypes.set("Retro", retro_style);
        map.mapTypes.set("Apple", apple_style);
        map.mapTypes.set("Dusk", light_style);
        map.mapTypes.set("Vintage", old_style);
        map.mapTypes.set("Cloud", pale_style);
        map.mapTypes.set("Organic", brown_style);
        map.setMapTypeId("Vintage");
        
	google.maps.event.addListener(map, 'zoom_changed', function() {
		heatmap.setOptions({
			radius: getNewRadius()
		});
	});
        <?php require ($common_path . 'hm_add.php');?>


    }
$(document).ready(function() {
        $.ajax({
            url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=<?php echo($latitude);?>,<?php echo($longitude);?>&distance=8000&fields=talking_about_count,location,name&offset=0&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",
            cache: true,
            dataType: "text",
            success: function(data) {
                var restaurantData = $.parseJSON(data);
                var myData = [];
                var markers = [];
                var gradientNew = ["rgba(0,255,255,0)",
                    "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"
                ];
                for (var i = 0; i < restaurantData.data.length; i++) {
                    var lat = restaurantData.data[i].location.latitude;
                    var lng = restaurantData.data[i].location.longitude;
                    var wgt = restaurantData.data[i].talking_about_count;
                    var latLng = new google.maps.LatLng(lat, lng, wgt);
                    myData.push(latLng);
                }
                heatmap = new google.maps.visualization.HeatmapLayer({
                    data: myData,
                    radius: getNewRadius(),
                    opacity: 0.5,
                    gradient: gradientNew,
                    map: map

                });
            }
        });
    });

google.maps.event.addDomListener(window, 'load', displayMap);
</script>