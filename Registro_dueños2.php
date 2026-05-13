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
    <link rel="stylesheet" href="Registro_dueños2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-success-subtle">
    <main class="container py-4">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center">
                    <div class="foto-dueno-circulo d-flex align-items-center justify-content-center mx-auto mb-3">
                        <img src="imagenes/Imagen.png" class="rounded-circle" width="80">
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
    </main>
    <div class="PIMarcaDeAgua">
        <img src="ImagenEquipoNF.png">
    </div>
</body>
</html>