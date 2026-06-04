<?php
require_once '../../login/check.php';
require_rol('ADMINISTRADOR');
require_once '../../bd/conexion.php';

header('Content-Type: application/json; charset=utf-8');
$id = (int)($_POST['id'] ?? 0);
$tipo = $_POST['tipo'] ?? '';
if ($id <= 0 || !in_array($tipo, ['dueno', 'animal', 'trabajador'])) {
    echo json_encode(['ok' => false, 'msg' => 'Datos inválidos'], JSON_UNESCAPED_UNICODE);
    exit;
}
try {
    $conexion->begin_transaction();
    if ($tipo === 'dueno') {
        $stmt = $conexion->prepare("UPDATE duenos SET is_active = 0 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmtAnimales = $conexion->prepare("UPDATE animal SET is_active = 0 WHERE id_dueno = ?");
        $stmtAnimales->bind_param("i", $id);
        $stmtAnimales->execute();
    }
    if ($tipo === 'animal') {
        $stmt = $conexion->prepare("UPDATE animal SET is_active = 0 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    if ($tipo === 'trabajador') {
        $stmt = $conexion->prepare("UPDATE trabajadores SET is_active = 0 WHERE ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    $conexion->commit();
    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);
}catch (Exception $e){
    $conexion->rollback();
    echo json_encode(['ok' => false, 'msg' => 'Error al desactivar el registro'], JSON_UNESCAPED_UNICODE);
}