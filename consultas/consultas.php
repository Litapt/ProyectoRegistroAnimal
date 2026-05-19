<?php
require_once 'login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Mascota Comondú - Registro</title>
    <link rel="icon" href="Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="misdatos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-custom-green">
    <header class="p-3 PPHeader text-white d-flex align-items-center justify-content-between">
        <div class="d-flex gap-2">
            <div class="header-circle">Logo de ecología</div>
            <div class="header-circle">Logo comite pro animal</div>
        </div>
        
        <div class="text-center flex-grow-1">
            <h1 class="fw-bold mb-0">Mi mascota Comondú</h1>
            <p class="mb-0">Registro animal del municipio de comondú</p>
        </div>

        <div class="d-flex align-items-center gap-3">
            <a href="index.php" class="btn btn-danger rounded-pill px-4">Cerrar sesion</a>
            <div class="header-circle profile">Foto de perfil</div>
        </div>
    </header>

    <main class="container-fluid p-4">
        <div class="main-card shadow-lg d-flex">
            
            <aside class="sidebar p-4 d-flex flex-column align-items-center">
                <div class="photo-placeholder-circle mb-4">
                    <span>Foto del consultado</span>
                </div>

                <div class="d-flex flex-column gap-2 w-100 mb-5">
                    <button class="btn-sidebar">Cargar dueños</button>
                    <button class="btn-sidebar">Cargar animales</button>
                    <button class="btn-sidebar">Cargar trabajadores</button>
                </div>

                <div class="mt-auto w-100 text-center">
                    <button class="btn-pink mb-3 w-75">Editar</button>
                    <div class="d-flex gap-2 justify-content-center mb-4">
                        <button class="btn-pink">Aceptar</button>
                        <button class="btn-pink">Cancelar</button>
                    </div>
                    <a href="pprincipal.html" class="text-decoration-none text-dark fw-bold fs-3">Regresar</a>
                </div>
            </aside>

            <section class="content-area p-3">
                <div class="black-box-container">
                    </div>
            </section>

        </div>
    </main>

    <div class="PIMarcaDeAgua">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>