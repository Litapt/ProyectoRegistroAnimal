<?php
$host="localhost";
$usuario="root";
$password="3nr1qu3Go";
$bd="prabasededatos";
$port="3306";
$conexion = new mysqli($host, $usuario, $password, $bd, $port);
if ($conexion -> connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8mb4");
?>