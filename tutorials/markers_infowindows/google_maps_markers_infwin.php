<!DOCTYPE html>
<html>
<head> 
<meta charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tutorial Markers with infowindows</title> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places">
</script>
<link rel="stylesheet" href="/github/geocodedmap-master/css/style.css"/>
<script> 

var map = null;
function initialize() {
  var myOptions = {
    zoom: 8,
    center: new google.maps.LatLng(43.907787,-79.359741),
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"),
                                myOptions);
 
  google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        });


    
      var point = new google.maps.LatLng(43.65654,-79.90138); 
      var marker = createMarker(point,'<div style="width:240px">Some stuff to display in the First Info Window. With a <a href="http://www.econym.demon.co.uk">Link<\/a> to Mike Williams&apos; home page<\/div>')
 
      var point = new google.maps.LatLng(43.91892,-78.89231);
      var marker = createMarker(point,'Some stuff to display in the<br>Second Info Window')
 
      var point = new google.maps.LatLng(43.82589,-79.10040);
      var marker = createMarker(point,'Some stuff to display in the<br>Third Info Window')

}
 
var infowindow = new google.maps.InfoWindow(
  { 
    size: new google.maps.Size(150,50)
  });
    
function createMarker(latlng, html) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });
}
 
</script> 
</head> 
<body style="margin:0px; padding:0px;" onload="initialize()"> 
    <div id="map_canvas" style="width: 850px; height: 650px"></div> 
 

</body> 
</html> 