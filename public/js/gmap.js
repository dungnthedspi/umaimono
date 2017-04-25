$(function(){
	'user strick';

	var map;
	var mapDiv = document.getElementById('map');
	var myLatLng = {lat: 21.0277644, lng: 105.8341598};
	function initMap(){
		map = new google.maps.Map(mapDiv, {
          center: myLatLng,
          zoom: 13
        });
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });

	};
	initMap();
});