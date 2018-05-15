google.maps.event.addDomListener(window, 'load', init);
function init() {
	// Map options
	var mapOptions = {
		zoom: 13,
		scrollwheel: false,
		draggable: false,
		rotateControl: false,
		panControl: false,
		overviewMapControl: false,
		streetViewControl: true,
		zoomControl: true,
		center: new google.maps.LatLng(59.1505091, 10.208965), // Datahjelpen
		styles: [{"featureType": "all","elementType": "labels.text.fill","stylers": [{"saturation": 36},{"color": "#2a2a2a"},{"lightness": 40}]},{"featureType": "all","elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16},{"weight": "5.00"}]},{"featureType": "all","elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "administrative","elementType": "geometry.fill","stylers": [{"color": "#f0f0f0"},{"lightness": 20}]},{"featureType": "administrative","elementType": "geometry.stroke","stylers": [{"color": "#f0f0f0"},{"lightness": 17},{"weight": 1.2}]},{"featureType": "landscape","elementType": "geometry","stylers": [{"color": "#f0f0f0"},{"lightness": 20}]},{"featureType": "landscape","elementType": "geometry.fill","stylers": [{"color": "#f0f0f0"}]},{"featureType": "poi","elementType": "geometry","stylers": [{"color": "#f0f0f0"},{"lightness": 21}]},{"featureType": "poi","elementType": "geometry.fill","stylers": [{"color": "#f0f0f0"}]},{"featureType": "road","elementType": "geometry","stylers": [{"color": "#f25b6c"}]},{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#f25b6c"},{"lightness": 17}]},{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#000000"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.highway.controlled_access","elementType": "geometry.fill","stylers": [{"color": "#f25b6c"}]},{"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#000000"},{"lightness": 18}]},{"featureType": "road.arterial","elementType": "geometry.fill","stylers": [{"color": "#f25b6c"}]},{"featureType": "road.local","elementType": "geometry","stylers": [{"color": "#f25b6c"},{"lightness": 16}]},{"featureType": "transit","elementType": "geometry","stylers": [{"color": "#000000"},{"lightness": 19}]},{"featureType": "transit.line","elementType": "geometry.fill","stylers": [{"color": "#f25b6c"}]},{"featureType": "water","elementType": "geometry","stylers": [{"color": "#8bd4ff"},{"lightness": 17}]}]
	};

	var mapElement = document.getElementById('contact-map');
	var map = new google.maps.Map(mapElement, mapOptions);
	var markerIcon = '/images/icons/marker.png';

	// Marker
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(59.1505091, 10.208965), // Datahjelpen
		map: map,
		icon: markerIcon,
		zIndex: 3,
		title: 'Datahjelpen'
	});

	// Enable controls, open url etc
	var url = "https://www.google.com/maps/place/Norneveien+1,+3226+Sandefjord,+Norge/@59.1504541,10.20889,17z/data=!3m1!4b1!4m2!3m1!1s0x4646c0c7cb7e7a6f:0xe566760b2fe7dd9f?hl=no";
	
	google.maps.event.addListener(map, 'click', function() {
		this.setOptions({scrollwheel:true,draggable:true});
	});
	
	google.maps.event.addListener(map, 'mouseover', function() {
		google.maps.event.trigger(map, 'resize');
	});

	google.maps.event.addListener(map, 'mouseout', function() {
		this.setOptions({scrollwheel:false,draggable:false});
	});
	
	google.maps.event.addListener(marker, 'click', function() {
		window.open(url, '_blank')
	});

}