<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Map">
<head>
<title>The Delray Beach Heatery Map</title>
    
<meta charset= "UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!----------SCHEMA TAGS---------->
<meta name="description" content="See all the hottest restaurants in Delray Beach, FL as calculated by the heatery.io algorithm."/>

<meta name="keywords" content="Heatery, Delray Beach, Restaurants, Top 10, heatery.io, heatery map"/>

<meta name="author" content="Delray Beach Heatery Map"/>
    
<!----------SCHEMA.ORG MARKUP FOR GOOGLE+---------->
<meta itemprop="name" content="The Delray Beach Heatery Map">
    
<meta itemprop="description" content="Find the Hottest Restaurants in Delray Beach with the heatery.io Heatery Map!">
    
<meta itemprop="image" content="http://www.heatery.io/wp-content/uploads/2015/07/ICON-heatery-no-edge-1024x10243-e1435771319636.png">    
    
<!----------FACEBOOK OG:TAGS---------->
<meta property="og:site_name" content="heatery.io Heatery Map" />

<meta property="og:url" content="http://www.heatery.io/theDAC/"/>

<meta property="og:type" content="website"/>

<meta property="og:title" content="The Delray Beach Heatery Map"/>

<meta property="og:description" content="Find the Best Places to Be in Delray Beach Like Never Before!" />

<meta property="og:image" content="http://www.heatery.io/wp-content/uploads/2015/07/COMING-SOON-60p.png"/>

<meta property="fb:app_id" content="1452021355091002"/>
    
<!----------TWITTER CARD: TAGS---------->
<meta name="twitter:card" content="summary_large_image"/>
    
<meta name="twitter:site" content="@DelrayInfo"/>
    
<meta name="twitter:title" content="The Delray Beach Heatery Map"/>
    
<meta name="twitter:description" content="Find the Hottest Restaurants in Delray Beach with the heatery.io Heatery Map!">
    
<meta name="twitter:creator" content="@DelrayInfo"/>
    
<meta name="twitter:image:src" content="http://www.heatery.io/wp-content/uploads/2015/07/ICON-heatery-no-edge-1024x10243-e1435771319636.png"/>
    

<!----------EXTERNAL LIBRARIES---------->
<script>
    
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-64702784-1', 'auto');
  ga('send', 'pageview');

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.?&signed_in=false&libraries=visualization,places"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
</head>
<body style="background-color: #000">
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1452021355091002";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-inverse">

<div class="container-fluid">

<div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>  

        </button>

        <a class="navbar-brand" href="http://www.heatery.io">heatery.io</a>

        </div>

<div class="collapse navbar-collapse" id="myNavbar">

<ul class="nav navbar-nav">



    
</nav>

<input id="pac-input" class="controls" type="text" placeholder="Search" autocomplete="on"/>
<div id="map-canvas"></div>

<?php
require_once("/home/heatery/updateDB/connectRemote.php");
$res = $conn->query(
        
    "SELECT DISTINCT fbraw.`fbname`, 
        
    fbraw.`talking_about_count`,
    
    fbraw.`were_here_count`,
    
    fbraw.`likes`,
    
    fbraw.`city`,
    
    fbraw.`street`,
    
    fbraw.`entryDate`,
    
    fbraw.`latitude`,
    
    fbraw.`longitude`,
    
    fbraw.`rawFID`
    
    FROM fbraw
    
    WHERE entryDate >= CURDATE() 
AND
fbraw.talking_about_count>10 
AND fbraw.city='Delray Beach' 
AND fbraw.fbname != 'Delray Beach, Florida'
AND fbraw.fbname != 'Delray Beach station' 
AND fbraw.fbname != 'Entrenous Productions -Telecono' 
AND fbraw.fbname != 'The Beach' 
AND fbraw.fbname != 'Arts Garage'
AND fbraw.were_here_count>30 
AND fbraw.likes>50  
ORDER BY fbraw.heateryScore 
DESC LIMIT 10;"
    
);

$mrk_cnt = 0;

while 
    
