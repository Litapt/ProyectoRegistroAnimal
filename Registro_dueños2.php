<?php
require_once 'login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi mascota Comondu - Paso 2</title>
    <link rel="icon" href="../pryecto_perros/imagenes/Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="pprincipal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-success-subtle">
    <header class="p-3 PPHeader text-white d-flex align-items-center justify-content-between">
        <div class="d-flex gap-2">
            <div class="header-circle">Logo de ecología</div>
            <div class="header-circle">Logo comite pro animal</div>
        </div>
        <div class="text-center flex-grow-1">
            <h1 class="fw-bold mb-0">Mi mascota Comondú</h1>
            <p class="mb-0">Registro animal del municipio de Comondú</p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="index.php" class="btn btn-danger rounded-pill px-4">Cerrar sesion</a>
            <div class="header-circle profile">Foto de perfil</div>
        </div>
    </header>

    <!-- Indicador de pasos (Ahora el 2 está activo) -->
    <div class="container mt-4">
        <div class="d-flex justify-content-center align-items-center gap-5">
            <span class="fw-bold fs-2">Anterior</span>
            <div class="paso-circulo">1</div>
            <div class="paso-circulo activo">2</div>
            <div class="paso-circulo">3</div> 
            <span class="fw-bold fs-2">Siguiente</span>
        </div>
    </div>

    <main class="container py-4">
        <div class="bg-white p-5 rounded-5 shadow-lg main-card">
            
            <div class="row g-4 align-items-center">

                <div class="col-md-6 text-center">
                    <div class="foto-dueno-circulo d-flex align-items-center justify-content-center mx-auto mb-3">
                        <span class="fs-4 fw-bold text-white">Foto del dueño</span>
                    </div>
                    <button class="btn-tomar-foto">Tomar foto</button>
                </div>

                <div class="col-md-6">
                    <div class="d-flex flex-column gap-3">
                        <div class="input-group-custom">
                            <label class="label-purple">Nombre</label>
                            <input type="text" class="form-control" placeholder="Agregar texto">
                        </div>
                        <div class="input-group-custom">
                            <label class="label-purple">Apellido paterno</label>
                            <input type="text" class="form-control" placeholder="Agregar texto">
                        </div>
                        <div class="input-group-custom">
                            <label class="label-purple">Apellido materno</label>
                            <input type="text" class="form-control" placeholder="Agregar texto">
                        </div>
                        <div class="input-group-custom">
                            <label class="label-purple">CURP</label>
                            <input type="text" class="form-control" placeholder="Agregar texto">
                        </div>
                        <div class="input-group-custom">
                            <label class="label-purple">Telefono</label>
                            <input type="text" class="form-control" placeholder="Agregar texto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5" style="width: 100%;">
                <a href="index.php" class="btn-regresar-centrado">Regresar</a>
            </div>
        </div>
    </main>
    <div class="PIMarcaDeAgua">
        <img src="ImagenEquipoNF.png">
    </div>
</body>
</html>