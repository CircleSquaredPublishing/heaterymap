var map;
var marker;
var infoWindow;
var geocoder;

$(function ()
{
	$('[data-toggle="tooltip"]').tooltip()
});

function displayMap(coords)
{
	geocoder = new google.maps.Geocoder();

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
	var successPosition = new google.maps.LatLng(coords.latitude, coords.longitude);

	var mapOptions = {
		zoom: 13,
		center: successPosition,
		scrollwheel: false,
		panControl: false,
		zoomControl: true,
		zoomControlOptions:
		{
			position: google.maps.ControlPosition.RIGHT_BOTTOM,
			style: google.maps.ZoomControlStyle.SMALL
		},
		mapTypeControl: true,
		mapTypeControlOptions:
		{
			position: google.maps.ControlPosition.RIGHT_TOP,
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage", "Cloud", "Organic",
				google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps
				.MapTypeId.TERRAIN
			]
		}
	};

	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	map.mapTypes.set("Retro", retro_style);
	map.mapTypes.set("Apple", apple_style);
	map.mapTypes.set("Dusk", light_style);
	map.mapTypes.set("Vintage", old_style);
	map.mapTypes.set("Cloud", pale_style);
	map.mapTypes.set("Organic", brown_style);
	map.setMapTypeId("Vintage");

}