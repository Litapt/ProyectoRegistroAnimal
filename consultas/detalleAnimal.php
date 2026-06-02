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
            <a class="ink-offset-2 link-underline link-underline-opacity-0 link-light" href="../admin/pprincipal.php">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap header-botones">
            <a class="btn btn-sm btn-outline-light" href="../consultas/consultas.php">
                Regresar
            </a>

        </div>
    </header>
<main class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h2 class="mb-3 text-center">Información del animal</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">
                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Nombre</span>
                        <strong><?= limpiarVista($animal['nombre_animal']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Especie</span>
                        <strong><?= limpiarVista($animal['nombre_especie']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Raza</span>
                        <strong><?= limpiarVista($animal['nombre_raza']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Peso</span>
                        <strong><?= limpiarVista($animal['peso']) ?> kg</strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Color</span>
                        <strong><?= limpiarVista($animal['colores']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Sexo</span>
                        <strong><?= textoSexo($animal['sexo']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Esterilizado</span>
                        <strong><?= textoBooleano($animal['esterilizado']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Cartilla</span>
                        <strong><?= textoBooleano($animal['carnet_de_vacunacion']) ?></strong>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Dueño</h4>

            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Nombre completo</span>
                        <strong>
                            <?= limpiarVista($animal['nombres']) ?>
                            <?= limpiarVista($animal['apellido_paterno']) ?>
                            <?= limpiarVista($animal['apellido_materno']) ?>
                        </strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">CURP</span>
                        <strong><?= limpiarVista($animal['curp']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Teléfono</span>
                        <strong><?= limpiarVista($animal['telefono']) ?></strong>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a href="detalleDueno.php?id=<?= $animal['id_dueno'] ?>" class="btn btn-success">
                    Ver detalle del dueño
                </a>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Dirección</h4>

            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Colonia</span>
                        <strong><?= limpiarVista($animal['nombre_colonia']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Ciudad</span>
                        <strong><?= limpiarVista($animal['nombre_ciudad']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Código postal</span>
                        <strong><?= limpiarVista($animal['codigo_postal']) ?></strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main><div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>
</html>