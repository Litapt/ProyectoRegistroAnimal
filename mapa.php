<!DOCTYPE html>
<html>
<head>
    <title>Mapa</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
function initMap() {
    const ubicacion = { lat: 24.1426, lng: -110.3128 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: ubicacion,
    });
    new google.maps.Marker({
        position: ubicacion,
        map: map,
    });
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMAwyxekSiY4kohkudlRazWrE4R_UQjk8&callback=initMap">
</script>
</body>
</html>