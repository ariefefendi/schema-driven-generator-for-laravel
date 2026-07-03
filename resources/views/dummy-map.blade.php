<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dummy Route Follow Road</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css"/>

    <style>
        body { margin:0; }
        #map { height:100vh; }
    </style>
</head>
<body>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

<script>

// INIT MAP
var map = L.map('map').setView([-7.9785, 112.6300], 14);

// TILE OSM
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap Contributors'
}).addTo(map);

// ROUTING FOLLOW ROAD
var control = L.Routing.control({
    waypoints: [
        L.latLng(-7.9785, 112.6300),
        L.latLng(-7.9700, 112.6450)
    ],
    routeWhileDragging: false,
    show: false,
    addWaypoints: false
}).addTo(map);

// control.on('routesfound', function(e) {
//     var route = e.routes[0].coordinates;
//     var marker = L.marker(route[0]).addTo(map);

//     var i = 0;
//     var interval = setInterval(function() {
//         if (i < route.length) {
//             marker.setLatLng(route[i]);
//             i++;
//         } else {
//             clearInterval(interval);
//         }
//     }, 100);
// });

</script>

</body>
</html>