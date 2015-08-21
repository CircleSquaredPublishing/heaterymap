<?php $pg_title = 'PHP Markers';?>
<?php require '../assets/common/header.php';?>

<!-- BEGIN CONTENT -->
<body style="background-color:#666;">

<!-- BEGIN NAVBAR -->
<?php 
require 'assets/common/mrk_nav.php';
require 'assets/common/mrk_page.php';
?>
    
<script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var bounds = new google.maps.LatLngBounds();
var overlayWidth = 400; // Width of the overlay DIV
var leftMargin = 30; // Grace margin to avoid too close fits on the edge of the overlay
var rightMargin = 80; // Grace margin to avoid too close fits on the right and leave space for the controls    
    
var hk_markers = [
{
'id': 1,
'name': 'El Camino',
'location': '15 NE 2nd Ave Delray Beach',
'lat': 26.461905 ,
'lng': -80.071007,
}, {
'id': 2,
'name': 'Lemongrass Asian Bistro',
'location': '420 E Atlantic Ave',
'lat': 26.461578,
'lng': -80.068565,
}, {
'id': 3,
'name': 'Vic & Angelos',
'location': '290 E. Atlantic Ave',
'lat': 26.461430,
'lng': -80.070663,
}, 
];    
var map;
var markers = [];
var markerCluster;
var side_bar_html = "";  
    

    
function showAll() {

    var infowindow = new google.maps.InfoWindow();

    for (var i = 0; i < hk_markers.length; i++) {

        var myPos = new google.maps.LatLng(hk_markers[i].lat, hk_markers[i].lng);
        var marker = new google.maps.Marker({
            position: myPos,
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(hk_markers[i].name);
                infowindow.open(map, marker);
            }
        })(marker, i));

        markers.push(marker);

        side_bar_html += '<a href="javascript: myclick(' + (markers.length - 1) + ')">' + '<p style="font-size:10px">' + hk_markers[i].name + '<br>' + hk_markers[i].location + '<br>' + 'Latitude: ' + hk_markers[i].lat + '<br>' + 'Longitude: ' + hk_markers[i].lng + '</p>' + '</a>';

    }
    markerCluster = new MarkerClusterer(map, markers);
    }    
    
function myclick(i) {
    // map.setCenter(markers[i].getPosition());
    // map.setZoom(19);
    google.maps.event.trigger(markers[i], "click");
}    
    
function displayMap() {
    
var retro_style = new google.maps.StyledMapType(retroStyle,{name:"Retro"});
var apple_style = new google.maps.StyledMapType(appleStyle,{name:"Apple"});
var light_style = new google.maps.StyledMapType(lightStyle,{name:"Dusk"});
var old_style = new google.maps.StyledMapType(oldStyle,{name:"Vintage"});
var pale_style = new google.maps.StyledMapType(paleStyle,{name:"Cloud"});
var brown_style = new google.maps.StyledMapType(brownStyle,{name:"Organic"});
var myOptions = {
    zoom: 14,
    center: new google.maps.LatLng(26.47,-80.07),
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
        mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage","Cloud","Organic", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.TERRAIN]
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

        google.maps.event.addListener(map, 'click', function () {
        infowindow.close();
    });

    showAll();
    document.getElementById("side_bar").innerHTML = side_bar_html;
    }

$("#get_heatery").click(function(){
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
        //var name = restaurantData.data[i].name;
        //var address = restaurantData.data[i].location.street;
        var latLng = new google.maps.LatLng(lat, lng, wgt);
        myData.push(latLng);
        }
        heatmap = new google.maps.visualization.HeatmapLayer({
            data: myData,
            radius: 30,
            opacity: 0.3,
            gradient: gradientNew,
            map: map

                });
            }
        });
    }); 
    
google.maps.event.addDomListener(window, 'load', displayMap);
    
</script>
    
<?php require '../assets/common/footer.php';?>