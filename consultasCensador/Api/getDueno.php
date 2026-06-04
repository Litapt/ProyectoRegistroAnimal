<?php
require_once '../../login/check.php';
require_rol('CAPTURISTA');
require_once '../../bd/conexion.php';

header('Content-Type: application/json; charset=utf-8');

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    echo json_encode(['ok' => false, 'msg' => 'ID no válido']);
    exit;
}

$consulta = $conexion->prepare("
    SELECT
        d.id AS id_dueno,
        d.curp,
        d.nombres,
        d.apellido_paterno,
        d.apellido_materno,
        d.telefono,
        d.clave_catastral,
        dir.id AS id_direccion,
        dir.id_colonia,
        dir.calle_principal,
        dir.calle_adyacente,
        dir.numero_exterior,
        dir.numero_interior
    FROM duenos d
    LEFT JOIN direccion dir ON d.id_direccion = dir.id
    WHERE d.id = ?
    AND d.is_active = 1
    LIMIT 1
");

$consulta->bind_param("i", $id);
$consulta->execute();

$resultado = $consulta->get_result();
$dueno = $resultado->fetch_assoc();

if (!$dueno) {
    echo json_encode(['ok' => false, 'msg' => 'Dueño no encontrado']);
    exit;
}

$dueno['id_dueno'] = (int)$dueno['id_dueno'];
$dueno['id_direccion'] = (int)$dueno['id_direccion'];
$dueno['id_colonia'] = (int)$dueno['id_colonia'];

echo json_encode(['ok' => true, 'data' => $dueno], JSON_UNESCAPED_UNICODE);