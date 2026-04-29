<?php
session_start();
require_once '../bd/conexion.php';

$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['password'] ?? '';

$consulta = $conexion->prepare(
    "SELECT * FROM trabajadores WHERE CorreoElectronico  = ? LIMIT 1"
);
$consulta->bind_param("s", $correo);
$consulta->execute();
$res = $consulta->get_result();
$user = $res->fetch_assoc();


if (!$user) {
    header('Location: ../index.php?error=1');
    exit;
}


if ((int)$user['is_active'] === 0) {
    header('Location: ../index.php?error=4');
    exit;
}


if ($contrasena !== $user['Password']) {
    header('Location: ../index.php?error=1');
    exit;
}

$_SESSION['correo'] = $user['correo'];
$_SESSION['role'] = $user['role'];
$_SESSION['ID'] = $user['ID'];

header('Location: ../pprincipal.php');
exit;
?>