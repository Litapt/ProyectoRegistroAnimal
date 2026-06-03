<?php
require_once '../bd/conexion.php';

function limpiar($dato) {
    return htmlspecialchars($dato ?? '', ENT_QUOTES, 'UTF-8');
}

$buscarDueno = trim($_GET['buscar_dueno'] ?? '');
$buscarAnimal = trim($_GET['buscar_animal'] ?? '');
$buscarTrabajador = trim($_GET['buscar_trabajador'] ?? '');

$sqlDuenos = " SELECT d.id, d.curp, d.nombres, d.apellido_paterno, d.apellido_materno, d.telefono, d.clave_catastral,
    dir.calle_principal, dir.calle_adyacente, dir.numero_exterior, dir.numero_interior, col.nombre_colonia, col.codigo_postal, ci.nombre_ciudad
    FROM duenos d LEFT JOIN direccion dir ON d.id_direccion = dir.id LEFT JOIN colonias col ON dir.id_colonia = col.id
    LEFT JOIN ciudades ci ON col.id_ciudad = ci.id WHERE d.is_active = 1
";

if ($buscarDueno !== '') {
    $sqlDuenos .= "AND (d.nombres LIKE ? OR d.apellido_paterno LIKE ? OR d.apellido_materno LIKE ?
            OR CONCAT(d.nombres, ' ', d.apellido_paterno, ' ', d.apellido_materno) LIKE ?)";

    $sqlDuenos .= " ORDER BY d.id DESC";

    $busquedaDueno = '%' . $buscarDueno . '%';
    $stmtDuenos = $conexion->prepare($sqlDuenos);
    $stmtDuenos->bind_param("ssss", $busquedaDueno, $busquedaDueno, $busquedaDueno, $busquedaDueno);
    $stmtDuenos->execute();
    $datosDuenos = $stmtDuenos->get_result();
} else {
    $sqlDuenos .= " ORDER BY d.id DESC";
    $datosDuenos = $conexion->query($sqlDuenos);
}

$sqlAnimales = " SELECT a.id, a.nombre AS nombre_animal, a.peso, a.colores, a.sexo, a.esterilizado, a.carnet_de_vacunacion,
    r.nombre_raza, e.nombre_especie, d.id AS id_dueno, d.nombres AS nombre_dueno, d.apellido_paterno, d.apellido_materno,
    col.nombre_colonia, col.codigo_postal, ci.nombre_ciudad FROM animal a INNER JOIN duenos d ON a.id_dueno = d.id
    INNER JOIN razas r ON a.id_raza = r.id INNER JOIN especies e ON r.id_especie = e.id LEFT JOIN direccion dir ON d.id_direccion = dir.id
    LEFT JOIN colonias col ON dir.id_colonia = col.id LEFT JOIN ciudades ci ON col.id_ciudad = ci.id WHERE a.is_active = 1
";

if ($buscarAnimal !== '') {
    $sqlAnimales .= "AND a.nombre LIKE ? ORDER BY a.id DESC";

    $busquedaAnimal = '%' . $buscarAnimal . '%';
    $stmtAnimales = $conexion->prepare($sqlAnimales);
    $stmtAnimales->bind_param("s", $busquedaAnimal);
    $stmtAnimales->execute();
    $datosAnimales = $stmtAnimales->get_result();
} else {
    $sqlAnimales .= " ORDER BY a.id DESC";
    $datosAnimales = $conexion->query($sqlAnimales);
}

$sqlTrabajadores = "SELECT ID, Nombre, ApellidoPaterno, ApellidoMaterno, CURP, CorreoElectronico, role, Created_at
    FROM trabajadores WHERE is_active = 1
";

if ($buscarTrabajador !== '') {
    $sqlTrabajadores .= "AND (Nombre LIKE ? OR ApellidoPaterno LIKE ? OR ApellidoMaterno LIKE ?
        OR CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) LIKE ?)";
    $sqlTrabajadores .= " ORDER BY ID DESC";

    $busquedaTrabajador = '%' . $buscarTrabajador . '%';
    $stmtTrabajadores = $conexion->prepare($sqlTrabajadores);
    $stmtTrabajadores->bind_param("ssss", $busquedaTrabajador, $busquedaTrabajador, $busquedaTrabajador, $busquedaTrabajador);
    $stmtTrabajadores->execute();
    $datosTrabajadores = $stmtTrabajadores->get_result();
} else {
    $sqlTrabajadores .= " ORDER BY ID DESC";
    $datosTrabajadores = $conexion->query($sqlTrabajadores);
}
?>