($obj = $res->fetch_object()) {

        $lat[$mrk_cnt] = $obj->latitude;

        $lng[$mrk_cnt] = $obj->longitude;

        $fbname[$mrk_cnt] = $obj->fbname; 

        $street[$mrk_cnt] = $obj->street; 

        $date[$mrk_cnt] = $obj->entryDate; 

        $tac[$mrk_cnt] = $obj->talking_about_count; 

        $whc[$mrk_cnt] = $obj->were_here_count; 

        $likes[$mrk_cnt] = $obj->likes; 

        $mrk_cnt++;
    }
?>    

<script>
var map;

function initialize() {   
var center = new google.maps.LatLng(26.461635, -80.071123); 
    
//Add custom styling to the base map  
var retroStyle = [
    {
        "featureType": "administrative",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "landscape",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.local",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "color": "#84afa3"
            },
            {
                "lightness": 52
            }
        ]
    },
    {
        "stylers": [
            {
                "saturation": -17
            },
            {
                "gamma": 0.36
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#3f518c"
            }
        ]
    }
];

var appleStyle =[
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f7f1df"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#d0e3b4"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.medical",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#fbd3da"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#bde6ab"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffe15f"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#efd151"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "black"
            }
        ]
    },
    {
        "featureType": "transit.station.airport",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#cfb2db"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a2daf2"
            }
        ]
    }
];
    
var lightStyle =[
    {
        "featureType": "landscape",
        "stylers": [
            {
                "hue": "#FFBB00"
            },
            {
                "saturation": 43.400000000000006
            },
            {
                "lightness": 37.599999999999994
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "road.highway",
        "stylers": [
            {
                "hue": "#FFC200"
            },
            {
                "saturation": -61.8
            },
            {
                "lightness": 45.599999999999994
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "stylers": [
            {
                "hue": "#FF0300"
            },
            {
                "saturation": -100
            },
            {
                "lightness": 51.19999999999999
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "road.local",
        "stylers": [
            {
                "hue": "#FF0300"
            },
            {
                "saturation": -100
            },
            {
                "lightness": 52
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "hue": "#0078FF"
            },
            {
                "saturation": -13.200000000000003
            },
            {
                "lightness": 2.4000000000000057
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "poi",
        "stylers": [
            {
                "hue": "#00FF6A"
            },
            {
                "saturation": -1.0989010989011234
            },
            {
                "lightness": 11.200000000000017
            },
            {
                "gamma": 1
            }
        ]
    }
];
    
var oldStyle=[
    {
        "featureType": "administrative",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "landscape",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.local",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "color": "#84afa3"
            },
            {
                "lightness": 52
            }
        ]
    },
    {
        "stylers": [
            {
                "saturation": -77
            }
        ]
    },
    {
        "featureType": "road"
    }
];
    
var paleStyle =[
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": 33
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2e5d4"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#c5dac6"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#c5c6c6"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e4d7c6"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#fbfaf7"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#acbcc9"
            }
        ]
    }
];
    
var brownStyle =[
    {
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#ff4400"
            },
            {
                "saturation": -68
            },
            {
                "lightness": -4
            },
            {
                "gamma": 0.72
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.icon"
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#0077ff"
            },
            {
                "gamma": 3.1
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "hue": "#00ccff"
            },
            {
                "gamma": 0.44
            },
            {
                "saturation": -33
            }
        ]
    },
    {
        "featureType": "poi.park",
        "stylers": [
            {
                "hue": "#44ff00"
            },
            {
                "saturation": -23
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "hue": "#007fff"
            },
            {
                "gamma": 0.77
            },
            {
                "saturation": 65
            },
            {
                "lightness": 99
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "gamma": 0.11
            },
            {
                "weight": 5.6
            },
            {
                "saturation": 99
            },
            {
                "hue": "#0091ff"
            },
            {
                "lightness": -86
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": -48
            },
            {
                "hue": "#ff5e00"
            },
            {
                "gamma": 1.2
            },
            {
                "saturation": -23
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "saturation": -64
            },
            {
                "hue": "#ff9100"
            },
            {
                "lightness": 16
            },
            {
                "gamma": 0.47
            },
            {
                "weight": 2.7
            }
        ]
    }
];
    

var retro_style = new google.maps.StyledMapType(retroStyle,
                {name:'Retro'});
    
var apple_style = new google.maps.StyledMapType(appleStyle,
                {name:'Apple'});

var light_style = new google.maps.StyledMapType(lightStyle,
                {name:'Dusk'});

var old_style = new google.maps.StyledMapType(oldStyle,
                {name:'Vintage'});
    
var pale_style = new google.maps.StyledMapType(paleStyle,
                {name:'Cloud'});
    
var brown_style = new google.maps.StyledMapType(brownStyle,
                {name:'Organic'});

//Declare Map Options and Map Variable
        
var mapOptions = {
zoom: 13,
center: center,
zoomControl: true,
zoomControlOption: {
style: google.maps.ZoomControlStyle.SMALL,
},
mapTypeControl: true,
mapTypeControlOptions: {
style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
position: google.maps.ControlPosition.TOP_RIGHT,
mapTypeIds: ['Retro', 'Apple', 'Dusk', 'Vintage','Cloud','Organic', 
     google.maps.MapTypeId.ROADMAP, 
     google.maps.MapTypeId.SATELLITE, 
     google.maps.MapTypeId.TERRAIN]
}
};
      
map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    map.mapTypes.set('Retro', retro_style);
    map.mapTypes.set('Apple', apple_style);
    map.mapTypes.set('Dusk', light_style);
    map.mapTypes.set('Vintage', old_style);
    map.mapTypes.set('Cloud', pale_style);
    map.mapTypes.set('Organic', brown_style);
    map.setMapTypeId('Retro');
    
//Add Data to Info Window  
    
<?php
for ($i = 0; $i < $mrk_cnt; $i++){
    echo "var point$i = new google.maps.LatLng($lat[$i], $lng[$i]);\n";
echo "var date$i = \"$date[$i]\";\n";
echo "var fbname$i = \"$fbname[$i]\";\n";
echo "var streetText$i = \"$street[$i]\";\n";
echo "var tac$i = \"$tac[$i]\";\n";
echo "var likes$i = \"$likes[$i]\";\n";
echo "var whc$i = \"$whc[$i]\";\n";
echo "var infowindow$i = new google.maps.InfoWindow({
content:  'Reporting Date:'+' '+ date$i + '<br />' + fbname$i + '<br />' + streetText$i + '<br />' + 'Talking About:'+' '+ tac$i
});";
echo "var marker$i = new google.maps.Marker({position: point$i, map: map});\n";
echo "google.maps.event.addListener(marker$i, 
'click', function() {
infowindow$i.open(map,marker$i);
});\n";
}
?>    
    
