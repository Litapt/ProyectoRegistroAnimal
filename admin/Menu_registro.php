<?php
require_once '..\login\check.php';
require_rol('ADMINISTRADOR');
require_once '../bd/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>MENU PRINCIPAL</title>
</head>
<body>
    <div class="container-fluid header-custom">
        <div class="row align-items-center">
            <div class="col-md-3 d-flex justify-content-start gap-2">
                <div class="btn-circle">Logo de ecología</div>
                <div class="btn-circle">Logo comite pro animal</div>
            </div>
            <div class="col-md-6">
                <h1 class="fw-bold mb-0">Mi mascota Comondú</h1>
                <p class="mb-0">Registro animal del municipio de comondú</p>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center gap-3">
                <a href="#" class="btn-logout">Cerrar sesion</a>
                <div class="btn-circle">Foto de perfil</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="main-container">
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="registro_animales.php" class="menu-card">
                        Registro animales
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="registro_trabajadores.php" class="menu-card">
                        Registro trabajadores
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="consultar.php" class="menu-card">
                        Consultar
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="estadisticas.php" class="menu-card">
                        Estadísticas
                    </a>
                </div>
            </div>
            
            <a href="javascript:history.back()" class="footer-regresar">Regresar</a>
        </div>
    </div>

    <div class="watermark">
        <div class="btn-circle" style="width: 60px; height: 60px;">Marca de agua</div>
    </div>
</body>
</html>