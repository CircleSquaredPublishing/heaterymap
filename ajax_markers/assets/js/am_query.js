/* jQuery AJAX function that calls the Facebook Graph API
---------------------------------------------------------*/
/*@FIXME Clear layer before adding a new one.*/
/*
window.onload = getLocation;
function getLocation()
{
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(geoSuccess, geoError,
		{
			maximumAge: 30000,
			timeout: 10000,
			enableHighAccuracy: true
		});
	}
	else
	{
		alert("Geolocation is not supported by your browser.");
	}

function geoSuccess(position){
	var lat = position.coords.latitude;
	var lng = position.coords.longitude;
	var loc = new google.maps.LatLng(lat, lng);
    
	displayMap(position.coords);
    
    var fb =
		"https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=" +
		loc +
		"&distance=5000&fields=talking_about_count,location,name&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY";
	fb = fb.replace(/[()]/g, "");
	$(document).ready(function ()
	{
		$.ajax(
		{
			url: fb,
			dataType: "text",
			cache: true,
			success: function (data)
			{
				var restaurantData = $.parseJSON(data);
				var myData = [];
				var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)",
					"rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)",
					"rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)",
					"rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)",
					"rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)",
					"rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)",
					"rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)",
					"rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)",
					"rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)",
					"rgba(255, 0, 7, 1)"
				];
				for (var i = 0; i < restaurantData.data.length; i++)
				{
					var lat = restaurantData.data[i].location.latitude;
					var lng = restaurantData.data[i].location.longitude;
					var wgt = restaurantData.data[i].talking_about_count;
					var latLng = new google.maps.LatLng(lat, lng, wgt);
					myData.push(latLng);
				}
				heatmap = new google.maps.visualization.HeatmapLayer(
				{
					data: myData,
					radius: 20,
					opacity: 0.3,
					gradient: gradientNew,
					map: map
				});
			}
		});
	});
}
    
function geoError(error)
{
	var retro_style = new google.maps.StyledMapType(retroStyle,
	{
		name: "Retro"
	});
	var apple_style = new google.maps.StyledMapType(appleStyle,
	{
		name: "Apple"
	});
	var light_style = new google.maps.StyledMapType(lightStyle,
	{
		name: "Dusk"
	});
	var old_style = new google.maps.StyledMapType(oldStyle,
	{
		name: "Vintage"
	});
	var pale_style = new google.maps.StyledMapType(paleStyle,
	{
		name: "Cloud"
	});
	var brown_style = new google.maps.StyledMapType(brownStyle,
	{
		name: "Organic"
	});
	geocoder = new google.maps.Geocoder();
	var errorPosition = new google.maps.LatLng(39.8282, -98.5795);
	var mapOptions = {
		zoom: 4,
		center: errorPosition,
		panControl: false,
		zoomControl: true,
		mapTypeControl: true,
		mapTypeControlOptions:
		{
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.TOP_RIGHT,
			mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage", "Cloud", "Organic",
				google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps
				.MapTypeId.TERRAIN
			]
		}
	};
	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	map.mapTypes.set("Retro", retro_style);
	map.mapTypes.set("Apple", apple_style);
	map.mapTypes.set("Dusk", light_style);
	map.mapTypes.set("Vintage", old_style);
	map.mapTypes.set("Cloud", pale_style);
	map.mapTypes.set("Organic", brown_style);
	map.setMapTypeId("Vintage");
	switch (error.code)
	{
	case
	error.PERMISSION_DENIED:
		alert("The Heatery Map Requires Your Location for Accurate Results");
		break;
	case
	error.POSITION_UNAVAILABLE:
		alert("Location information is unavailable.")
		break;
	case
	error.TIMEOUT:
		alert("The request to get user location timed out.")
		break;
	case
	error.UNKNOWN_ERROR:
		alert("An unknown error occurred.")
		break;
	}
}
}
*/
$(document).ready(function() {

$("#btn-search").click(function(){
function codeAddress() {
    var hm_address = document.getElementById('address').value;
    geocoder.geocode( {
        address: hm_address,
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
        var fb = "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center="+loc+"&distance=8000&fields=talking_about_count,location,name&offset=0&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY";
fb = fb.replace(/[()]/g, "");
           console.log(fb);
//$(document).ready(function() {   
            $.ajax({
                url: fb,  
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
                        var name = restaurantData.data[i].name;
                        var address = restaurantData.data[i].location.street;
                        var latLng = new google.maps.LatLng(lat, lng, wgt);
                        myData.push(latLng);
                        }
                    heatmap = new google.maps.visualization.HeatmapLayer({
                        data: myData, 
                        map: map,
                        radius: 20,  
                        opacity: 0.3,  
                        gradient: gradientNew
                    });
                }
            });
        });
    }
 });
