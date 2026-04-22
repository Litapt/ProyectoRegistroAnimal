<?php

    $error = $_GET['error'] ?? '';
    if($error === '1'){
        echo '<div Class="alert alert-danger text-center" role="alert"> 
                Error, usuario o contraseña incorrectos.
            </div>';
    }
    if($error === '2'){
        echo '<div Class="alert alert-warning text-center" role="alert"> 
                Error, No iniciaste sesion.
            </div>';
    }
    if($error === '3'){
        echo '<div Class="alert alert-warning text-center" role="alert"> 
                Error, No tienes permiso para acceder a esta pagina.
            </div>';
    }
    
    if($error === '4'){
        echo '<div Class="alert alert-warning text-center" role="alert"> 
                Error, EL USUARIO NO ESTA ACTIVO.
            </div>';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi mascota Comondú - Login</title>
    <link rel="icon" href="Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header class="main-header">
        <div class="title-container">
            <h1>Mi mascota Comondú</h1>
            <p>Registro animal del municipio de comondú</p>
        </div>
        <div class="header-logos">
        <img src="Imagen.png" alt="Marca de agua" class="logo-img">
        <img src="ecologia.png" alt="Logo de ecología" class="logo-img">
        <img src="gobierno.png" alt="Logo del gobierno" class="logo-img">
</div>
    </header>
    <main class="content">
        <img src="Huella.Png" alt="animal" class="deco-left">
        <div class="login-card">
            <h2>Inicio de sesion</h2>
            <form action="login/login.php" method="post">
            <div class="input-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" maxlength="100" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" minlength="8" required>
            </div>
            <a href="restablecerPsw.php" class="forgot">Olvide mi contraseña</a>
            <button class="btn-submit" type="submit">
                Iniciar sesión
            </button>
        </form>
        </div>
        <img src="Huella2.png" alt="huella" class="deco-right">
    </main>
</body>
</html>