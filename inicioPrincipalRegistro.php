<?php
require_once 'login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro mascotas - Stepper</title>
    <link rel="stylesheet" href="registro.css">
    <link rel="stylesheet" href="Registro_dueños.css">
    <link rel="stylesheet" href="Registro_dueños1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle vh-100 d-flex flex-column">

    <header class="position-relative d-flex align-items-center justify-content-between p-3 main-header text-white">
        <div class="d-flex gap-2">
            <img src="ecologia.png" class="logo-img">
            <img src="gobierno.png" class="logo-img">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
            <h4 class="mb-0 fw-bold">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
        </div>
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-danger rounded-pill px-3">Cerrar sesión</button>
            <img src="Imagen.png" alt="Perfil" class="logo-img">
        </div>
    </header>

    <main class="flex-grow-1 d-flex flex-column align-items-center justify-content-center">
        
        <div class="d-flex align-items-center gap-3 mb-4">
            <button type="button" class="btn fw-bold" onclick="retroceder()">Anterior</button>
            <div id="circulo-1" class="paso-circulo activo">1</div>
            <div id="circulo-2" class="paso-circulo">2</div>
            <div id="circulo-3" class="paso-circulo">3</div>
            <button type="button" id="btnSiguiente" class="btn fw-bold" onclick="avanzar()">Siguiente</button>
        </div>

        <form id="formMaestro" class="w-100 d-flex justify-content-center">
            
            <div id="paso-inicio" class="card-registro text-center shadow d-block">
                <h2 class="mb-5 fw-bold">Registrar ubicación</h2>
                <div class="d-grid gap-3 px-4">
                    <button type="button" class="btn btn-danger py-3 fs-3" onclick="definirRuta('existente')">Existente</button>
                    <button type="button" class="btn btn-danger py-3 fs-3" onclick="definirRuta('nueva')">Nueva</button>
                </div>
            </div>

            <div id="paso-ubicacion-nueva" class="card-registro shadow d-none">
                <?php include 'Registro_dueños1.php'; ?>
            </div>

            <div id="paso-ubicacion-actual" class="card-registro shadow d-none">
                <?php include 'Registro_dueños.php'; ?>
            </div>

            <div id="paso-datos-dueno" class="card-registro shadow d-none">
                <?php include 'Registro_dueños2.php'; ?>
            </div>

            <div id="paso-datos-animal" class="card-registro shadow d-none">
                <?php include 'RegistroAnimal.php'; ?>
            </div>

        </form>
    </main>

    <script src="registro.js"></script>
</body>
</html>