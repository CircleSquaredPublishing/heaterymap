function showStreetView(position)
{
	var panoramaOptions = {
		position: position,
		pov:
		{
			heading: 90,
			pitch: 0
		}
	};
	var panorama = new google.maps.StreetViewPanorama(document.getElementById(
		"dialog-sw-canvas"), panoramaOptions);
	map.setStreetView(panorama);
	$("#dialog-sw-canvas").dialog("open");
	google.maps.event.trigger(panorama, 'resize');
}