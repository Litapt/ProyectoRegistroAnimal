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
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="Imagen.png" class="rounded-circle" width="50">
            <img src="Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
        </div>
        <div class="dropdown d-flex align-items-center">
            <a class="btn btn-sm btn-outline-light me-2" href="index.php">
                Cerrar sesion
            </a>
            <a href="misDatos.php">
                <img src="Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>

    <!-- Contenedor Principal es el centro -->
<div class="container mt-4">
        <div class="d-flex justify-content-center align-items-center gap-4">
            <span class="fw-bold fs-4">Anterior</span>
            
            <div class="paso-circulo activo">1</div>
            <div class="paso-circulo">2</div>
            <div class="paso-circulo">3</div> 
            
            <span class="fw-bold fs-4">Siguiente</span>
        </div>
    </div>
    <main class="container py-4 d-flex justify-content-center">
        <div class="bg-white p-5 rounded-5 shadow-lg w-100" style="max-width: 850px; min-height: 600px; position: relative;">
            
            <div id="paso-1">
                <h2 class="fw-bold mb-4 text-start">Seleccionar la ubicación actual</h2>
                
                <!-- Rectángulo Rojo del Mapa -->
                <div class="contenedor-mapa d-flex align-items-center justify-content-center rounded-4">
                    <span class="fs-4">MAPA</span>
                </div>
            </div>
            <div class="text-center mt-5" style="width: 100%;">
                <a href="index.php" class="btn-regresar-centrado">Regresar</a>
            </div>
        </div>
    </main>

    <div class="PIMarcaDeAgua">
        <img src="ImagenEquipoNF.png">
    </div>
</body>
</html>