<?php
require_once '../../login/check.php';
require_rol('ADMINISTRADOR');
require_once '../../bd/conexion.php';

header('Content-Type: application/json; charset=utf-8');

$id_dueno = (int)($_POST['id_dueno'] ?? 0);
$id_colonia = (int)($_POST['id_colonia'] ?? 0);

$nombres = trim($_POST['nombres'] ?? '');
$apellido_paterno = trim($_POST['apellido_paterno'] ?? '');
$apellido_materno = trim($_POST['apellido_materno'] ?? '');
$curp = strtoupper(trim($_POST['curp'] ?? ''));
$telefono = trim($_POST['telefono'] ?? '');
$clave_catastral = trim($_POST['clave_catastral'] ?? '');

$calle_principal = trim($_POST['calle_principal'] ?? '');
$calle_adyacente = trim($_POST['calle_adyacente'] ?? '');
$numero_exterior = trim($_POST['numero_exterior'] ?? '');
$numero_interior = trim($_POST['numero_interior'] ?? '');

if (
    $id_dueno <= 0 ||
    $id_colonia <= 0 ||
    $nombres === '' ||
    $curp === '' ||
    strlen($curp) !== 18 ||
    $calle_principal === '' ||
    $calle_adyacente === ''
) {
    echo json_encode(['ok' => false, 'msg' => 'Datos incompletos']);
    exit;
}

try {
    $conexion->begin_transaction();

    $stmtBuscar = $conexion->prepare("
        SELECT id_direccion
        FROM duenos
        WHERE id = ?
        LIMIT 1
    ");

    $stmtBuscar->bind_param("i", $id_dueno);
    $stmtBuscar->execute();

    $dueno = $stmtBuscar->get_result()->fetch_assoc();

    if (!$dueno) {
        throw new Exception('Dueño no encontrado');
    }

    $id_direccion = (int)$dueno['id_direccion'];

    $stmtDireccion = $conexion->prepare("
        UPDATE direccion
        SET
            id_colonia = ?,
            calle_principal = ?,
            calle_adyacente = ?,
            numero_exterior = ?,
            numero_interior = ?
        WHERE id = ?
    ");

    $stmtDireccion->bind_param(
        "issssi",
        $id_colonia,
        $calle_principal,
        $calle_adyacente,
        $numero_exterior,
        $numero_interior,
        $id_direccion
    );

    $stmtDireccion->execute();

    $stmtDueno = $conexion->prepare("
        UPDATE duenos
        SET
            curp = ?,
            nombres = ?,
            apellido_paterno = ?,
            apellido_materno = ?,
            telefono = ?,
            clave_catastral = ?
        WHERE id = ?
    ");

    $stmtDueno->bind_param(
        "ssssssi",
        $curp,
        $nombres,
        $apellido_paterno,
        $apellido_materno,
        $telefono,
        $clave_catastral,
        $id_dueno
    );

    $stmtDueno->execute();

    $conexion->commit();

    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);

} catch (mysqli_sql_exception $e) {
    $conexion->rollback();

    if ($conexion->errno == 1062) {
        echo json_encode(['ok' => false, 'msg' => 'La CURP ya existe']);
        exit;
    }

    echo json_encode(['ok' => false, 'msg' => 'Error SQL']);
} catch (Exception $e) {
    $conexion->rollback();

    echo json_encode(['ok' => false, 'msg' => $e->getMessage()]);
}