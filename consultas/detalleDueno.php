<?php
require_once '../login/check.php';
require_once 'detalleDatos.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: consultas.php');
    exit();
}

$dueno = obtenerDuenoPorId($conexion, $id);

if (!$dueno) {
    header('Location: consultas.php');
    exit();
}

$mascotas = obtenerMascotasDelDueno($conexion, $id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Dueño</title>
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
        <p class="mb-0">Detalle del dueño</p>
    </div>

    <a href="consultas.php" class="btn btn-light rounded-pill px-4">Regresar</a>
</header>

<main class="container py-4">

    <div class="card shadow p-4">

        <h2 class="mb-4">Información del dueño</h2>

        <div class="row">
            <div class="col-md-4 mb-3">
                <strong>Nombre completo:</strong><br>
                <?= limpiarVista($dueno['nombres']) ?>
                <?= limpiarVista($dueno['apellido_paterno']) ?>
                <?= limpiarVista($dueno['apellido_materno']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>CURP:</strong><br>
                <?= limpiarVista($dueno['curp']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Teléfono:</strong><br>
                <?= limpiarVista($dueno['telefono']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Clave catastral:</strong><br>
                <?= limpiarVista($dueno['clave_catastral']) ?>
            </div>
        </div>

        <hr>

        <h4>Dirección</h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <strong>Colonia:</strong><br>
                <?= limpiarVista($dueno['nombre_colonia']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Código postal:</strong><br>
                <?= limpiarVista($dueno['codigo_postal']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Ciudad:</strong><br>
                <?= limpiarVista($dueno['nombre_ciudad']) ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Calle principal:</strong><br>
                <?= limpiarVista($dueno['calle_principal']) ?>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Calle adyacente:</strong><br>
                <?= limpiarVista($dueno['calle_adyacente']) ?>
            </div>

            <div class="col-md-3 mb-3">
                <strong>Número exterior:</strong><br>
                <?= limpiarVista($dueno['numero_exterior']) ?>
            </div>

            <div class="col-md-3 mb-3">
                <strong>Número interior:</strong><br>
                <?= limpiarVista($dueno['numero_interior']) ?>
            </div>
        </div>

        <hr>

        <h4>Mascotas del dueño</h4>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Sexo</th>
                        <th>Esterilizado</th>
                        <th>Cartilla</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($mascotas)): ?>
                        <?php foreach ($mascotas as $mascota): ?>
                            <tr onclick="window.location.href='detalleAnimal.php?id=<?= $mascota['id'] ?>'" style="cursor:pointer;">
                                <td><?= limpiarVista($mascota['id']) ?></td>
                                <td><?= limpiarVista($mascota['nombre']) ?></td>
                                <td><?= limpiarVista($mascota['nombre_especie']) ?></td>
                                <td><?= limpiarVista($mascota['nombre_raza']) ?></td>
                                <td><?= textoSexo($mascota['sexo']) ?></td>
                                <td><?= textoBooleano($mascota['esterilizado']) ?></td>
                                <td><?= textoBooleano($mascota['carnet_de_vacunacion']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No tiene mascotas registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>

</body>
</html>