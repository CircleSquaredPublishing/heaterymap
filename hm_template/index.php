<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Heatmaps</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places"></script>
<style>
        html,
        body,
        #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
        
        #panel {
            position: absolute;
            top: 5px;
            left: 50%;
            margin-left: -180px;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
        }
    </style>
</head>

<body>
    <div id="panel">
        <button onclick="toggleHeatmap()">Toggle Heatmap</button>
        <button onclick="changeGradient()">Change gradient</button>
        <button onclick="changeRadius()">Change radius</button>
        <button onclick="changeOpacity()">Change opacity</button>
    </div>
    <div id="map-canvas"></div>

<script>
var map;
function initialize() {
var mapOptions = {
zoom: 13,
center: new google.maps.LatLng(26.461635, -80.071123),
mapTypeId: google.maps.MapTypeId.SATELLITE
};
map = new google.maps.Map(document.getElementById('map-canvas'),
mapOptions);
};

function toggleHeatmap() {
heatmap.setMap(heatmap.getMap() ? null : map);
}
function changeGradient() {
var gradient = ['rgba(0, 255, 255, 0)', 'rgba(0, 255, 255, 1)',
'rgba(0, 191, 255, 1)', 'rgba(0, 127, 255, 1)', 'rgba(0, 63, 255, 1)',
'rgba(0, 0, 255, 1)', 'rgba(0, 0, 223, 1)', 'rgba(0, 0, 191, 1)',
'rgba(0, 0, 159, 1)', 'rgba(0, 0, 127, 1)', 'rgba(63, 0, 91, 1)',
'rgba(127, 0, 63, 1)', 'rgba(191, 0, 31, 1)', 'rgba(255, 0, 0, 1)'
]
heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
}
function changeRadius() {
heatmap.set('radius', heatmap.get('radius') ? null : 20);
}
function changeOpacity() {
heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
}
google.maps.event.addDomListener(window, 'load', initialize);
 
$(document).ready(function() {

$.ajax({

url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=26.461635, -80.071123&distance=3200&fields=talking_about_count,location,name&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

dataType: "text",

success: function(data) {

var restaurantData = $.parseJSON(data);

var myData = [];

var gradientNew = ["rgba(0,255,255,0)",
    "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"
];

for (var i = 0; i < restaurantData.data.length; i++) {

    var lat = restaurantData.data[i].location.latitude;

    var lng = restaurantData.data[i].location.longitude;

    var wgt = restaurantData.data[i].talking_about_count;

    var name = restaurantData.data[i].name;

    var address = restaurantData.data[i].location.street;

    var latLng = new google.maps.LatLng(lat, lng, wgt);

    myData.push(latLng);

    console.log(latLng);

}

heatmap = new google.maps.visualization.HeatmapLayer({

    data: myData,

    radius: 20,

    opacity: 0.4,

    gradient: gradientNew,

    map: map

});
}
});
});
</script>

</body>
</html>