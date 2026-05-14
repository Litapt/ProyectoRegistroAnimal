<?php
require_once '../bd/conexion.php';

$idUsuario = $_SESSION['ID'];

$sql_consulta = "SELECT * FROM trabajadores WHERE ID = ? LIMIT 1";
$stmt = $conexion->prepare($sql_consulta);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$resultado = $stmt->get_result();
$datos = $resultado->fetch_assoc();
?>