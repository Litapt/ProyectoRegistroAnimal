<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer password</title>
    <link rel="icon" href="Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle vh-100">
    <header class="main-header">
    <div class="title-container">
        <h1>Mi mascota Comondú</h1>
        <p>Registro animal del municipio de comondú</p>
    </div>
    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
    <div class="header-logos">
    <img src="../imagenes/ImagenEquipoNF.png" alt="Marca de agua" class="logo-img">
    <img src="imagenes/Imagen.png" alt="Logo de ecología" class="logo-img">
    <img src="imagenes/Imagen.png" alt="Logo del gobierno" class="logo-img">
    </div>
    </header>

<main class="container d-flex justify-content-center mt-5">
    <div class="card shadow p-4 w-100" style="max-width: 500px;">
        <h4 class="text-center mb-1">
            RESTABLECER CONTRASEÑA
        </h4>

        <form action="enviarcodigo.php" method="post">
            <label for="correo" class="form-label">
                Correo electrónico
            </label>

            <input type="email" class="form-control mb-2" id="correo" name="correo" placeholder="ejemplo@correo.com" required>

            <label for="curp" class="form-label">
                CURP
            </label>

            <input type="text" class="form-control mb-2" id="curp" name="curp" placeholder="XXXX010203XXXXXXX7" required>


            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-success flex-fill" type="submit">
                    Aceptar
                </button>

                <a href="../index.php" class="btn bg-success-subtle flex-fill">
                    Cancelar
                </a>
            </div>
            <div class="alert alert-success m-3">
                    Si los datos son correctos, se enviará un código al correo registrado.
            </div>
        </form>
    </div>
</main>
</body>
</html>