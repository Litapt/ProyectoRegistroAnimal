<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
require_once 'consultasDatos.php';

$listaColonias = $conexion->query("SELECT id, nombre_colonia, codigo_postal FROM colonias WHERE is_active = 1 ORDER BY nombre_colonia ASC");
$listaEspecies = $conexion->query("SELECT id, nombre_especie FROM especies WHERE is_active = 1 ORDER BY nombre_especie ASC");
$listaRazas = $conexion->query("SELECT id, id_especie, nombre_raza FROM razas WHERE is_active = 1 ORDER BY nombre_raza ASC");

$razasEditar = [];
while ($raza = $listaRazas->fetch_assoc()) {
    $razasEditar[] = $raza;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas - Mi Mascota Comondú</title>
    <link rel="icon" href="../imagenes/Imagen.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/misdatos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const botonesConsulta = document.querySelectorAll('.btn-consulta');
            const tablasConsulta = document.querySelectorAll('.consulta-tabla');

            botonesConsulta.forEach(boton => {
                boton.addEventListener('click', () => {
                    const target = boton.dataset.target;
                    botonesConsulta.forEach(btn => btn.classList.remove('active'));
                    boton.classList.add('active');
                    tablasConsulta.forEach(tabla => tabla.classList.add('d-none'));
                    const tablaSeleccionada = document.getElementById('consulta-' + target);
                    if (tablaSeleccionada) tablaSeleccionada.classList.remove('d-none');
                });
            });

            const modalEditarDueno = new bootstrap.Modal(document.getElementById('modalEditarDueno'));
            const modalEditarAnimal = new bootstrap.Modal(document.getElementById('modalEditarAnimal'));
            const modalEditarTrabajador = new bootstrap.Modal(document.getElementById('modalEditarTrabajador'));

            document.querySelectorAll('.btn-edit-dueno').forEach(boton => {
                boton.addEventListener('click', function () {
                    const id = this.dataset.id;
                    fetch('api/getDueno.php?id=' + id).then(r => r.json()).then(resp => {
                        if (!resp.ok) {
                            Swal.fire('Error', resp.msg || 'No se encontró el dueño', 'error');
                            return;
                        }
                        const d = resp.data;
                        document.getElementById('dueno_id').value = d.id_dueno ?? '';
                        document.getElementById('dueno_nombres').value = d.nombres ?? '';
                        document.getElementById('dueno_apellido_paterno').value = d.apellido_paterno ?? '';
                        document.getElementById('dueno_apellido_materno').value = d.apellido_materno ?? '';
                        document.getElementById('dueno_curp').value = d.curp ?? '';
                        document.getElementById('dueno_telefono').value = d.telefono ?? '';
                        document.getElementById('dueno_clave_catastral').value = d.clave_catastral ?? '';
                        document.getElementById('dueno_id_colonia').value = d.id_colonia ?? '';
                        document.getElementById('dueno_calle_principal').value = d.calle_principal ?? '';
                        document.getElementById('dueno_calle_adyacente').value = d.calle_adyacente ?? '';
                        document.getElementById('dueno_numero_exterior').value = d.numero_exterior ?? '';
                        document.getElementById('dueno_numero_interior').value = d.numero_interior ?? '';
                        modalEditarDueno.show();
                    }).catch(() => Swal.fire('Error', 'Error al cargar los datos del dueño', 'error'));
                });
            });

            document.getElementById('formEditarDueno').addEventListener('submit', function (e) {
                e.preventDefault();
                fetch('api/editDueno.php', { method: 'POST', body: new FormData(this) }).then(r => r.json()).then(resp => {
                    if (!resp.ok) {
                        Swal.fire('Error', resp.msg || 'Error al editar dueño', 'error');
                        return;
                    }
                    modalEditarDueno.hide();
                    Swal.fire('Correcto', 'Dueño actualizado correctamente', 'success').then(() => location.reload());
                }).catch(() => Swal.fire('Error', 'Error al guardar cambios del dueño', 'error'));
            });

            const especieAnimalEdit = document.getElementById('animal_id_especie');
            const razaAnimalEdit = document.getElementById('animal_id_raza');

            function filtrarRazasEditar() {
                const idEspecie = especieAnimalEdit.value;
                razaAnimalEdit.value = '';
                for (let opcion of razaAnimalEdit.options) {
                    if (opcion.value === '') {
                        opcion.hidden = false;
                        continue;
                    }
                    opcion.hidden = opcion.dataset.especie !== idEspecie;
                }
            }

            especieAnimalEdit.addEventListener('change', filtrarRazasEditar);

            document.querySelectorAll('.btn-edit-animal').forEach(boton => {
                boton.addEventListener('click', function () {
                    const id = this.dataset.id;
                    fetch('api/getAnimal.php?id=' + id).then(r => r.json()).then(resp => {
                        if (!resp.ok) {
                            Swal.fire('Error', resp.msg || 'No se encontró el animal', 'error');
                            return;
                        }
                        const a = resp.data;
                        document.getElementById('animal_id').value = a.id_animal ?? '';
                        document.getElementById('animal_nombre').value = a.nombre ?? '';
                        document.getElementById('animal_peso').value = a.peso ?? '';
                        document.getElementById('animal_colores').value = a.colores ?? '';
                        document.getElementById('animal_sexo').value = a.sexo ?? '';
                        document.getElementById('animal_id_especie').value = a.id_especie ?? '';
                        filtrarRazasEditar();
                        document.getElementById('animal_id_raza').value = a.id_raza ?? '';
                        document.getElementById('animal_esterilizado').checked = parseInt(a.esterilizado) === 1;
                        document.getElementById('animal_carnet').checked = parseInt(a.carnet_de_vacunacion) === 1;
                        modalEditarAnimal.show();
                    }).catch(() => Swal.fire('Error', 'Error al cargar los datos del animal', 'error'));
                });
            });

            document.getElementById('formEditarAnimal').addEventListener('submit', function (e) {
                e.preventDefault();
                fetch('api/editAnimal.php', { method: 'POST', body: new FormData(this) }).then(r => r.json()).then(resp => {
                    if (!resp.ok) {
                        Swal.fire('Error', resp.msg || 'Error al editar animal', 'error');
                        return;
                    }
                    modalEditarAnimal.hide();
                    Swal.fire('Correcto', 'Animal actualizado correctamente', 'success').then(() => location.reload());
                }).catch(() => Swal.fire('Error', 'Error al guardar cambios del animal', 'error'));
            });

            document.querySelectorAll('.btn-edit-trabajador').forEach(boton => {
                boton.addEventListener('click', function () {
                    const id = this.dataset.id;
                    fetch('api/getTrabajador.php?id=' + id).then(r => r.json()).then(resp => {
                        if (!resp.ok) {
                            Swal.fire('Error', resp.msg || 'No se encontró el trabajador', 'error');
                            return;
                        }
                        const t = resp.data;
                        document.getElementById('trabajador_id').value = t.id_trabajador ?? '';
                        document.getElementById('trabajador_nombre').value = t.Nombre ?? '';
                        document.getElementById('trabajador_apellido_paterno').value = t.ApellidoPaterno ?? '';
                        document.getElementById('trabajador_apellido_materno').value = t.ApellidoMaterno ?? '';
                        document.getElementById('trabajador_curp').value = t.CURP ?? '';
                        document.getElementById('trabajador_correo').value = t.CorreoElectronico ?? '';
                        document.getElementById('trabajador_role').value = t.role ?? '';
                        modalEditarTrabajador.show();
                    }).catch(() => Swal.fire('Error', 'Error al cargar los datos del trabajador', 'error'));
                });
            });

            document.getElementById('formEditarTrabajador').addEventListener('submit', function (e) {
                e.preventDefault();
                fetch('api/editTrabajador.php', { method: 'POST', body: new FormData(this) }).then(r => r.json()).then(resp => {
                    if (!resp.ok) {
                        Swal.fire('Error', resp.msg || 'Error al editar trabajador', 'error');
                        return;
                    }
                    modalEditarTrabajador.hide();
                    Swal.fire('Correcto', 'Trabajador actualizado correctamente', 'success').then(() => location.reload());
                }).catch(() => Swal.fire('Error', 'Error al guardar cambios del trabajador', 'error'));
            });

            document.querySelectorAll('.btn-desactivar').forEach(boton => {
                boton.addEventListener('click', function () {
                    const id = this.dataset.id;
                    const tipo = this.dataset.tipo;
                    let textoTipo = tipo === 'dueno' ? 'este dueño' : tipo === 'animal' ? 'este animal' : 'este trabajador';

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Se desactivará ' + textoTipo + '. No se eliminará permanentemente.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, desactivar',
                        cancelButtonText: 'Cancelar',
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d'
                    }).then((result) => {
                        if (!result.isConfirmed) return;

                        const datos = new FormData();
                        datos.append('id', id);
                        datos.append('tipo', tipo);

                        fetch('api/desactivarRegistro.php', { method: 'POST', body: datos }).then(r => r.json()).then(resp => {
                            if (!resp.ok) {
                                Swal.fire('Error', resp.msg || 'No se pudo desactivar el registro.', 'error');
                                return;
                            }
                            Swal.fire('Desactivado', 'El registro fue desactivado correctamente.', 'success').then(() => location.reload());
                        }).catch(() => Swal.fire('Error', 'Error de conexión con el servidor.', 'error'));
                    });
                });
            });
        });
    </script>
