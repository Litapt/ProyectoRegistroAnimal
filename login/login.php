<?php
session_start();
require_once '../bd/conexion.php';

$correo = $_POST['CorreoElectronico'] ?? '';
$contrasena = $_POST['Password'] ?? 'error';

$consulta = $conexion->prepare(
    "SELECT * FROM trabajadores WHERE CorreoElectronico  = ? LIMIT 1"
);
$consulta->bind_param("s", $correo);
$consulta->execute();
$res = $consulta->get_result();
$user = $res->fetch_assoc();

if (!$user) {
    header('Location: ../inicio_sesion/index.php?error=1');
    exit;
}

if ((int)$user['is_active'] === 0) {
    header('Location: ../inicio_sesion/index.php?error=4');
    exit;
}

if ($contrasena !== $user['Password']) {
    header('Location: ../inicio_sesion/index.php?error=1');
    exit;
}
/*if (!password_verify($contrasena, $user['Password'])) {
    header('Location: ../index.php?error=1');
    exit;
}*/

$_SESSION['correo'] = $user['CorreoElectronico'];
$_SESSION['role'] = $user['role'];
$_SESSION['ID'] = $user['ID'];


if($user['role']=='ADMINISTRADOR'){
        header('Location: ../admin/pprincipal.php');
        exit;
    }
if($user['role']=='OFICINA'){
        header('Location: ../oficina/Trabajos_oficina.php');
        exit;
}
if($user['role']=='CENSADOR'){
        header('Location: ../censador/principalCensador.php');
        exit;
}
?>