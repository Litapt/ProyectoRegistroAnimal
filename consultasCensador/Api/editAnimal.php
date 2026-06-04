<?php
require_once '../../login/check.php';
require_rol('ADMINISTRADOR');
require_once '../../bd/conexion.php';

header('Content-Type: application/json; charset=utf-8');

$id_animal = (int)($_POST['id_animal'] ?? 0);
$id_raza = (int)($_POST['id_raza'] ?? 0);

$nombre = trim($_POST['nombre'] ?? '');
$peso = $_POST['peso'] !== '' ? (float)$_POST['peso'] : null;
$colores = trim($_POST['colores'] ?? '');
$sexo = $_POST['sexo'] ?? '';

$esterilizado = isset($_POST['esterilizado']) ? 1 : 0;
$carnet_de_vacunacion = isset($_POST['carnet_de_vacunacion']) ? 1 : 0;

if (
    $id_animal <= 0 ||
    $id_raza <= 0 ||
    $nombre === '' ||
    !in_array($sexo, ['M', 'F', 'D'])
) {
    echo json_encode(['ok' => false, 'msg' => 'Datos incompletos']);
    exit;
}

try {
    $stmt = $conexion->prepare("
        UPDATE animal
        SET
            id_raza = ?,
            nombre = ?,
            peso = ?,
            colores = ?,
            sexo = ?,
            esterilizado = ?,
            carnet_de_vacunacion = ?
        WHERE id = ?
    ");

    $stmt->bind_param(
        "isdssiii",
        $id_raza,
        $nombre,
        $peso,
        $colores,
        $sexo,
        $esterilizado,
        $carnet_de_vacunacion,
        $id_animal
    );

    $stmt->execute();

    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'msg' => 'Error al editar animal']);
}