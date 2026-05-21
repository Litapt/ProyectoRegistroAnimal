<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
require_once '../bd/conexion.php';
$resultadoCiudades = $conexion->query("
    SELECT id, nombre_ciudad, municipio, estado, pais
    FROM ciudades
    WHERE is_active = 1
    ORDER BY nombre_ciudad ASC
");
$resultadoColonias = $conexion->query("
    SELECT id, id_ciudad, nombre_colonia, codigo_postal
    FROM colonias
    WHERE is_active = 1
    ORDER BY nombre_colonia ASC
");
$colonias = [];
while ($fila = $resultadoColonias->fetch_assoc()) {
    $colonias[] = $fila;
}
$resultadoEspecies = $conexion->query("
    SELECT id, nombre_especie
    FROM especies
    WHERE is_active = 1
    ORDER BY nombre_especie ASC
");
$resultadoRazas = $conexion->query("
    SELECT id, id_especie, nombre_raza
    FROM razas
    WHERE is_active = 1
    ORDER BY nombre_raza ASC
");
$razas = [];
while ($fila = $resultadoRazas->fetch_assoc()) {
    $razas[] = $fila;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro mascotas</title>
    <link rel="stylesheet" href="../css/inicioPrincipalRegistro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../javascript/registro.js" defer></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const ciudadSelect = document.getElementById('id_ciudad');
    const coloniaSelect = document.getElementById('id_colonia');
    const codigoPostalInput = document.getElementById('codigo_postal');

    const especieSelect = document.getElementById('id_especie');
    const razaSelect = document.getElementById('id_raza');

    function filtrarColonias() {
        if (!ciudadSelect || !coloniaSelect || !codigoPostalInput) {
            return;
        }

        const ciudadSeleccionada = ciudadSelect.value;

        coloniaSelect.value = '';
        codigoPostalInput.value = '';

        for (let opcion of coloniaSelect.options) {
            if (opcion.value === '') {
                opcion.hidden = false;
                continue;
            }

            opcion.hidden = opcion.dataset.ciudad !== ciudadSeleccionada;
        }
    }

    function mostrarCodigoPostal() {
        if (!coloniaSelect || !codigoPostalInput) {
            return;
        }

        const opcionSeleccionada = coloniaSelect.options[coloniaSelect.selectedIndex];

        if (opcionSeleccionada && opcionSeleccionada.dataset.cp) {
            codigoPostalInput.value = opcionSeleccionada.dataset.cp;
        } else {
            codigoPostalInput.value = '';
        }
    }

    function filtrarRazas() {
        if (!especieSelect || !razaSelect) {
            return;
        }

        const especieSeleccionada = especieSelect.value;

        razaSelect.value = '';

        if (especieSeleccionada === '') {
            razaSelect.disabled = true;
            razaSelect.options[0].textContent = 'Primero selecciona una especie...';

            for (let opcion of razaSelect.options) {
                if (opcion.value !== '') {
                    opcion.hidden = true;
                }
            }

            return;
        }

        razaSelect.disabled = false;
        razaSelect.options[0].textContent = 'Selecciona raza...';

        for (let opcion of razaSelect.options) {
            if (opcion.value === '') {
                opcion.hidden = false;
                continue;
            }

            opcion.hidden = opcion.dataset.especie !== especieSeleccionada;
        }
    }

    if (ciudadSelect) {
        ciudadSelect.addEventListener('change', filtrarColonias);
    }

    if (coloniaSelect) {
        coloniaSelect.addEventListener('change', mostrarCodigoPostal);
    }

    if (especieSelect) {
        especieSelect.addEventListener('change', filtrarRazas);
    }

    filtrarColonias();
    filtrarRazas();
});
</script>
</head>
<body class="bg-success-subtle vh-100 d-flex flex-column">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
        </div>
        <div class="dropdown d-flex align-items-center">
            <a class="btn btn-sm btn-outline-light me-2" href="../inicio_sesion/index.php">
                Cerrar sesión
            </a>
            <a href="../accesosgral/misDatos.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>
    <div class="divform">
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success text-center">
                Registro realizado correctamente.
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center">
                Ocurrió un error al registrar. Revisa los datos.
            </div>
        <?php endif; ?>
        <form class="formulario" action="RegistroReal.php" method="POST">
            <h1>Registro</h1>
            <div class="contenedor-progreso">
                <div class="progreso"></div>
                <ol>
                    <li class="dn">Dirección</li>
                    <li class="ds">Dueño(s)</li>
                    <li class="ms">Mascotas</li>
                </ol>
            </div>
            <div class="pasos-contenedor">
                <div class="step">
                    <h3>Dirección</h3>
                    <label class="label-purple">Ciudad</label>
                    <select id="id_ciudad" class="form-control" required>
                        <option value="">Selecciona ciudad...</option>
                        <?php while ($ciudad = $resultadoCiudades->fetch_assoc()): ?>
                            <option value="<?= $ciudad['id'] ?>">
                                <?= htmlspecialchars($ciudad['nombre_ciudad']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <label class="label-purple">Colonia</label>
                    <select id="id_colonia" name="id_colonia" class="form-control" required>
                        <option value="">Selecciona colonia...</option>
                        <?php foreach ($colonias as $colonia): ?>
                            <option
                                value="<?= $colonia['id'] ?>"
                                data-ciudad="<?= $colonia['id_ciudad'] ?>"
                                data-cp="<?= htmlspecialchars($colonia['codigo_postal']) ?>">
                                <?= htmlspecialchars($colonia['nombre_colonia']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label class="label-purple">Código postal</label>
                    <input
                        type="text"
                        id="codigo_postal"
                        class="form-control"
                        placeholder="Se llenará automáticamente"
                        readonly>
                    <label class="label-purple">Calle principal</label>
                    <input
                        type="text"
                        name="calle_principal"
                        class="form-control"
                        placeholder="Agregar texto"
                        required>
                    <label class="label-purple">Calle adyacente</label>
                    <input
                        type="text"
                        name="calle_adyacente"
                        class="form-control"
                        placeholder="Agregar texto"
                        required>
                    <label class="label-purple">Número externo</label>
                    <input
                        type="text"
                        name="numero_exterior"
                        class="form-control"
                        placeholder="Agregar texto">
                    <label class="label-purple">Número interno</label>
                    <input
                        type="text"
                        name="numero_interior"
                        class="form-control"
                        placeholder="Agregar texto">
                </div>
                <div class="step">
                    <h3>Dueño(s)</h3>
                    <label class="label-purple">Nombre</label>
                    <input
                        type="text"
                        name="nombres"
                        class="form-control"
                        placeholder="Agregar texto"
                        required>
                    <label class="label-purple">Apellido paterno</label>
                    <input
                        type="text"
                        name="apellido_paterno"
                        class="form-control"
                        placeholder="Agregar texto">
                    <label class="label-purple">Apellido materno</label>
                    <input
                        type="text"
                        name="apellido_materno"
                        class="form-control"
                        placeholder="Agregar texto">
                    <label class="label-purple">CURP</label>
                    <input
                        type="text"
                        name="curp"
                        class="form-control"
                        maxlength="18"
                        placeholder="Agregar texto"
                        required>
                    <label class="label-purple">Teléfono</label>
                    <input
                        type="text"
                        name="telefono"
                        class="form-control"
                        maxlength="10"
                        placeholder="Agregar texto">
                    <label class="label-purple">Clave catastral</label>
                    <input
                        type="text"
                        name="clave_catastral"
                        class="form-control"
                        placeholder="Agregar texto">
                </div>
                <div class="step">
                    <h3>Mascotas</h3>
                    <label class="label-purple">Nombre del animal</label>
                    <input
                        type="text"
                        name="nombre_mascota"
                        class="form-control"
                        placeholder="Agregar texto"
                        required>
                    <label class="label-purple">Especie</label>
                    <select id="id_especie" class="form-control" required>
                        <option value="">Selecciona especie...</option>
                        <?php while ($especie = $resultadoEspecies->fetch_assoc()): ?>
                            <option value="<?= $especie['id'] ?>">
                                <?= htmlspecialchars($especie['nombre_especie']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <label class="label-purple">Raza</label>
                        <select id="id_raza" name="id_raza" class="form-control" required disabled>
                            <option value="">Primero selecciona una especie...</option>

                            <?php foreach ($razas as $raza): ?>
                                <option
                                    value="<?= $raza['id'] ?>"
                                    data-especie="<?= $raza['id_especie'] ?>"
                                    hidden>
                                    <?= htmlspecialchars($raza['nombre_raza']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <label class="label-purple">Peso</label>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="peso"
                        class="form-control"
                        placeholder="Agregar texto">
                    <label class="label-purple">Color</label>
                    <input
                        type="text"
                        name="colores"
                        class="form-control"
                        placeholder="Agregar texto">
                    <label class="label-purple h-100">Sexo</label>
                    <div>
                        <label class="label-purple">Macho</label>
                        <input
                            type="radio"
                            id="sexo_macho"
                            name="sexo"
                            value="M"
                            class="form-check"
                            required>
                        <label class="label-purple">Hembra</label>
                        <input
                            type="radio"
                            id="sexo_hembra"
                            name="sexo"
                            value="F"
                            class="form-check"
                            required>
                        <label class="label-purple">Desconocido</label>
                        <input
                            type="radio"
                            id="sexo_desconocido"
                            name="sexo"
                            value="D"
                            class="form-check"
                            required>
                    </div>
                    <label class="label-purple">Esterilizado</label>
                    <input
                        type="checkbox"
                        name="esterilizado"
                        value="1"
                        class="form-check">
                    <label class="label-purple">Carnet de vacunación</label>
                    <input
                        type="checkbox"
                        name="carnet_vacunacion"
                        value="1"
                        class="form-check">
                </div>
            </div>
            <div class="control">
                <button type="button" class="anterior">
                    Anterior
                </button>
                <button type="button" class="siguiente">
                    Siguiente
                </button>
                <button type="submit" class="completar">
                    Completar
                </button>
            </div>
        </form>
    </div>
    <div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>
</html>