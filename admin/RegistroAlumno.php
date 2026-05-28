<?php
require_once '..\login\check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar nuevo Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">Registrar nuevo Alumno</h1>
            <a href="../../Administrador.php">
                <button class="btn btn-outline-primary">
                    REGRESAR
                </button>
            </a>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="full_name">Nombre Completo *</label>
                        <input class="form-control" id="full_name" name="full_name" type="text" required placeholder="Introduce tu nombre completo" maxlenght="100" minlenght="12">
                        <label class="form-label" for="group_name">Grupo *</label>
                        <input class="form-control" type="text" id="group_name" name="group_name" required placeholder="Introduce el grupo 10SM." maxlenght="5" minlenght="3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Correo Electronico *</label>
                        <input class="form-control" type="email" id="email" name="email" required placeholder="Introduce tu correo correo@gmail.com" maxlenght="50" minlenght="6">
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="PIMarcaDeAgua">
        <img src="ImagenEquipoNF.png">
    </div>
</body>
</html>