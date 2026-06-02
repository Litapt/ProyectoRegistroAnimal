<?php
session_start();

require_once '../bd/conexion.php';

date_default_timezone_set('America/Mazatlan');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: verificarcodigo.php');
    exit();
}

if (!isset($_SESSION['reset_id_trabajador'])) {
    header('Location: restablecerpsw.php');
    exit();
}

$idTrabajador = (int)$_SESSION['reset_id_trabajador'];

$codigo = $_POST['codigo'] ?? '';
$codigo = trim($codigo);
$codigo = preg_replace('/\D/', '', $codigo);

if ($codigo === '' || strlen($codigo) !== 6) {
    header('Location: verificarcodigo.php?error=1');
    exit();
}

$stmt = $conexion->prepare("
    SELECT reset_token, reset_expira, reset_usado
    FROM trabajadores
    WHERE ID = ?
    AND is_active = 1
    LIMIT 1
");

$stmt->bind_param("i", $idTrabajador);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    header('Location: restablecerpsw.php');
    exit();
}

if (
    empty($usuario['reset_token']) ||
    empty($usuario['reset_expira']) ||
    (int)$usuario['reset_usado'] === 1
) {
    header('Location: verificarcodigo.php?error=1');
    exit();
}

$ahora = new DateTime('now');
$expira = new DateTime($usuario['reset_expira']);

if ($ahora > $expira) {
    header('Location: verificarcodigo.php?error=1');
    exit();
}

if (!password_verify($codigo, $usuario['reset_token'])) {
    header('Location: verificarcodigo.php?error=1');
    exit();
}

$_SESSION['reset_autorizado'] = true;

header('Location: nuevapassword.php');
exit();
?>