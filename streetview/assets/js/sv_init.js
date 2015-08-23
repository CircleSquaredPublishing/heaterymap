var map;
var marker;
var panoramaOptions;
var panorama;

function initialize()
{
	var center = new google.maps.LatLng(26.461635, -80.071123);
	var sv = new google.maps.StreetViewService();
	var retro_style = new google.maps.StyledMapType(retroStyle,
	{
		name: 'Retro'
	});
	var apple_style = new google.maps.StyledMapType(appleStyle,
	{
		name: 'Apple'
	});
	var light_style = new google.maps.StyledMapType(lightStyle,
	{
		name: 'Dusk'
	});
	var old_style = new google.maps.StyledMapType(oldStyle,
	{
		name: 'Vintage'
	});
	var pale_style = new google.maps.StyledMapType(paleStyle,
	{
		name: 'Cloud'
	});
	var brown_style = new google.maps.StyledMapType(brownStyle,
	{
		name: 'Organic'
	});
	var mapOptions = {
		zoom: 13,
		center: center,
		mapTypeControlOptions:
		{
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			mapTypeIds: ['Retro', 'Apple', 'Dusk', 'Vintage', 'Cloud', 'Organic',
				google.maps.MapTypeId.ROADMAP,
				google.maps.MapTypeId.SATELLITE,
				google.maps.MapTypeId.TERRAIN
			]
		}
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	map.mapTypes.set('Retro', retro_style);
	map.mapTypes.set('Apple', apple_style);
	map.mapTypes.set('Dusk', light_style);
	map.mapTypes.set('Vintage', old_style);
	map.mapTypes.set('Cloud', pale_style);
	map.mapTypes.set('Organic', brown_style);
	map.setMapTypeId('Vintage');

	function addMarker(feature)
	{
		var marker = new google.maps.Marker(
		{
			position: feature.position,
			map: map
		});
		var infowindow = new google.maps.InfoWindow();
		var content =
			'<div id="iwsw" class="iwsw">Street View</div>';
		google.maps.event.addDomListener(infowindow, 'domready', function ()
		{
			$('.iwsw').click(function ()
			{
				showStreetView(feature.position);
			});
		});
		google.maps.event.addListener(marker, 'click', (function (marker, content,
			infowindow)
		{
			return function ()
			{
				infowindow.setContent(content);
				infowindow.open(map, marker);
			};
		})(marker, content, infowindow));
	}
	var features = [
	{
		position: new google.maps.LatLng(26.465164, -80.067749)
	},
	{
		position: new google.maps.LatLng(26.466343, -80.070946)
	},
	{
		position: new google.maps.LatLng(26.461624, -80.067558)
	},
	{
		position: new google.maps.LatLng(26.472651, -80.097183)
	},
	{
		position: new google.maps.LatLng(26.462049, -80.068222)
	},
	{
		position: new google.maps.LatLng(26.438536, -80.071327)
	},
	{
		position: new google.maps.LatLng(26.46467, -80.070908)
	},
	{
		position: new google.maps.LatLng(26.439342, -80.079956)
	},
	{
		position: new google.maps.LatLng(26.461578, -80.068565)
	},
	{
		position: new google.maps.LatLng(26.439751, -80.069374)
	},
	{
		position: new google.maps.LatLng(26.466434, -80.071022)
	},
	{
		position: new google.maps.LatLng(26.461905, -80.071007)
	},
	{
		position: new google.maps.LatLng(26.452065, -80.088219)
	},
	{
		position: new google.maps.LatLng(26.461889, -80.06781)
	},
	{
		position: new google.maps.LatLng(26.46476, -80.07093)
	},
	{
		position: new google.maps.LatLng(26.461361, -80.072739)
	},
	{
		position: new google.maps.LatLng(26.466089, -80.071281)
	},
	{
		position: new google.maps.LatLng(26.461185, -80.063805)
	},
	{
		position: new google.maps.LatLng(26.465658, -80.066971)
	},
	{
		position: new google.maps.LatLng(26.461901, -80.060158)
	},
	{
		position: new google.maps.LatLng(26.442314, -80.07019)
	},
	{
		position: new google.maps.LatLng(26.46139, -80.058678)
	},
	{
		position: new google.maps.LatLng(26.461479, -80.070877)
	},
	{
		position: new google.maps.LatLng(26.464172, -80.068962)
	},
	{
		position: new google.maps.LatLng(26.460421, -80.071243)
	},
	{
		position: new google.maps.LatLng(26.461189, -80.066254)
	},
	{
		position: new google.maps.LatLng(26.461525, -80.068443)
	},
	{
		position: new google.maps.LatLng(26.46328, -80.073441)
	},
	{
		position: new google.maps.LatLng(26.461515, -80.072876)
	},
	{
		position: new google.maps.LatLng(26.461363, -80.067863)
	},
	{
		position: new google.maps.LatLng(26.46139, -80.072433)
	},
	{
		position: new google.maps.LatLng(26.460768, -80.093857)
	},
	{
		position: new google.maps.LatLng(26.461611, -80.07074)
	},
	{
		position: new google.maps.LatLng(26.461525, -80.068443)
	},
	{
		position: new google.maps.LatLng(26.464937, -80.070992)
	},
	{
		position: new google.maps.LatLng(26.460926, -80.058586)
	},
	{
		position: new google.maps.LatLng(26.482901, -80.065559)
	},
	{
		position: new google.maps.LatLng(26.461149, -80.058464)
	},
	{
		position: new google.maps.LatLng(26.461929, -80.069832)
	},
	{
		position: new google.maps.LatLng(26.460911, -80.058731)
	},
	{
		position: new google.maps.LatLng(26.461929, -80.068703)
	},
	{
		position: new google.maps.LatLng(26.461929, -80.070663)
	},
	{
		position: new google.maps.LatLng(26.461351, -80.068138)
	},
	{
		position: new google.maps.LatLng(26.461542, -80.071465)
	},
	{
		position: new google.maps.LatLng(26.441957, -80.072083)
	},
	{
		position: new google.maps.LatLng(26.43828, -80.072174)
	},
	{
		position: new google.maps.LatLng(26.461941, -80.070511)
	},
	{
		position: new google.maps.LatLng(26.439388, -80.082886)
	},
	{
		position: new google.maps.LatLng(26.461651, -80.071945)
	},
	{
		position: new google.maps.LatLng(26.458286, -80.110733)
	}];
	for (var i = 0, feature; feature = features[i]; i++)
	{
		addMarker(feature);
	}
}
google.maps.event.addDomListener(window, 'load', initialize);