</head>

<body class="bg-success-subtle">
<header class="p-3 PPHeader text-white d-flex align-items-center justify-content-between">
    <div class="d-flex gap-2">
        <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
    </div>
    <div class="text-center flex-grow-1">
        <h1 class="fw-bold mb-0">Mi mascota Comondú</h1>
        <p class="mb-0">Registro animal del municipio de Comondú</p>
    </div>
    <div class="d-flex align-items-center gap-3">
        <a href="../inicio_sesion/index.php" class="btn btn-danger rounded-pill px-4">Cerrar sesión</a>
        <a href="../accesosgral/misDatos.php"><img src="../imagenes/Imagen.png" class="rounded-circle" width="50"></a>
    </div>
</header>

<main class="container-fluid p-4">
    <div class="main-card shadow-lg d-flex bg-white">
        <aside class="sidebar p-4 d-flex flex-column align-items-center">
            <div class="photo-placeholder-circle mb-4"><span>Consultas</span></div>
            <div class="d-flex flex-column gap-2 w-100 mb-5">
                <button type="button" class="btn-sidebar btn-consulta active" data-target="duenos">Cargar dueños</button>
                <button type="button" class="btn-sidebar btn-consulta" data-target="animales">Cargar animales</button>
                <button type="button" class="btn-sidebar btn-consulta" data-target="trabajadores">Cargar trabajadores</button>
            </div>
            <div class="mt-auto w-100 text-center">
                <a href="../admin/pprincipal.php" class="text-decoration-none text-dark fw-bold fs-3">Regresar</a>
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
                                    <th>ID</th><th>Nombre</th><th>CURP</th><th>Teléfono</th><th>Colonia</th><th>Ciudad</th><th>Dirección</th><th>Clave catastral</th><th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($datosDuenos && $datosDuenos->num_rows > 0): ?>
                                    <?php while ($dueno = $datosDuenos->fetch_assoc()): ?>
                                        <tr class="fila-click" onclick="window.location.href='detalleDueno.php?id=<?= $dueno['id'] ?>'">
                                            <td><?= limpiar($dueno['id']) ?></td>
                                            <td><?= limpiar($dueno['nombres']) ?> <?= limpiar($dueno['apellido_paterno']) ?> <?= limpiar($dueno['apellido_materno']) ?></td>
                                            <td><?= limpiar($dueno['curp']) ?></td>
                                            <td><?= limpiar($dueno['telefono']) ?></td>
                                            <td><?= limpiar($dueno['nombre_colonia']) ?></td>
                                            <td><?= limpiar($dueno['nombre_ciudad']) ?></td>
                                            <td>
                                                <?= limpiar($dueno['calle_principal']) ?>, <?= limpiar($dueno['calle_adyacente']) ?>
                                                <?php if (!empty($dueno['numero_exterior'])): ?> No. <?= limpiar($dueno['numero_exterior']) ?><?php endif; ?>
                                                <?php if (!empty($dueno['numero_interior'])): ?> Int. <?= limpiar($dueno['numero_interior']) ?><?php endif; ?>
                                                <?php if (!empty($dueno['codigo_postal'])): ?> <?= limpiar($dueno['codigo_postal']) ?><?php endif; ?>
                                            </td>
                                            <td><?= limpiar($dueno['clave_catastral']) ?></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-primary btn-edit-dueno me-1" data-id="<?= $dueno['id'] ?>" title="Editar dueño" onclick="event.stopPropagation();"><i class="bi bi-pencil"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-desactivar" data-id="<?= $dueno['id'] ?>" data-tipo="dueno" title="Desactivar dueño" onclick="event.stopPropagation();"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="9" class="text-center text-secondary p-4">No hay dueños registrados.</td></tr>
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
                                    <th>ID</th><th>Mascota</th><th>Especie</th><th>Raza</th><th>Dueño</th><th>Colonia</th><th>Peso</th><th>Color</th><th>Sexo</th><th>Esterilizado</th><th>Cartilla</th><th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($datosAnimales && $datosAnimales->num_rows > 0): ?>
                                    <?php while ($animal = $datosAnimales->fetch_assoc()): ?>
                                        <tr class="fila-click" onclick="window.location.href='detalleAnimal.php?id=<?= $animal['id'] ?>'">
                                            <td><?= limpiar($animal['id']) ?></td>
                                            <td><?= limpiar($animal['nombre_animal']) ?></td>
                                            <td><?= limpiar($animal['nombre_especie']) ?></td>
                                            <td><?= limpiar($animal['nombre_raza']) ?></td>
                                            <td><?= limpiar($animal['nombre_dueno']) ?> <?= limpiar($animal['apellido_paterno']) ?> <?= limpiar($animal['apellido_materno']) ?></td>
                                            <td><?= limpiar($animal['nombre_colonia']) ?></td>
                                            <td><?= $animal['peso'] !== null ? limpiar($animal['peso']) . ' kg' : 'Sin dato' ?></td>
                                            <td><?= limpiar($animal['colores']) ?></td>
                                            <td><?= $animal['sexo'] === 'M' ? 'Macho' : ($animal['sexo'] === 'F' ? 'Hembra' : 'Desconocido') ?></td>
                                            <td><?= $animal['esterilizado'] == 1 ? 'Sí' : 'No' ?></td>
                                            <td><?= $animal['carnet_de_vacunacion'] == 1 ? 'Sí' : 'No' ?></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-primary btn-edit-animal me-1" data-id="<?= $animal['id'] ?>" title="Editar animal" onclick="event.stopPropagation();"><i class="bi bi-pencil"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-desactivar" data-id="<?= $animal['id'] ?>" data-tipo="animal" title="Desactivar animal" onclick="event.stopPropagation();"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="12" class="text-center text-secondary p-4">No hay animales registrados.</td></tr>
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
                                    <th>ID</th><th>Nombre</th><th>CURP</th><th>Correo</th><th>Rol</th><th>Fecha de registro</th><th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($datosTrabajadores && $datosTrabajadores->num_rows > 0): ?>
                                    <?php while ($trabajador = $datosTrabajadores->fetch_assoc()): ?>
                                        <tr class="fila-click" onclick="window.location.href='detalleTrabajador.php?id=<?= $trabajador['ID'] ?>'">
                                            <td><?= limpiar($trabajador['ID']) ?></td>
                                            <td><?= limpiar($trabajador['Nombre']) ?> <?= limpiar($trabajador['ApellidoPaterno']) ?> <?= limpiar($trabajador['ApellidoMaterno']) ?></td>
                                            <td><?= limpiar($trabajador['CURP']) ?></td>
                                            <td><?= limpiar($trabajador['CorreoElectronico']) ?></td>
                                            <td><?= limpiar($trabajador['role']) ?></td>
                                            <td><?= limpiar($trabajador['Created_at']) ?></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-primary btn-edit-trabajador me-1" data-id="<?= $trabajador['ID'] ?>" title="Editar trabajador" onclick="event.stopPropagation();"><i class="bi bi-pencil"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-desactivar" data-id="<?= $trabajador['ID'] ?>" data-tipo="trabajador" title="Desactivar trabajador" onclick="event.stopPropagation();"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="7" class="text-center text-secondary p-4">No hay trabajadores registrados.</td></tr>
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

