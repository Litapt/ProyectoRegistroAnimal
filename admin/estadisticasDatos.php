<?php
require_once '../bd/conexion.php';

function obtenerDatosGrafica($conexion, $sql) {
    $resultado = $conexion->query($sql);

    $labels = [];
    $valores = [];

    while ($fila = $resultado->fetch_assoc()) {
        $labels[] = $fila['nombre'];
        $valores[] = intval($fila['total']);
    }

    return [
        'labels' => $labels,
        'valores' => $valores
    ];
}

$datosEspecies = obtenerDatosGrafica($conexion, " SELECT e.nombre_especie AS nombre, COUNT(a.id) AS total FROM animal a INNER JOIN razas r ON a.id_raza = r.id
    INNER JOIN especies e ON r.id_especie = e.id WHERE a.is_active = 1 GROUP BY e.id, e.nombre_especie ORDER BY total DESC ");

$datosEsterilizados = obtenerDatosGrafica($conexion, " SELECT CASE  WHEN esterilizado = 1 THEN 'Esterilizados' ELSE 'No esterilizados' END AS nombre,
    COUNT(*) AS total FROM animal WHERE is_active = 1 GROUP BY esterilizado
");

$datosCartilla = obtenerDatosGrafica($conexion, " SELECT CASE  WHEN carnet_de_vacunacion = 1 THEN 'Con cartilla' ELSE 'Sin cartilla' END AS nombre,
    COUNT(*) AS total FROM animal WHERE is_active = 1 GROUP BY carnet_de_vacunacion
");

$datosColonias = obtenerDatosGrafica($conexion, " SELECT c.nombre_colonia AS nombre, COUNT(a.id) AS total FROM animal a INNER JOIN duenos d ON a.id_dueno = d.id
    INNER JOIN direccion dir ON d.id_direccion = dir.id INNER JOIN colonias c ON dir.id_colonia = c.id WHERE a.is_active = 1
    GROUP BY c.id, c.nombre_colonia ORDER BY total DESC
");

$totalAnimales = $conexion->query(" SELECT COUNT(*) AS total FROM animal WHERE is_active = 1 ")->fetch_assoc()['total'];

$totalDuenos = $conexion->query(" SELECT COUNT(*) AS total FROM duenos WHERE is_active = 1 ")->fetch_assoc()['total'];

$totalColonias = $conexion->query(" SELECT COUNT(DISTINCT dir.id_colonia) AS total FROM animal a INNER JOIN duenos d ON a.id_dueno = d.id
    INNER JOIN direccion dir ON d.id_direccion = dir.id WHERE a.is_active = 1 ")->fetch_assoc()['total'];

$totalEsterilizados = $conexion->query(" SELECT COUNT(*) AS total FROM animal WHERE is_active = 1 AND esterilizado = 1 ")->fetch_assoc()['total'];
?>
