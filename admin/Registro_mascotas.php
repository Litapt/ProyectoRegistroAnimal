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
    <title>REGISTRO DE MASCOTAS</title>
</head>
<body>
    <div class="container-fluid header-custom">
        <div class="row align-items-center">
            <div class="col-md-3 d-flex gap-2"><div class="btn-circle">Logo ecología</div><div class="btn-circle">Logo animal</div></div>
            <div class="col-md-6">
                <h1 class="fw-bold m-0">Mi mascota Comondú</h1>
                <p class="m-0">Registro animal del municipio de comondú</p>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center gap-2">
                <button class="btn btn-danger rounded-pill px-4">Cerrar sesion</button>
                <div class="btn-circle">Foto de perfil</div>
            </div>
        </div>
    </div>

    <div class="nav-steps text-dark">
        <span>Anterior</span>
        <div class="step-circle bg-danger">1</div>
        <div class="step-circle bg-danger">2</div>
        <div class="step-circle bg-dark">2</div>
        <span>Siguiente</span>
    </div>

    <div class="container">
        <div class="main-card">
            <form action="procesar_registro.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    
                    <div class="col-md-4 text-center">
                        <div class="img-placeholder">Foto del animal no obligatoria</div>
                        <div class="px-4">
                            <button type="button" class="btn btn-pink-custom">Tomar foto</button>
                            <button type="button" class="btn btn-pink-custom">Cargar foto</button>
                        </div>
                        <a href="Menu_registro.php" class="d-block mt-5 h2 text-decoration-none text-dark fw-bold">Regresar</a>
                    </div>

                    <div class="col-md-8">
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-4"><span class="custom-label">Nombre del animal</span></div>
                            <div class="col-sm-8"><input type="text" name="nombre" maxlength="45" custom-input"></div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-4"><span class="custom-label">Especie</span></div>
                            <div class="col-sm-8">
                                <input type="text" name="especie" class="custom-input input-blue-bg" placeholder="Canino, felino, roedor, ave, ganado, réptil.">
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-4"><span class="custom-label">Raza</span></div>
                            <div class="col-sm-8"><input type="text" name="raza" class="custom-input input-blue-bg"></div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-4"><span class="custom-label">Peso Aprox (Kg)</span></div>
                            <div class="col-sm-8"><input type="number" name="peso" class="custom-input"></div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-4"><span class="custom-label">Color(es)</span></div>
                            <div class="col-sm-8"><input type="text" name="color" class="custom-input"></div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="custom-label me-2">Sexo</span>
                                    <div class="radio-box"><input type="radio" name="sexo" value="Macho"> Macho</div>
                                    <div class="radio-box"><input type="radio" name="sexo" value="Hembra"> Hembra</div>
                                    <div class="radio-box"><input type="radio" name="sexo" value="Desc"> Desconosido</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="button" class="btn btn-pink-custom py-2">Generar QR</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="custom-label me-2">Esterilizado</span>
                                    <div class="radio-box"><input type="radio" name="esterilizado" value="Si"> Si</div>
                                    <div class="radio-box"><input type="radio" name="esterilizado" value="No"> No</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-pink-custom py-2">Aceptar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="custom-label me-2">Carnet de Vacunas</span>
                                    <div class="radio-box"><input type="radio" name="carnet" value="Si"> Si</div>
                                    <div class="radio-box"><input type="radio" name="carnet" value="No"> No</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="reset" class="btn btn-pink-custom py-2">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="watermark">
        <div class="btn-circle" style="width: 60px; height: 60px;">Marca de agua</div>
    </div>
</body>
</html>