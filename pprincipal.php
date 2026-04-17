<?php
require_once 'login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi mascota Comondu</title>
    <link rel="stylesheet" href="pprincipal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-success-subtle">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
    <div class="d-flex align-items-center gap-2">
        <img src="Imagen.png" class="rounded-circle" width="50">
        <img src="Imagen.png" class="rounded-circle" width="50">
    </div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h4 class="mb-0">Mi mascota Comondú</h4>
        <small>Registro animal del municipio de Comondú</small>
    </div>
    <div class="dropdown">
        <a class="btn btn-sm btn-outline-light" href="index.php">
            Cerrar sesion
        </a>
        <button class="btn">
            <a href="misDatos.php">
            <img src="Imagen.png" class="rounded-circle" width="50">
            </a>
        </button>
    </div>
</header>
    <nav class="PPNavBar container py-4 d-flex justify-content-evenly">
        <form class="row g-4">
    <div class="col-12 col-md-6 d-flex">
        <a href="admin/registroTrabajadores.php" class="boton card border-0 shadow-sm w-100 text-dark text-center p-3 link-offset-2 link-underline link-underline-opacity-0">
            Registro trabajadores
        </a>
    </div>
    <div class="col-12 col-md-6 d-flex">
        <a href="registro.php" class="boton card border-0 shadow-sm w-100 text-dark text-center p-3 link-offset-2 link-underline link-underline-opacity-0">
            Registro
        </a>
    </div>
    <div class="col-12 col-md-6 d-flex">
        <a href="estadisticas.php" class="boton card border-0 shadow-sm w-100 text-dark text-center p-3 link-offset-2 link-underline link-underline-opacity-0">
            Estadísticas
        </a>
    </div>
    <div class="col-12 col-md-6 d-flex">
        <a href="misDatos.php" class="boton card border-0 shadow-sm w-100 text-dark text-center p-3 link-offset-2 link-underline link-underline-opacity-0">
            Consulta
        </a>
    </div>
</form>
    </nav>
    <div class="PIMarcaDeAgua">
        <img src="ImagenEquipoNF.png">
    </div>
</body>
</html>