<?php
session_start();

require_once '../bd/conexion.php';
require_once '../mailer/src/Exception.php';
require_once '../mailer/src/PHPMailer.php';
require_once '../mailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('America/Mazatlan');

function enviarCodigoRestablecimiento($correoDestino, $nombreDestino, $codigo) {
    $mail = new PHPMailer(true);

    try {
        $nombreSeguro = htmlspecialchars($nombreDestino, ENT_QUOTES, 'UTF-8');
        $codigoSeguro = htmlspecialchars((string)$codigo, ENT_QUOTES, 'UTF-8');

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mimascotacomondu@gmail.com';
        $mail->Password = 'kgvf ttdj ehnv qrcv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];

        $mail->setFrom('mimascotacomondu@gmail.com', 'Mi Mascota Comondú');
        $mail->addAddress($correoDestino, $nombreDestino);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Código para restablecer contraseña';
        $mail->isHTML(true);

        $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 500px; margin: auto;'>
                <h2 style='color: #198754;'>Mi Mascota Comondú</h2>
                <p>Hola <strong>{$nombreSeguro}</strong>,</p>
                <p>Recibimos una solicitud para restablecer tu contraseña.</p>
                <p>Tu código de verificación es:</p>
                <div style='background: #e8f5e9; border: 1px solid #a5d6a7; padding: 20px; text-align: center; border-radius: 8px; font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #1b5e20;'>
                    {$codigoSeguro}
                </div>
                <p style='color: #555; margin-top: 15px;'>
                    Este código expira en <strong>10 minutos</strong>.<br>
                    Si no solicitaste este cambio, ignora este correo.
                </p>
                <hr style='border-color: #c8e6c9;'>
                <p style='color: #888; font-size: 12px;'>Sistema Mi Mascota Comondú</p>
            </div>
        ";

        $mail->AltBody = "Tu código para restablecer contraseña es: {$codigo}. Expira en 10 minutos.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: restablecerpsw.php');
    exit();
}

$curp = strtoupper(trim($_POST['curp'] ?? ''));
$correo = trim($_POST['correo'] ?? '');

if ($curp === '' || $correo === '') {
    header('Location: restablecerpsw.php?error=1');
    exit();
}

if (strlen($curp) !== 18 || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: restablecerpsw.php?error=1');
    exit();
}

try {
    $stmt = $conexion->prepare("
        SELECT ID, Nombre, ApellidoPaterno, CorreoElectronico
        FROM trabajadores
        WHERE CURP = ?
        AND CorreoElectronico = ?
        AND is_active = 1
        LIMIT 1
    ");

    $stmt->bind_param("ss", $curp, $correo);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if (!$usuario) {
        header('Location: restablecerpsw.php?enviado=1');
        exit();
    }

    $codigo = random_int(100000, 999999);
    $codigoHash = password_hash((string)$codigo, PASSWORD_DEFAULT);
    $expira = date('Y-m-d H:i:s', strtotime('+10 minutes'));

    $stmtUpdate = $conexion->prepare("
        UPDATE trabajadores
        SET reset_token = ?,
            reset_expira = ?,
            reset_usado = 0
        WHERE ID = ?
    ");

    $stmtUpdate->bind_param("ssi", $codigoHash, $expira, $usuario['ID']);
    $stmtUpdate->execute();

    $nombreCompleto = $usuario['Nombre'] . ' ' . $usuario['ApellidoPaterno'];

    $enviado = enviarCodigoRestablecimiento(
        $usuario['CorreoElectronico'],
        $nombreCompleto,
        $codigo
    );

    if (!$enviado) {
        $stmtLimpiar = $conexion->prepare("
            UPDATE trabajadores
            SET reset_token = NULL,
                reset_expira = NULL,
                reset_usado = 0
            WHERE ID = ?
        ");

        $stmtLimpiar->bind_param("i", $usuario['ID']);
        $stmtLimpiar->execute();

        header('Location: restablecerpsw.php?error=correo');
        exit();
    }

    $_SESSION['reset_id_trabajador'] = $usuario['ID'];
    $_SESSION['reset_correo'] = $usuario['CorreoElectronico'];

    header('Location: verificarcodigo.php?enviado=1');
    exit();

} catch (Exception $e) {
    header('Location: restablecerpsw.php?error=sql');
    exit();
}
?>