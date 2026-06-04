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
        a.id AS id_animal,
        a.id_raza,
        r.id_especie,
        a.nombre,
        a.peso,
        a.colores,
        a.sexo,
        a.esterilizado,
        a.carnet_de_vacunacion
    FROM animal a
    INNER JOIN razas r ON a.id_raza = r.id
    WHERE a.id = ?
    AND a.is_active = 1
    LIMIT 1
");

$consulta->bind_param("i", $id);
$consulta->execute();

$resultado = $consulta->get_result();
$animal = $resultado->fetch_assoc();

if (!$animal) {
    echo json_encode(['ok' => false, 'msg' => 'Animal no encontrado']);
    exit;
}

$animal['id_animal'] = (int)$animal['id_animal'];
$animal['id_raza'] = (int)$animal['id_raza'];
$animal['id_especie'] = (int)$animal['id_especie'];
$animal['esterilizado'] = (int)$animal['esterilizado'];
$animal['carnet_de_vacunacion'] = (int)$animal['carnet_de_vacunacion'];

echo json_encode(['ok' => true, 'data' => $animal], JSON_UNESCAPED_UNICODE);