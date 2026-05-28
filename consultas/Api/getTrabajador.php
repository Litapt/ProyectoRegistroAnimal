<?php
require_once '../../login/check.php';
require_rol('ADMINISTRADOR');
require_once '../../bd/conexion.php';

header('Content-Type: application/json; charset=utf-8');

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    echo json_encode(['ok' => false, 'msg' => 'ID no válido']);
    exit;
}

$consulta = $conexion->prepare("
    SELECT
        ID AS id_trabajador,
        Nombre,
        ApellidoPaterno,
        ApellidoMaterno,
        CURP,
        CorreoElectronico,
        role
    FROM trabajadores
    WHERE ID = ?
    AND is_active = 1
    LIMIT 1
");

$consulta->bind_param("i", $id);
$consulta->execute();

$resultado = $consulta->get_result();
$trabajador = $resultado->fetch_assoc();

if (!$trabajador) {
    echo json_encode(['ok' => false, 'msg' => 'Trabajador no encontrado']);
    exit;
}

$trabajador['id_trabajador'] = (int)$trabajador['id_trabajador'];

echo json_encode(['ok' => true, 'data' => $trabajador], JSON_UNESCAPED_UNICODE);