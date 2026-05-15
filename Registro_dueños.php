<?php
require_once 'login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi mascota Comondu</title>
    <link rel="icon" href="../pryecto_perros/imagenes/Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="pprincipal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-success-subtle">
    <main class="container-fluid py-4 px-5">           
        <div id="paso-1">
            <h2 class="fw-bold mb-4 text-start">
                Seleccionar la ubicación actual
            </h2>
            <div class="contenedor-mapa d-flex align-items-center justify-content-center rounded-4">
                <div class="fs-4" id="map">
                </div>
            </div>
        </div>
    </main>
    <div class="text-center mt-5" style="width: 100%;">
            <a href="inicioPrincipalRegistro.php" class="btn-regresar-centrado">
                Regresar
            </a>
        </div>
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

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMAwyxekSiY4kohkudlRazWrE4R_UQjk8&callback=initMap">
    </script>
</body>
</html>