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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/principalcensa.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> 
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
        <div class="d-flex align-items-center gap-3">
        <a class="btn btn-cerrar-sesion" href="../login/logout.php">
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
        <img src="../imagnes/ImagenEquipoNF.png">
    </div>
</body>
</html>