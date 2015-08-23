<script> 
var map;
var marker;
var infoWindow;
function displayMap() {
var retro_style = new google.maps.StyledMapType(retroStyle,{name:"Retro"});
var apple_style = new google.maps.StyledMapType(appleStyle,{name:"Apple"});
var light_style = new google.maps.StyledMapType(lightStyle,{name:"Dusk"});
var old_style = new google.maps.StyledMapType(oldStyle,{name:"Vintage"});
var pale_style = new google.maps.StyledMapType(paleStyle,{name:"Cloud"});
var brown_style = new google.maps.StyledMapType(brownStyle,{name:"Organic"});
var myOptions = {
    zoom: 14,
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
    
<?php require_once 'assets/common/mrk_add.php'; ?>
    
}
    
$("#btn-heatery").click(function(){
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
            radius: 30,
            opacity: 0.3,
            gradient: gradientNew,
            map: map

                });
            }
        });
    }); 
$("#btn-on-off").click(function() {
    heatmap.setMap(heatmap.getMap() ? null : map);
    });
$("#btn-radius").click(function() {
    heatmap.set("radius", heatmap.get("radius") ? null : 60);
    });
$("#btn-opacity").click(function() {
    heatmap.set("opacity", heatmap.get("opacity") ? null : 0.3);
    });
    
google.maps.event.addDomListener(window, 'load', displayMap); 
</script>