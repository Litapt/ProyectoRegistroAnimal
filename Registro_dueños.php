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
</head>
<body class="bg-success-subtle">
    <main class="container py-4 d-flex justify-content-center">            
        <div id="paso-1">
            <h2 class="fw-bold mb-4 text-start">
                Seleccionar la ubicación actual
            </h2>
            <!-- Rectángulo del Mapa -->
            <div class="contenedor-mapa d-flex align-items-center justify-content-center rounded-4">
                <span class="fs-4">
                    MAPA
                </span>
            </div>
        </div>
        <div class="text-center mt-5" style="width: 100%;">
            <a href="index.php" class="btn-regresar-centrado">
                Regresar
            </a>
        </div>
    </main>
</body>
</html>