<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer password</title>
    <link rel="icon" href="Imagen.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="restablecerPsw.css">
</head>
<body class="bg-success-subtle vh-100">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 main-header text-white">
        <div class="d-flex gap-2">
            <img src="Imagen.png" class="logo-img">
            <img src="Imagen.png" class="logo-img">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h4 class="mb-0">
                Mi mascota Comondú
            </h4>
            <small>
                Registro animal del municipio de Comondú
            </small>
        </div>
        <div>
            <a href="misDatos.html">
                <img src="Imagen.png" alt="Logo" class="logo-img">
            </a>
        </div>
    </header>
    <main class="container d-flex justify-content-center mt-5">
        <div class="card shadow p-4 w-100" style="max-width: 500px;">
            <h4 class="text-center mb-1">
                RESTABLECER CONTRASEÑA
            </h4>
            <form action="#" method="post">
                <label for="correo" class="form-label">
                    Correo electrónico
                </label>
                <input type="text" class="form-control mb-2" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
            </form>
            <div class="d-flex gap-2 mt-3">
            <button class="btn btn-success flex-fill" type="submit">
                Aceptar
            </button> 
            <button class="btn bg-success-subtle flex-fill" type="button">
                Cancelar
            </button>
        </div>
        </div>
    </main>
</body>
</html>