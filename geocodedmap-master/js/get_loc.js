/*@NOTE This script uses the HTML5 geolocation navigator to target the users current location. The initial map as well as the corresponding Heatery Map is based on that location. */ 
window.onload = getLocation;
/************************************************************\
*
\************************************************************/
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(geoSuccess, geoError, {
            maximumAge: 30000,   timeout: 10000,  enableHighAccuracy: true
        }
        );
    }
    else {
        alert("Geolocation is not supported by your browser.");
    }
}
/************************************************************\
*
\************************************************************/
function geoSuccess(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var loc = new google.maps.LatLng(lat,lng);
    displayMap(position.coords);
    var fb = "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center="+loc+"&distance=5000&fields=talking_about_count,location,name&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY";
    fb = fb.replace(/[()]/g, "");
    $(document).ready(function() {
        $.ajax({
            url: fb,  dataType: "text",  cache: true,  success: function(data) {
                var restaurantData = $.parseJSON(data);
                var myData = [];
                var gradientNew = ["rgba(0,255,255,0)",  "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)" ];
                for (var i = 0;
                i < restaurantData.data.length;
                i++) {
                    var lat = restaurantData.data[i].location.latitude;
                    var lng = restaurantData.data[i].location.longitude;
                    var wgt = restaurantData.data[i].talking_about_count;
                    var latLng = new google.maps.LatLng(lat, lng, wgt);
                    myData.push(latLng);
                }
                heatmap = new google.maps.visualization.HeatmapLayer({
                    data: myData,  radius: 20,  opacity: 0.3,  gradient: gradientNew,  map: map
                }
                );
            }
        }
        );
    }
    );
}
/************************************************************\
*
\************************************************************/
function geoError(error) {
    var retro_style = new google.maps.StyledMapType(retroStyle,  {
        name:"Retro"
    }
    );
    var apple_style = new google.maps.StyledMapType(appleStyle,  {
        name:"Apple"
    }
    );
    var light_style = new google.maps.StyledMapType(lightStyle,  {
        name:"Dusk"
    }
    );
    var old_style = new google.maps.StyledMapType(oldStyle,  {
        name:"Vintage"
    }
    );
    var pale_style = new google.maps.StyledMapType(paleStyle,  {
        name:"Cloud"
    }
    );
    var brown_style = new google.maps.StyledMapType(brownStyle,  {
        name:"Organic"
    }
    );
    geocoder = new google.maps.Geocoder();
    var errorPosition = new google.maps.LatLng(39.8282, -98.5795);
    var mapOptions = {
        zoom: 4,  center: errorPosition,  panControl: false,  zoomControl: true,  mapTypeControl: true,  mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,  position: google.maps.ControlPosition.TOP_RIGHT,  mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage","Cloud","Organic",    google.maps.MapTypeId.ROADMAP,    google.maps.MapTypeId.SATELLITE,    google.maps.MapTypeId.TERRAIN]
        }
    }
    ;
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    map.mapTypes.set("Retro", retro_style);
    map.mapTypes.set("Apple", apple_style);
    map.mapTypes.set("Dusk", light_style);
    map.mapTypes.set("Vintage", old_style);
    map.mapTypes.set("Cloud", pale_style);
    map.mapTypes.set("Organic", brown_style);
    map.setMapTypeId("Vintage");
    switch(error.code) {
        case error.PERMISSION_DENIED:  alert("The Heatery Map Requires Your Location for Accurate Results");
        break;
        case error.POSITION_UNAVAILABLE:   alert("Location information is unavailable.")  break;
        case error.TIMEOUT:   alert("The request to get user location timed out.")  break;
        case error.UNKNOWN_ERROR:   alert("An unknown error occurred.")  break;
    }
}