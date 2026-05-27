<?php
require_once '../bd/conexion.php';

function limpiarVista($dato) {
    return htmlspecialchars($dato ?? '', ENT_QUOTES, 'UTF-8');
}

function textoSexo($sexo) {
    if ($sexo === 'M') {
        return 'Macho';
    }

    if ($sexo === 'F') {
        return 'Hembra';
    }

    return 'Desconocido';
}

function textoBooleano($valor) {
    return $valor == 1 ? 'Sí' : 'No';
}

function obtenerDuenoPorId($conexion, $id) {
    $sql = "
        SELECT
            d.id,
            d.curp,
            d.nombres,
            d.apellido_paterno,
            d.apellido_materno,
            d.telefono,
            d.clave_catastral,
            dir.calle_principal,
            dir.calle_adyacente,
            dir.numero_exterior,
            dir.numero_interior,
            col.nombre_colonia,
            col.codigo_postal,
            ci.nombre_ciudad,
            ci.municipio,
            ci.estado,
            ci.pais
        FROM duenos d
        LEFT JOIN direccion dir ON d.id_direccion = dir.id
        LEFT JOIN colonias col ON dir.id_colonia = col.id
        LEFT JOIN ciudades ci ON col.id_ciudad = ci.id
        WHERE d.id = ?
        AND d.is_active = 1
        LIMIT 1
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result()->fetch_assoc();
}

function obtenerMascotasDelDueno($conexion, $idDueno) {
    $sql = "
        SELECT
            a.id,
            a.nombre,
            a.sexo,
            a.esterilizado,
            a.carnet_de_vacunacion,
            r.nombre_raza,
            e.nombre_especie
        FROM animal a
        INNER JOIN razas r ON a.id_raza = r.id
        INNER JOIN especies e ON r.id_especie = e.id
        WHERE a.id_dueno = ?
        AND a.is_active = 1
        ORDER BY a.id DESC
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idDueno);
    $stmt->execute();

    $resultado = $stmt->get_result();

    $mascotas = [];

    while ($fila = $resultado->fetch_assoc()) {
        $mascotas[] = $fila;
    }

    return $mascotas;
}

function obtenerAnimalPorId($conexion, $id) {
    $sql = "
        SELECT
            a.id,
            a.nombre AS nombre_animal,
            a.peso,
            a.colores,
            a.sexo,
            a.esterilizado,
            a.carnet_de_vacunacion,
            a.created_at,
            r.nombre_raza,
            e.nombre_especie,
            d.id AS id_dueno,
            d.curp,
            d.nombres,
            d.apellido_paterno,
            d.apellido_materno,
            d.telefono,
            d.clave_catastral,
            dir.calle_principal,
            dir.calle_adyacente,
            dir.numero_exterior,
            dir.numero_interior,
            col.nombre_colonia,
            col.codigo_postal,
            ci.nombre_ciudad,
            ci.municipio,
            ci.estado,
            ci.pais
        FROM animal a
        INNER JOIN duenos d ON a.id_dueno = d.id
        INNER JOIN razas r ON a.id_raza = r.id
        INNER JOIN especies e ON r.id_especie = e.id
        LEFT JOIN direccion dir ON d.id_direccion = dir.id
        LEFT JOIN colonias col ON dir.id_colonia = col.id
        LEFT JOIN ciudades ci ON col.id_ciudad = ci.id
        WHERE a.id = ?
        AND a.is_active = 1
        LIMIT 1
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result()->fetch_assoc();
}

function obtenerTrabajadorPorId($conexion, $id) {
    $sql = "
        SELECT
            ID,
            Nombre,
            ApellidoPaterno,
            ApellidoMaterno,
            CURP,
            CorreoElectronico,
            role,
            Created_at
        FROM trabajadores
        WHERE ID = ?
        AND is_active = 1
        LIMIT 1
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result()->fetch_assoc();
}