<!DOCTYPE html>
<html>
<head>
	<title>google map</title>
	<link href="{{ URL::asset('public/css/gmap.css') }}" rel="stylesheet">
  <!-- <link href="{{ URL::asset('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
<div id="map"></div>
<!-- <div class="control-left-wrapper">
  <div class="zoom-in" id="zoom-in"><i class="fa fa-plus"></i></div>
  <div class="zoom-out" id="zoom-out"><i class="fa fa-minus"></i></div>
  <div class="current-location" id="current-location"><i class="fa fa-paper-plane"></i></div>
</div> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXarO1PawscqKt2Jkx23PWetzxcgWnRhc"
	defer></script>
	<script src="{{ URL::asset('public/js/gmap.js') }}"></script>
	<!-- <script>
			'user strick';
      var map, infoWindow;
      var marker;
      var mapDiv = document.getElementById('map');
      var myLatlng = {lat: 21.0277644, lng: 105.8341598};
      function initMap(){
        map = new google.maps.Map(mapDiv, {
          center: myLatlng,
          zoom: 13,
        });
        //icon marker
        var icon = {
          url: "{{URL::asset('public/img/icon/google_marker.png') }}", // url
          scaledSize: new google.maps.Size(50, 50), // scaled size
          origin: new google.maps.Point(0,0), // origin
          anchor: new google.maps.Point(0, 0) // anchor
        };
        marker = new google.maps.Marker({
          map: map,
          title: 'Hello World!',
          icon: icon,
          animation: google.maps.Animation.DROP,
        });
        var customMapType = new google.maps.StyledMapType([
        		{stylers: [{hue:'#D2E4CB'}]},
        		{
        			featureType: 'water',
        			stylers: [{color: '#599459'}]
        		}
        	]);
        var customMapTypeId = 'custom_style';
        map.mapTypes.set(customMapTypeId, customMapType);
        map.setMapTypeId(customMapTypeId);
        var zoomInButton = document.getElementById('zoom-in');
        var zoomOutButton = document.getElementById('zoom-out');
        google.maps.event.addDomListener(zoomInButton, 'click', function(){
          map.setZoom(map.getZoom()+1);
        });//add zoom
        google.maps.event.addDomListener(zoomOutButton, 'click', function(){
          map.setZoom(map.getZoom()-1);
        });//minus zoom
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            infoWindow.open(map);
            marker.setPosition(pos);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        };
        //start current location
        var currentLocationButton = document.getElementById('current-location');
        google.maps.event.addDomListener(currentLocationButton, 'click', function(){
            navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            infoWindow.open(map);
            marker.setPosition(pos);
            map.setCenter(pos);
          });
        });
        //end current location

        //start multi marker google maps
        var markers = [
          {'lat':21.0127340, 'lng': 105.7754337},
          {'lat':21.0127345, 'lng': 105.7754340},
          {'lat':21.0127350, 'lng': 105.7754345},
          {'lat':21.0127355, 'lng': 105.7754350},
          {'lat':21.0127360, 'lng': 105.7754355},
        ];
        for (var i = markers.length - 1; i >= 0; i--) {
          var newMarker = new google.maps.Marker({
            position: markers[i],
            map: map,
          })
        };
        //end multi marker google maps

        //start infowindow
        var contentString = '<div id="container">'+
        '<h1>test infowindow nguyen tien dung 1994 hedspi k57  gmail . com</h1>'+
        '</div>';
        infowindow = new google.maps.InfoWindow({
          content: contentString, //chứa nội dung bên trong
          maxwidth: 300,
        });
        marker.addListener('click', function(){
          infowindow.open(map,marker);
        });
        map.addListener('click', function(){
          infowindow.close();
        });
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Lỗi: Máy chủ định vị bị lỗi.' :
                              'Lỗi: Trình duyệt của bạn không hỗ trợ định vị.');
        infoWindow.open(map);
      }

    </script> -->
    
</body>
</html>