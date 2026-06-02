<?php
require_once '../login/check.php';
require_once 'misDatosCons.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mis Datos - Comondú</title>
    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/misDatos.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
        $(document).ready(function(){
            let visible = false;
            $("#btnMostrarContra").click(function(){
                if(!visible){
                    $("#contraTra").text("<?= $datos['Password'] ?>");
                    $("#btnMostrarContra").text("Ocultar");
                    visible = true;
                }else{
                    $("#contraTra").text("********");
                    $("#btnMostrarContra").text("Mostrar");
                    visible = false;
                }
            });
        });
        </script>
    </head>
    <body class="bg-success-subtle">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="text-center flex-grow-1">
            <a class="ink-offset-2 link-underline link-underline-opacity-0 link-light" href="../capturista/principalCensador.php">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap header-botones">
            <a class="btn btn-sm btn-outline-light" href="../capturista/principalCensador.php">
                Regresar
            </a>

            <a href="#">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>
    <main class="container-fluid px-5 mt-4">
        <div class="row align-items-start">
            <div class="col-md-5 text-center">
                <div class="profile-main-circle d-flex align-items-center justify-content-center mx-auto">
                    <span class="fs-2 fw-bold text-white">
                        Foto de perfil
                    </span>
                </div>
                <div class="mt-3">
                    <button class="btn-pink-action">
                        Tomar foto
                    </button>
                </div>
            </div>
            <div class="col-md-7">
                <div class="d-flex flex-column gap-3">
                    <div class="data-row">
                        <label class="label-white">
                            Nombre(s):
                        </label>
                        <div class="field-value" id="nombreTra" name="nombreTra">
                            <?= $datos['Nombre'] ?>
                        </div>
                    </div>
                    <div class="data-row">
                        <label class="label-white">
                            Apellido paterno:
                        </label>
                        <div class="field-value" id="apellidopTra" name="apellidopTra">
                            <?= $datos['ApellidoPaterno'] ?>
                        </div>
                    </div>
                    <div class="data-row">
                        <label class="label-white">
                            Apellido materno:
                        </label>
                        <div class="field-value" id="apellidomTra" name="apellidomTra">
                            <?= $datos['ApellidoMaterno'] ?>
                        </div>
                    </div>
                    <div class="data-row">
                        <label class="label-white">
                            CURP:
                        </label>
                        <div class="field-value" id="curpTra" name="curpTra">
                            <?= $datos['CURP'] ?>
                        </div>
                    </div>
                    <div class="data-row">
                        <label class="label-white">
                            Correo electrónico:
                        </label>
                        <div class="field-value" id="correoTra" name="correoTra">
                            <?= $datos['CorreoElectronico'] ?>
                        </div>
                    </div>
                    <div class="data-row">
                        <label class="label-white">
                            Contraseña:
                        </label>
                        <div class="d-flex align-items-center gap-2">
                            <div class="field-value" id="contraTra">
                                ********
                            </div>
                            <button type="button"
                                    class="btn btn-sm btn-light"
                                    id="btnMostrarContra">
                                Mostrar
                            </button>
                        </div>
                    </div>
                    <div class="d-flex gap-4 mt-4 justify-content-center">
                        <button class="btn-editar">
                            Editar
                        </button>
                        <button class="btn-pink-action">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
    </body>
</html>