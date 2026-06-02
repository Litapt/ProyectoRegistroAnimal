<?php
require_once '../login/check.php';
require_rol('CAPTURISTA');

require_once 'consultasDatos.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas - Mi Mascota Comondú</title>
    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/misdatos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const botonesConsulta = document.querySelectorAll('.btn-consulta');
            const tablasConsulta = document.querySelectorAll('.consulta-tabla');

            botonesConsulta.forEach(boton => {
                boton.addEventListener('click', () => {
                    const target = boton.dataset.target;

                    botonesConsulta.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    boton.classList.add('active');

                    tablasConsulta.forEach(tabla => {
                        tabla.classList.add('d-none');
                    });

                    const tablaSeleccionada = document.getElementById('consulta-' + target);

                    if (tablaSeleccionada) {
                        tablaSeleccionada.classList.remove('d-none');
                    }
                });
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

        </div>
    </header>


    <main class="container-fluid p-4">

        <div class="main-card shadow-lg d-flex bg-white">

            <aside class="sidebar p-4 d-flex flex-column align-items-center">

                <div class="d-flex flex-column gap-2 w-100 mb-5">

                    <button type="button" class="btn-sidebar btn-consulta active" data-target="duenos">
                        Cargar dueños
                    </button>

                    <button type="button" class="btn-sidebar btn-consulta" data-target="animales">
                        Cargar animales
                    </button>
                </div>

            </aside>

            <section class="content-area p-3 w-100">

                <div class="black-box-container bg-light rounded p-3">

                    <div id="consulta-duenos" class="consulta-tabla">

                        <h3 class="mb-3">Dueños registrados</h3>

                        <div class="table-responsive">

                            <table class="table table-striped table-hover align-middle">

                                <thead class="table-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>CURP</th>
                                        <th>Teléfono</th>
                                        <th>Colonia</th>
                                        <th>Ciudad</th>
                                        <th>Dirección</th>
                                        <th>Clave catastral</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php if ($datosDuenos && $datosDuenos->num_rows > 0): ?>

                                        <?php while ($dueno = $datosDuenos->fetch_assoc()): ?>

                                            <tr
                                                class="fila-click"
                                                onclick="window.location.href='detalleDueno.php?id=<?= $dueno['id'] ?>'">

                                                <td><?= limpiar($dueno['id']) ?></td>

                                                <td>
                                                    <?= limpiar($dueno['nombres']) ?>
                                                    <?= limpiar($dueno['apellido_paterno']) ?>
                                                    <?= limpiar($dueno['apellido_materno']) ?>
                                                </td>

                                                <td><?= limpiar($dueno['curp']) ?></td>

                                                <td><?= limpiar($dueno['telefono']) ?></td>

                                                <td><?= limpiar($dueno['nombre_colonia']) ?></td>

                                                <td><?= limpiar($dueno['nombre_ciudad']) ?></td>

                                                <td>
                                                    <?= limpiar($dueno['calle_principal']) ?>
                                                    y
                                                    <?= limpiar($dueno['calle_adyacente']) ?>

                                                    <?php if (!empty($dueno['numero_exterior'])): ?>
                                                        #<?= limpiar($dueno['numero_exterior']) ?>
                                                    <?php endif; ?>

                                                    <?php if (!empty($dueno['numero_interior'])): ?>
                                                        Int. <?= limpiar($dueno['numero_interior']) ?>
                                                    <?php endif; ?>

                                                    <?php if (!empty($dueno['codigo_postal'])): ?>
                                                        CP <?= limpiar($dueno['codigo_postal']) ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= limpiar($dueno['clave_catastral']) ?></td>

                                            </tr>

                                        <?php endwhile; ?>

                                    <?php else: ?>

                                        <tr>
                                            <td colspan="8" class="text-center text-secondary p-4">
                                                No hay dueños registrados.
                                            </td>
                                        </tr>

                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div id="consulta-animales" class="consulta-tabla d-none">

                        <h3 class="mb-3">Animales registrados</h3>

                        <div class="table-responsive">

                            <table class="table table-striped table-hover align-middle">

                                <thead class="table-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Mascota</th>
                                        <th>Especie</th>
                                        <th>Raza</th>
                                        <th>Dueño</th>
                                        <th>Colonia</th>
                                        <th>Peso</th>
                                        <th>Color</th>
                                        <th>Sexo</th>
                                        <th>Esterilizado</th>
                                        <th>Cartilla</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php if ($datosAnimales && $datosAnimales->num_rows > 0): ?>

                                        <?php while ($animal = $datosAnimales->fetch_assoc()): ?>

                                            <tr
                                                class="fila-click"
                                                onclick="window.location.href='detalleAnimal.php?id=<?= $animal['id'] ?>'">

                                                <td><?= limpiar($animal['id']) ?></td>

                                                <td><?= limpiar($animal['nombre_animal']) ?></td>

                                                <td><?= limpiar($animal['nombre_especie']) ?></td>

                                                <td><?= limpiar($animal['nombre_raza']) ?></td>

                                                <td>
                                                    <?= limpiar($animal['nombre_dueno']) ?>
                                                    <?= limpiar($animal['apellido_paterno']) ?>
                                                    <?= limpiar($animal['apellido_materno']) ?>
                                                </td>

                                                <td><?= limpiar($animal['nombre_colonia']) ?></td>

                                                <td>
                                                    <?php if ($animal['peso'] !== null): ?>
                                                        <?= limpiar($animal['peso']) ?> kg
                                                    <?php else: ?>
                                                        Sin dato
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= limpiar($animal['colores']) ?></td>

                                                <td>
                                                    <?php
                                                        if ($animal['sexo'] === 'M') {
                                                            echo 'Macho';
                                                        } elseif ($animal['sexo'] === 'F') {
                                                            echo 'Hembra';
                                                        } else {
                                                            echo 'Desconocido';
                                                        }
                                                    ?>
                                                </td>

                                                <td>
                                                    <?= $animal['esterilizado'] == 1 ? 'Sí' : 'No' ?>
                                                </td>

                                                <td>
                                                    <?= $animal['carnet_de_vacunacion'] == 1 ? 'Sí' : 'No' ?>
                                                </td>

                                            </tr>

                                        <?php endwhile; ?>

                                    <?php else: ?>

                                        <tr>
                                            <td colspan="11" class="text-center text-secondary p-4">
                                                No hay animales registrados.
                                            </td>
                                        </tr>

                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div id="consulta-trabajadores" class="consulta-tabla d-none">

                        <h3 class="mb-3">Trabajadores registrados</h3>

                        <div class="table-responsive">

                            <table class="table table-striped table-hover align-middle">

                                <thead class="table-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>CURP</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Fecha de registro</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php if ($datosTrabajadores && $datosTrabajadores->num_rows > 0): ?>

                                        <?php while ($trabajador = $datosTrabajadores->fetch_assoc()): ?>

                                            <tr
                                                class="fila-click"
                                                onclick="window.location.href='detalleTrabajador.php?id=<?= $trabajador['ID'] ?>'">

                                                <td><?= limpiar($trabajador['ID']) ?></td>

                                                <td>
                                                    <?= limpiar($trabajador['Nombre']) ?>
                                                    <?= limpiar($trabajador['ApellidoPaterno']) ?>
                                                    <?= limpiar($trabajador['ApellidoMaterno']) ?>
                                                </td>

                                                <td><?= limpiar($trabajador['CURP']) ?></td>

                                                <td><?= limpiar($trabajador['CorreoElectronico']) ?></td>

                                                <td><?= limpiar($trabajador['role']) ?></td>

                                                <td><?= limpiar($trabajador['Created_at']) ?></td>

                                            </tr>

                                        <?php endwhile; ?>

                                    <?php else: ?>

                                        <tr>
                                            <td colspan="6" class="text-center text-secondary p-4">
                                                No hay trabajadores registrados.
                                            </td>
                                        </tr>

                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </section>

        </div>

    </main>

    <div class="PIMarcaDeAgua"></div>
</body>

</html>