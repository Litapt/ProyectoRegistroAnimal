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
            <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/misdatos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <a class="btn btn-sm btn-outline-light" href="../capturista/principalCensador.php">
                Regresar
            </a>
            <a href="../accesosgral/misDatosCapturista.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>

<main class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h2 class="mb-3 text-center">Información del dueño</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">
                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Nombre completo</span>
                        <strong>
                            <?= limpiarVista($dueno['nombres']) ?>
                            <?= limpiarVista($dueno['apellido_paterno']) ?>
                            <?= limpiarVista($dueno['apellido_materno']) ?>
                        </strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">CURP</span>
                        <strong><?= limpiarVista($dueno['curp']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Teléfono</span>
                        <strong><?= limpiarVista($dueno['telefono']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Clave catastral</span>
                        <strong><?= limpiarVista($dueno['clave_catastral']) ?></strong>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Dirección</h4>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Colonia</span>
                        <strong><?= limpiarVista($dueno['nombre_colonia']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Código postal</span>
                        <strong><?= limpiarVista($dueno['codigo_postal']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Ciudad</span>
                        <strong><?= limpiarVista($dueno['nombre_ciudad']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Calle principal</span>
                        <strong><?= limpiarVista($dueno['calle_principal']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Calle adyacente</span>
                        <strong><?= limpiarVista($dueno['calle_adyacente']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Número exterior</span>
                        <strong><?= limpiarVista($dueno['numero_exterior']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Número interior</span>
                        <strong><?= limpiarVista($dueno['numero_interior']) ?></strong>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Mascotas del dueño</h4>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
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
                                <td colspan="7" class="text-center text-muted py-4">
                                    No tiene mascotas registradas.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
<div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>
</html>