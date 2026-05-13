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
    <link rel="icon" href="../pryecto_perros/imagenes/Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="pprincipal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-success-subtle">
    <main class="container py-4">
            <h2 class="fw-bold mb-4">Registrar ubicación nueva</h2>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="contenedor-mapa d-flex align-items-center justify-content-center rounded-3">
                        <span class="fs-4 fw-bold">MAPA</span>
                    </div>
                </div>
                <!-- Formulario -->
                <div class="col-md-6">
                    <div class="d-flex flex-column gap-3">
                        <div class="input-group-custom">
                            <label class="label-purple">Colonia</label>
                            <div class="field-blue">Todas las colonias de Ciudad Constitucion.</div>
                        </div>
                        <div class="input-group-custom">
                            <label class="label-purple">Calle principal</label>
                            <input type="text" class="form-control" placeholder="Agregar texto">
                        </div>
                        <div class="input-group-custom">
                            <label class="label-purple">Numero de la casa</label>
                            <input type="text" class="form-control" placeholder="Agregar texto">
                        </div>
                        <div class="input-group-custom">
                            <label class="label-purple">Clave catastral</label>
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