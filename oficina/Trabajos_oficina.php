<?php
require_once '../login/check.php';
require_rol('OFICINA');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi mascota Comondu</title>
    <link rel="icon" href="../imagenes/Imagen.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Trabajos_oficina.css" />
</head>
<body class="bg-verde-principal">
<header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
    <!-- Logos Izquierda -->
    <div class="d-flex align-items-center gap-3">
        <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
    </div>
    <div class="text-center">
        <h2 class="fw-bold mb-0">Mi mascota Comondú</h2>
        <p class="small mb-0">Registro animal del municipio de Comondú</p>
    </div>
    <!-- Acciones Derecha -->
    <div class="d-flex align-items-center gap-3">
        <a class="btn btn-cerrar-sesion" href="../inicio_sesion/index.php">Cerrar sesion</a>
        <a href="../accesosgral/misDatos.php">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </a>
    </div>
</header>
<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <!-- Tarjeta Blanca Central -->
    <div class="card-blanca-central p-5 shadow-lg">
        <div class="d-grid gap-4">
            <a href="../consultar_T.php" class="btn btn-menu-rojo">
                Consultar
            </a>
            <a href="../Estadistica_T.php" class="btn btn-menu-rojo">
                Estadistica
            </a>
        </div>
        
        <div class="text-center mt-5">
            <a href="../inicio_sesion/index.php" class="text-dark fw-bold text-decoration-none fs-4">Regresar</a>
        </div>
    </div>
</main>

<div class="PIMarcaDeAgua">
    <div href="../imagenes/ImagenEquipoNF.png"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>