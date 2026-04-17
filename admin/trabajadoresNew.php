<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
require_once '../bd/conexion.php';

$nombre=$_POST['nombre'] ?? "";
$apellidoP=$_POST['apellidop'] ?? "";
$apellidoM=$_POST['apellidom'] ?? "";
$curp=$_POST['CURP'] ?? "";
$correo=$_POST['correo'] ?? "";
$contra=$_POST['password'] ?? "";
$rol=$_POST['rol'] ?? "";


$sql_insert_trabajador="insert into trabajadores  (Nombre,ApellidoPaterno,ApellidoMaterno,CURP,CorreoElectronico,Password,role) values (?,?,?,?,?,?,?)";
$insertar_trabajador=$conexion->prepare($sql_insert_trabajador);
$insertar_trabajador->bind_param("sssssss",$nombre,$apellidoP,$apellidoM,$curp,$correo,$contra,$rol);
$insertar_trabajador->execute();
//falta el mensaje al introducir un trabajador...
header("Location: RegistroTrabajadores.php");
exit();

?>