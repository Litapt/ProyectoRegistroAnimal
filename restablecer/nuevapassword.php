<?php
session_start();

if (!isset($_SESSION['reset_id_trabajador']) || !isset($_SESSION['reset_autorizado']) || $_SESSION['reset_autorizado'] !== true) {
    header('Location: restablecerpsw.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña</title>
    <link rel="stylesheet" href="css/misdatos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success-subtle">
    <header class="main-header">
        <div class="title-container">
            <h1>Mi mascota Comondú</h1>
            <p>Registro animal del municipio de comondú</p>
        </div>
        <div class="header-logos">
        <img src="../imagenes/LogoOficial1.png" alt="Marca de agua" class="logo-img">
        <img src="../imagenes/LogoOficial2.png" alt="Logo de ecología" class="logo-img logo-blanco">
        <img src="../imagenes/LogoOficial3.png" alt="Logo del gobierno" class="logo-img">
    </div>
    </header>

<div class="container py-5">
    <div class="card shadow mx-auto" style="max-width: 520px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-3">Crear nueva contraseña</h3>
            <p class="text-muted text-center">Escribe y confirma tu nueva contraseña.</p>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    Las contraseñas no coinciden o no cumplen los requisitos.
                </div>
            <?php endif; ?>

            <form action="actualizarpassword.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control" minlength="8" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password" name="confirmar_password" class="form-control" minlength="8" required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Cambiar contraseña
                </button>
                <a href="../index.php" class="btn bg-success-subtle flex-fill">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
</body>
</html>