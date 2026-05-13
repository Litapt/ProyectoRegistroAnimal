<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi mascota Comondu</title>
    <link rel="icon" href="../imagenes/Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="pprincipal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-success-subtle">
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
    <!-- Contenedor Principal es el centro -->
    <main class="container py-5 d-flex justify-content-center">
        <div class="bg-white p-4 p-md-5 rounded-5 shadow-lg w-100" style="max-width: 1000px;">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <a href="../inicioPrincipalRegistro.php" class="boton-menu-grande">
                        Registro
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="../admin/registroTrabajadores.php" class="boton-menu-grande">
                        Registro trabajadores
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="../consulta.php" class="boton-menu-grande">
                        Consulta
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="../admin/estadisticas.php" class="boton-menu-grande">
                        Estadísticas
                    </a>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="../inicio_sesion/index.php" class="btn-regresar-menu">
                    Regresar
                </a>
            </div>
        </div>
    </main>

    <div class="PIMarcaDeAgua">
        <img src="../imagnes/ImagenEquipoNF.png">
    </div>
</body>
</html>