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
        <link rel="icon" href="Imagen.png" type="image/x-icon">
        <link rel="stylesheet" href="misDatos.css" />
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
    <header class="p-3 PPHeader text-white d-flex align-items-center justify-content-between">
        <div class="d-flex gap-2">
            <div class="header-circle">
                Logo de ecología
            </div>
            <div class="header-circle">
                Logo comité pro animal
            </div>
        </div>
        <div class="text-center flex-grow-1">
            <h1 class="fw-bold mb-0">
                Mi mascota Comondú
            </h1>
            <p class="mb-0">
                Registro animal del municipio de Comondú
            </p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="index.php" class="btn btn-danger rounded-pill px-4">
                Cerrar sesion
            </a>
            <div class="header-circle profile">
                Foto de perfil
            </div>
        </div>
    </header>
    <main class="container-fluid px-5 mt-4">
        <div class="mb-3">
            <a href="pprincipal.html" class="btn-back">
                <img src="https://cdn-icons-png.flaticon.com/512/507/507257.png"
                    width="40"
                    alt="Volver">
            </a>
        </div>
        <div class="row align-items-start">
            <div class="col-md-5 text-center">
                <div class="profile-main-circle d-flex align-items-center justify-content-center mx-auto">
                    <span class="fs-2 fw-bold text-white">
                        Foto de perfil
                    </span>
                </div>
                <div class="mt-3">
                    <button class="btn-pink-action">
                        Editar foto
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
        <img src="ImagenEquipoNF.png">
    </div>
    </body>
</html>