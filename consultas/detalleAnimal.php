<?php
require_once '../login/check.php';
require_once 'detalleDatos.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: consultas.php');
    exit();
}

$animal = obtenerAnimalPorId($conexion, $id);

if (!$animal) {
    header('Location: consultas.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Animal</title>
    <link rel="stylesheet" href="../css/misdatos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success-subtle">

<header class="p-3 PPHeader text-white d-flex align-items-center justify-content-between">
    <div>
        <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
    </div>

    <div class="text-center flex-grow-1">
        <h1 class="fw-bold mb-0">Mi mascota Comondú</h1>
        <p class="mb-0">Detalle del animal</p>
    </div>

    <a href="consultas.php" class="btn btn-light rounded-pill px-4">Regresar</a>
</header>

<main class="container py-4">

    <div class="card shadow p-4">

        <h2 class="mb-4">Información del animal</h2>

        <div class="row">
            <div class="col-md-4 mb-3">
                <strong>Nombre:</strong><br>
                <?= limpiarVista($animal['nombre_animal']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Especie:</strong><br>
                <?= limpiarVista($animal['nombre_especie']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Raza:</strong><br>
                <?= limpiarVista($animal['nombre_raza']) ?>
            </div>

            <div class="col-md-3 mb-3">
                <strong>Peso:</strong><br>
                <?= limpiarVista($animal['peso']) ?> kg
            </div>

            <div class="col-md-3 mb-3">
                <strong>Color:</strong><br>
                <?= limpiarVista($animal['colores']) ?>
            </div>

            <div class="col-md-3 mb-3">
                <strong>Sexo:</strong><br>
                <?= textoSexo($animal['sexo']) ?>
            </div>

            <div class="col-md-3 mb-3">
                <strong>Esterilizado:</strong><br>
                <?= textoBooleano($animal['esterilizado']) ?>
            </div>

            <div class="col-md-3 mb-3">
                <strong>Cartilla:</strong><br>
                <?= textoBooleano($animal['carnet_de_vacunacion']) ?>
            </div>
        </div>

        <hr>

        <h4>Dueño</h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <strong>Nombre:</strong><br>
                <?= limpiarVista($animal['nombres']) ?>
                <?= limpiarVista($animal['apellido_paterno']) ?>
                <?= limpiarVista($animal['apellido_materno']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>CURP:</strong><br>
                <?= limpiarVista($animal['curp']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Teléfono:</strong><br>
                <?= limpiarVista($animal['telefono']) ?>
            </div>

            <div class="col-md-12 mb-3">
                <a href="detalleDueno.php?id=<?= $animal['id_dueno'] ?>" class="btn btn-success">
                    Ver detalle del dueño
                </a>
            </div>
        </div>

        <hr>

        <h4>Dirección</h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <strong>Colonia:</strong><br>
                <?= limpiarVista($animal['nombre_colonia']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Ciudad:</strong><br>
                <?= limpiarVista($animal['nombre_ciudad']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Código postal:</strong><br>
                <?= limpiarVista($animal['codigo_postal']) ?>
            </div>
        </div>

    </div>

</main>

</body>
</html>