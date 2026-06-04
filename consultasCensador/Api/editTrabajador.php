<?php
require_once '../../login/check.php';
require_rol('ADMINISTRADOR');
require_once '../../bd/conexion.php';

header('Content-Type: application/json; charset=utf-8');

$id_trabajador = (int)($_POST['id_trabajador'] ?? 0);

$nombre = trim($_POST['nombre'] ?? '');
$apellido_paterno = trim($_POST['apellido_paterno'] ?? '');
$apellido_materno = trim($_POST['apellido_materno'] ?? '');
$curp = strtoupper(trim($_POST['curp'] ?? ''));
$correo = trim($_POST['correo'] ?? '');
$role = $_POST['role'] ?? '';

if (
    $id_trabajador <= 0 ||
    $nombre === '' ||
    $apellido_paterno === '' ||
    $apellido_materno === '' ||
    $curp === '' ||
    $correo === '' ||
    !in_array($role, ['ADMINISTRADOR', 'CAPTURISTA'])
) {
    echo json_encode(['ok' => false, 'msg' => 'Datos incompletos']);
    exit;
}

try {
    $stmt = $conexion->prepare("
        UPDATE trabajadores
        SET
            Nombre = ?,
            ApellidoPaterno = ?,
            ApellidoMaterno = ?,
            CURP = ?,
            CorreoElectronico = ?,
            role = ?
        WHERE ID = ?
    ");

    $stmt->bind_param(
        "ssssssi",
        $nombre,
        $apellido_paterno,
        $apellido_materno,
        $curp,
        $correo,
        $role,
        $id_trabajador
    );

    $stmt->execute();

    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);

} catch (mysqli_sql_exception $e) {
    if ($conexion->errno == 1062) {
        echo json_encode(['ok' => false, 'msg' => 'CURP o correo ya registrado']);
        exit;
    }

    echo json_encode(['ok' => false, 'msg' => 'Error SQL']);
} catch (Exception $e) {
    echo json_encode(['ok' => false, 'msg' => 'Error al editar trabajador']);
}