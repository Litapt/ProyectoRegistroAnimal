<?php
require_once '../login/check.php';
require_rol('CAPTURISTA');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi mascota Comondu</title>
        <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/principalcensa.css" />
</head>
<body class="bg-success-subtle">
<header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="text-center flex-grow-1">
            <a class="ink-offset-2 link-underline link-underline-opacity-0 link-light" href="../capturista/principalCensador.php">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap header-botones">
            <a class="btn btn-sm btn-outline-danger" href="../index.php">
                Cerrar sesión
            </a>

            <a href="../accesosgral/misDatosCapturista.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>
<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card-blanca-central p-5 shadow-lg">
        <div class="d-grid gap-4">
            <a href="../registro/inicioPrincipalRegistroCapturista.php" class="boton-menu-grande">
                Registro
            </a>
            <a href="../consultasCensador/consultasCapturista.php" class="boton-menu-grande">
                Consultar
            </a>
    </div>
</main>
<div class="PIMarcaDeAgua">
    <div href="../imagenes/ImagenEquipoNF.png"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>