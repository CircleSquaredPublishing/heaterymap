
function codeAddress() {

var address = document.getElementById("address").value;

    geocoder.geocode( {
        
        "address": address
        
    }, 
    
function(results, status) {

        if (status == google.maps.GeocoderStatus.OK) {

            map.setCenter(results[0].geometry.location);

                var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location

                            });  
    
                } else {

                    alert("Geocode was not successful for the following reason: " + status);
                }
        
        var lat = results[0].geometry.location.lat();          
        var lng = results[0].geometry.location.lng();
        var loc = new google.maps.LatLng(lat,lng);
/*@NOTE var loc is where the geocoding magic happens. */
        
        var fb = "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center="+loc+"&distance=5000&fields=talking_about_count,location,name&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY";fb = fb.replace(/[()]/g, "");
        
        
 
$(document).ready(function() {
    $.ajax({
        url: fb,
        cache: true,
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

}
            
    heatmap = new google.maps.visualization.HeatmapLayer({

    data: myData,

    radius: 20,

    opacity: 0.3,

    gradient: gradientNew,

    map: map
                    
                        

});
            
                    }
                });
            });
        });
    }      
function toggleHeatmap() {
heatmap.setMap(heatmap.getMap() ? null : map);
}
function changeRadius() {
heatmap.set("radius", heatmap.get("radius") ? null : 50);
}
function changeOpacity() {
heatmap.set("opacity", heatmap.get("opacity") ? null : 0.3);
}  
