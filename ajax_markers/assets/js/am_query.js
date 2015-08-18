$(window).load(function ()
{

	$.get("/ajax_markers/assets/db/am_query.json", function (json)
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
google.maps.event.addDomListener(window, "load", displayMap);