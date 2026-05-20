<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro mascotas</title>
    <link rel="stylesheet" href="../css/inicioPrincipalRegistro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../javascript/registro.js" defer></script>
</head>
<body class="bg-success-subtle vh-100 d-flex flex-column">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
        </div>
        <div class="dropdown d-flex align-items-center">
            <a class="btn btn-sm btn-outline-light me-2" href="../inicio_sesion/index.php">
                Cerrar sesion
            </a>
            <a href="../accesosgral/misDatos.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>
    <div class="divform">
    <form class="formulario">
    <H1>Registro</H1>
    <div class="contenedor-progreso">
        <div class="progreso">
        </div>
        <ol>
            <li class="dn">Direccion</li>
            <li class="ds">Dueño(s)</li>
            <li class="ms">Mascotas</li>
        </ol>
    </div>
    <div class="control">
        <button type="button" class="anterior">
            Anterior
        </button>
        <button type="button" class="siguiente">
            Siguiente
        </button>
        <button type="submit" class="completar">
            Completar
        </button>
    </div>
    </form>
    </div>
    <div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>
</html>