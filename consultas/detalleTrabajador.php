<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
require_once 'detalleDatos.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: consultas.php');
    exit();
}

$trabajador = obtenerTrabajadorPorId($conexion, $id);

if (!$trabajador) {
    header('Location: consultas.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Trabajador</title>
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
            <a href="../accesosgral/misDatos.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>

<main class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h2 class="mb-3 text-center">Información del trabajador</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Nombre completo</span>
                        <strong>
                            <?= limpiarVista($trabajador['Nombre']) ?>
                            <?= limpiarVista($trabajador['ApellidoPaterno']) ?>
                            <?= limpiarVista($trabajador['ApellidoMaterno']) ?>
                        </strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">CURP</span>
                        <strong><?= limpiarVista($trabajador['CURP']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Correo electrónico</span>
                        <strong><?= limpiarVista($trabajador['CorreoElectronico']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Rol</span>
                        <strong><?= limpiarVista($trabajador['role']) ?></strong>
                    </div>
                </div>

                <div class="col">
                    <div class=" rounded p-3 h-100">
                        <span class="text-muted small d-block">Fecha de registro</span>
                        <strong><?= limpiarVista($trabajador['Created_at']) ?></strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>
</html>