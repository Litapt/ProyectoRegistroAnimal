<?php
session_start();

if (!isset($_SESSION['reset_id_trabajador'])) {
    header('Location: restablecerpsw.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar código</title>
    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/misdatos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success-subtle">

<div class="container py-5">
    <div class="card shadow mx-auto" style="max-width: 520px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-3">Verificar código</h3>
            <p class="text-muted text-center">Escribe el código que enviamos a tu correo.</p>

            <?php if (isset($_GET['enviado'])): ?>
                <div class="alert alert-success">
                    Código enviado correctamente.
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    Código incorrecto, expirado o ya utilizado.
                </div>
            <?php endif; ?>

            <form action="validarcodigo.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Código de verificación</label>
                    <input type="text" name="codigo" class="form-control text-center fs-4" maxlength="6" required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Verificar código
                </button>

                <div class="text-center mt-3">
                    <a href="restablecerpsw.php" class="text-decoration-none">Solicitar otro código</a>
                </div>
                <a href="../index.php" class="btn bg-success-subtle flex-fill">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>