<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro mascotas</title>
    <link rel="icon" href="Imagen.png" type="image/x-icon">    
    <link rel="stylesheet" href="registro.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            <a href="misDatos.html">
                <img src="Imagen.png" alt="Perfil" class="logo-img">
            </a>
        </div>
    </header>

    <main class="flex-grow-1 d-flex flex-column align-items-center justify-content-center">
        
        <div class="d-flex align-items-center gap-3 mb-4">
            <span class="fw-bold">Anterior</span>
            <div class="step-circle active">1</div>
            <div class="step-circle">2</div>
            <div class="step-circle">2</div> <span class="fw-bold">Siguiente</span>
        </div>

        <div class="card-registro text-center shadow">
            <h2 class="mb-5 fw-bold">Registrar ubicación</h2>
            
            <div class="d-grid gap-3 px-4">
                <button class="btn btn-custom-red py-3 fs-3">Existente</button>
                <button class="btn btn-custom-red py-3 fs-3">Nueva</button>
            </div>

            <a href="#" class="d-block mt-5 text-dark fw-bold fs-4 text-decoration-none">Regresar</a>
        </div>
    </main>

    <div class="PIMarcaDeAgua">
        <img src="ImagenEquipoNF.png">
    </div>

</body>
</html>