<div class="modal fade" id="modalEditarDueno" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Editar dueño</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <form id="formEditarDueno">
                <div class="modal-body">
                    <input type="hidden" name="id_dueno" id="dueno_id">
                    <div class="row">
                        <div class="col-md-4 mb-3"><label class="form-label">Nombre</label><input type="text" name="nombres" id="dueno_nombres" class="form-control" required></div>
                        <div class="col-md-4 mb-3"><label class="form-label">Apellido paterno</label><input type="text" name="apellido_paterno" id="dueno_apellido_paterno" class="form-control"></div>
                        <div class="col-md-4 mb-3"><label class="form-label">Apellido materno</label><input type="text" name="apellido_materno" id="dueno_apellido_materno" class="form-control"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">CURP</label><input type="text" name="curp" id="dueno_curp" class="form-control" maxlength="18" required></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Teléfono</label><input type="text" name="telefono" id="dueno_telefono" class="form-control" maxlength="10"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Clave catastral</label><input type="text" name="clave_catastral" id="dueno_clave_catastral" class="form-control"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Colonia</label>
                            <select name="id_colonia" id="dueno_id_colonia" class="form-control" required>
                                <option value="">Selecciona colonia...</option>
                                <?php while ($colonia = $listaColonias->fetch_assoc()): ?>
                                    <option value="<?= $colonia['id'] ?>"><?= limpiar($colonia['nombre_colonia']) ?> - <?= limpiar($colonia['codigo_postal']) ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3"><label class="form-label">Calle principal</label><input type="text" name="calle_principal" id="dueno_calle_principal" class="form-control" required></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Calle adyacente</label><input type="text" name="calle_adyacente" id="dueno_calle_adyacente" class="form-control" required></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Número exterior</label><input type="text" name="numero_exterior" id="dueno_numero_exterior" class="form-control"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Número interior</label><input type="text" name="numero_interior" id="dueno_numero_interior" class="form-control"></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success">Guardar cambios</button><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button></div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarAnimal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Editar animal</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <form id="formEditarAnimal">
                <div class="modal-body">
                    <input type="hidden" name="id_animal" id="animal_id">
                    <div class="row">
                        <div class="col-md-6 mb-3"><label class="form-label">Nombre del animal</label><input type="text" name="nombre" id="animal_nombre" class="form-control" required></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Peso</label><input type="number" step="0.01" min="0" name="peso" id="animal_peso" class="form-control"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Especie</label>
                            <select id="animal_id_especie" class="form-control" required>
                                <option value="">Selecciona especie...</option>
                                <?php while ($especie = $listaEspecies->fetch_assoc()): ?>
                                    <option value="<?= $especie['id'] ?>"><?= limpiar($especie['nombre_especie']) ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Raza</label>
                            <select name="id_raza" id="animal_id_raza" class="form-control" required>
                                <option value="">Selecciona raza...</option>
                                <?php foreach ($razasEditar as $raza): ?>
                                    <option value="<?= $raza['id'] ?>" data-especie="<?= $raza['id_especie'] ?>"><?= limpiar($raza['nombre_raza']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3"><label class="form-label">Color</label><input type="text" name="colores" id="animal_colores" class="form-control"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo" id="animal_sexo" class="form-control" required>
                                <option value="">Selecciona sexo...</option>
                                <option value="M">Macho</option>
                                <option value="F">Hembra</option>
                                <option value="D">Desconocido</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="esterilizado" value="1" id="animal_esterilizado"><label class="form-check-label" for="animal_esterilizado">Esterilizado</label></div></div>
                        <div class="col-md-6 mb-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="carnet_de_vacunacion" value="1" id="animal_carnet"><label class="form-check-label" for="animal_carnet">Carnet de vacunación</label></div></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success">Guardar cambios</button><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button></div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarTrabajador" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Editar trabajador</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <form id="formEditarTrabajador">
                <div class="modal-body">
                    <input type="hidden" name="id_trabajador" id="trabajador_id">
                    <div class="row">
                        <div class="col-md-4 mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" id="trabajador_nombre" class="form-control" required></div>
                        <div class="col-md-4 mb-3"><label class="form-label">Apellido paterno</label><input type="text" name="apellido_paterno" id="trabajador_apellido_paterno" class="form-control" required></div>
                        <div class="col-md-4 mb-3"><label class="form-label">Apellido materno</label><input type="text" name="apellido_materno" id="trabajador_apellido_materno" class="form-control" required></div>
                        <div class="col-md-6 mb-3"><label class="form-label">CURP</label><input type="text" name="curp" id="trabajador_curp" class="form-control" maxlength="19" required></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Correo electrónico</label><input type="email" name="correo" id="trabajador_correo" class="form-control" required></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rol</label>
                            <select name="role" id="trabajador_role" class="form-control" required>
                                <option value="">Selecciona rol...</option>
                                <option value="ADMINISTRADOR">Administrador</option>
                                <option value="CAPTURISTA">Capturista</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success">Guardar cambios</button><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button></div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>