$("#get_heatery").click(function(){
$.ajax({
url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=26.47,-80.07&distance=8000&fields=talking_about_count,location,name&offset=0&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",
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
    
    
$(window).load(function () {
    $.get('assets/db/am_query.json', function (json)
	{
		var bounds = new google.maps.LatLngBounds();
		$.each(json, function (key, data)
		{
			var name = data.name;
			var latLng = new google.maps.LatLng(data.lat, data.lng);
			var marker = new google.maps.Marker(
			{
				position: latLng,
				map: map,
				title: data.name
			});
            bounds.extend(marker.getPosition());
			var description = data.description;
			var website = data.web;
			var likes = data.likes;
			var whc = data.were_here;
			var tac = data.talking_about;
			var price = data.price;
			var address = data.address;
			var city = data.city;
			var state = data.state;
			var postal = data.postal;
			var pk_street = data.pk_street;
			var pk_lot = data.pk_lot;
			var pk_valet = data.pk_valet;
			var breakfast = data.breakfast;
			var lunch = data.lunch;
			var dinner = data.dinner;
			var coffee = data.coffee;
			var drinks = data.drinks;
			var reserve = data.reserve;
			var walkins = data.walkins;
			var groups = data.groups;
			var kids = data.kids;
			var takeout = data.takeout;
			var delivery = data.delivery;
			var catering = data.catering;
			var waiter = data.waiter;
			var outdoor = data.outdoor;
			var html =
				'<div id="iw-container">' +

				'<div class="iw-title">' + name + '</div>' +

				'<div class="iw-content">' +

				'<table class="table-striped table-bordered table-condensed" id= "inf_table">' +
				'<tr>' +
				'<th>Likes</th>' +
				'<th>Were Here</th>' +
				'<th>Talking About</th>' +
				'<th>Price</th>' +
				'</tr>' +
				'<td><b>' + likes + '</b></td>' +
				'<td><b>' + whc + '</b></td>' +
				'<td><b>' + tac + '</b><br></td><td><b>' + price + '</b><br>' +
				'</td>' +
				'</table>' +

				'<b>Description:</b><hr><p>' + description + '</p>' +

				'<div class="iw-subTitle"></div>' +

				'<p>' + address + '<br>' + city + ',&nbsp' + state + '&nbsp;' +
				postal + '<br>' +

				'<b>Website:&nbsp&nbsp</b>' + '<a style="color:#0C1C01;"href=' +
				website + '>' + website + '</a><hr><br /></p>' +

				'</div>' +

				'<div class="iw-bottom-gradient"></div>' +

				'</div>';

			infoWindow = new google.maps.InfoWindow(
			{
				content: html,
				maxWidth: 350
			});


			google.maps.event.addListener(marker, 'click', function ()
			{
				infoWindow.setContent(html);
				infoWindow.open(map, marker);
			});
			google.maps.event.addListener(map, 'click', function ()
			{
				infoWindow.close();
			});
			google.maps.event.addListener(infoWindow, 'load', function () {

			});
		});
		map.fitBounds(bounds);
	   });
    });
});

google.maps.event.addDomListener(window, "load", displayMap);