// Insert Google Search Box Into Top Right Corner of Map   
var markers = [];    
var input =/**@type {HTMLInputElement} **/(document.getElementById('pac-input'));
    
map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
var searchBox = new google.maps.places.SearchBox((input));
    
    google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
                if (places.length == 0) {
                        return;
                    }
            for (var i = 0, marker; marker = markers[i]; i++) {
                marker.setMap(null);
                }
           
        var bounds = new google.maps.LatLngBounds();
    
                
            for (var i = 0, place; place = places[i]; i++) {
                    
                var marker = new google.maps.Marker({
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                    });
                    markers.push(marker);
                    bounds.extend(place.geometry.location);
                    }
                    map.fitBounds(bounds);
                    });
    
google.maps.event.addListener(map, 'bounds_changed', function () {
    var bounds = map.getBounds();
        searchBox.setBounds(bounds);
        });   
}
/**************** End Initialize Function ***************************/
new google.maps.event.addDomListener(window, 'load', initialize);
    
//Begin AJAX call  
jQuery.ajax({
url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=26.461635, -80.071123&distance=3200&fields=talking_about_count,location,name&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",
dataType: "text",
success: function (data) {
var restaurantData = jQuery.parseJSON(data);
var myData = [];
var gradientNew = ["rgba(0,255,255,0)",
"rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];
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
        },
    
        error: function (xhr, status, errorThrown) {
        alert("Sorry, there was a problem!");
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir(xhr);
        },
        });

</script>
</body>
</html>