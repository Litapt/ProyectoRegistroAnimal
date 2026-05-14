<?php
require_once 'login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro trabajadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="registroTrabajadores.css">
</head>
<body class="bg-success-subtle">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 main-header text-white">
        <div class="d-flex gap-2">
            <img src="ecologia.png" class="logo-img">
            <img src="gobierno.png" class="logo-img">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h4 class="mb-0">
                Mi mascota Comondú
            </h4>
            <small>
                Registro animal del municipio de Comondú
            </small>
        </div>
        <div>
            <a href="misDatos.html">
                <img src="Imagen.png" alt="Logo" class="logo-img">
            </a>
        </div>
    </header>
    <main class="container d-flex justify-content-center mt-5">
        <div class="card shadow p-4 w-100" style="max-width: 500px;">
            <h4 class="text-center mb-1">
                REGISTRO TRABAJADORES
            </h4>
            <form>
                <label for="nombre" class="form-label">
                    Nombre *
                </label>
                <input type="text" class="form-control mb-2" id="nombre" name="nombre" placeholder="Ej. Alan" required>
                <label for="apellidop" class="form-label">
                    Apellido Paterno *
                </label>
                <input type="text" class="form-control mb-2" id="apellidop" name="apellidop"
                    placeholder="Apellido paterno" required>
                <label for="apellidom" class="form-label">
                    Apellido Materno *
                </label> <input type="text" class="form-control mb-2" id="apellidom" name="apellidom"
                    placeholder="Apellido materno" required>
                <label for="CURP" class="form-label">
                    CURP *
                </label>
                <input type="text" class="form-control mb-2" id="CURP" name="CURP" placeholder="18 caracteres"
                    maxlength="18" required>
                <label for="correo" class="form-label">
                    Correo *
                </label>
                <input type="email" class="form-control mb-2" id="correo" name="correo" placeholder="ejemplo@correo.com"
                    required>
                <!--AQUI SE GENERA EL PASSWORD-->
                <label for="password" class="form-label">
                    Password *
                </label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Se generara automáticamente" required>
                    <button class="btn btn-success" type="button" id="generate-password">
                        Generar
                    </button>
                </div>
                <!--AQUI SE TERMINA EL GENERADOR DE PASSWORD-->
                <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-success flex-fill" type="submit">
                        Aceptar
                    </button> 
                    <button class="btn bg-success-subtle flex-fill" type="button">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </main>
    <script src="registrotrabajadores.js"> </script>
</body>
</html>