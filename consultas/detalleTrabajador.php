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
        <p class="mb-0">Detalle del trabajador</p>
    </div>

    <a href="consultas.php" class="btn btn-light rounded-pill px-4">Regresar</a>
</header>

<main class="container py-4">

    <div class="card shadow p-4">

        <h2 class="mb-4">Información del trabajador</h2>

        <div class="row">
            <div class="col-md-4 mb-3">
                <strong>Nombre completo:</strong><br>
                <?= limpiarVista($trabajador['Nombre']) ?>
                <?= limpiarVista($trabajador['ApellidoPaterno']) ?>
                <?= limpiarVista($trabajador['ApellidoMaterno']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>CURP:</strong><br>
                <?= limpiarVista($trabajador['CURP']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Correo electrónico:</strong><br>
                <?= limpiarVista($trabajador['CorreoElectronico']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Rol:</strong><br>
                <?= limpiarVista($trabajador['role']) ?>
            </div>

            <div class="col-md-4 mb-3">
                <strong>Fecha de registro:</strong><br>
                <?= limpiarVista($trabajador['Created_at']) ?>
            </div>
        </div>

    </div>

</main>

</body>
</html>