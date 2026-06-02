<?php
session_start();

require_once '../bd/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: nuevapassword.php');
    exit();
}

if (!isset($_SESSION['reset_id_trabajador']) || !isset($_SESSION['reset_autorizado']) || $_SESSION['reset_autorizado'] !== true) {
    header('Location: restablecerpsw.php');
    exit();
}

$idTrabajador = (int)$_SESSION['reset_id_trabajador'];
$password = $_POST['password'] ?? '';
$confirmarPassword = $_POST['confirmar_password'] ?? '';

if ($password === '' || $confirmarPassword === '' || $password !== $confirmarPassword || strlen($password) < 8) {
    header('Location: nuevapassword.php?error=1');
    exit();
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conexion->prepare("
    UPDATE trabajadores
    SET Password = ?,
        reset_token = NULL,
        reset_expira = NULL,
        reset_usado = 1
    WHERE ID = ?
");

$stmt->bind_param("si", $passwordHash, $idTrabajador);
$stmt->execute();

unset($_SESSION['reset_id_trabajador']);
unset($_SESSION['reset_correo']);
unset($_SESSION['reset_autorizado']);

header('Location: ../index.php?password_actualizada=1');
exit();