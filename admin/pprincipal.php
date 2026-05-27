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
    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/pprincipal.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-success-subtle">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="text-center flex-grow-1">
            <a class="ink-offset-2 link-underline link-underline-opacity-0 link-light" href="../admin/pprincipal.php">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap header-botones">
            <a class="btn btn-sm btn-outline-danger" href="../index.php">
                Cerrar sesión
            </a>

            <a href="../accesosgral/misDatos.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>
    <main class="container py-5 d-flex justify-content-center">
        <div class="bg-white p-4 p-md-5 rounded-5 shadow-lg w-100" style="max-width: 1000px;">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <a href="../registro/inicioPrincipalRegistro.php" class="boton-menu-grande">
                        Registro
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="../admin/registroTrabajadores.php" class="boton-menu-grande">
                        Registro trabajadores
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="../consultas/consultas.php" class="boton-menu-grande">
                        Consulta
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <!-- -->
                    <a href="../admin/estadisticas.php" class="boton-menu-grande">
                        Estadísticas
                    </a>
                </div>
            </div>
        </div>
    </main>
    <div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>
</html>