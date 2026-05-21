<?php
require_once '../bd/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../registro/inicioPrincipalRegistro.php?error=5');
    exit();
}
$conexion->begin_transaction();
try {
    $idColonia = intval($_POST['id_colonia'] ?? 0);
    $callePrincipal = trim($_POST['calle_principal'] ?? '');
    $calleAdyacente = trim($_POST['calle_adyacente'] ?? '');
    $numeroExterior = trim($_POST['numero_exterior'] ?? '');
    $numeroInterior = trim($_POST['numero_interior'] ?? '');
    $curp = strtoupper(trim($_POST['curp'] ?? ''));
    $nombres = trim($_POST['nombres'] ?? '');
    $apellidoPaterno = trim($_POST['apellido_paterno'] ?? '');
    $apellidoMaterno = trim($_POST['apellido_materno'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $claveCatastral = trim($_POST['clave_catastral'] ?? '');
    $idRaza = intval($_POST['id_raza'] ?? 0);
    $nombreMascota = trim($_POST['nombre_mascota'] ?? '');
    $peso = $_POST['peso'] !== '' ? floatval($_POST['peso']) : null;
    $colores = trim($_POST['colores'] ?? '');
    $sexo = $_POST['sexo'] ?? null;
    $esterilizado = isset($_POST['esterilizado']) ? 1 : 0;
    $carnetVacunacion = isset($_POST['carnet_vacunacion']) ? 1 : 0;
    if ($idColonia <= 0) {
        throw new Exception('Debes seleccionar una colonia.');
    }
    if ($callePrincipal === '') {
        throw new Exception('La calle principal es obligatoria.');
    }
    if ($calleAdyacente === '') {
        throw new Exception('La calle adyacente es obligatoria.');
    }
    if ($curp === '' || strlen($curp) !== 18) {
        throw new Exception('La CURP debe tener 18 caracteres.');
    }
    if ($nombres === '') {
        throw new Exception('El nombre del dueño es obligatorio.');
    }
    if ($idRaza <= 0) {
        throw new Exception('Debes seleccionar una raza.');
    }
    if ($nombreMascota === '') {
        throw new Exception('El nombre de la mascota es obligatorio.');
    }
    if (!in_array($sexo, ['M', 'F', 'D'])) {
        throw new Exception('Sexo no válido.');
    }
    $stmtValidarColonia = $conexion->prepare("
        SELECT id
        FROM colonias
        WHERE id = ?
        AND is_active = 1
        LIMIT 1
    ");
    $stmtValidarColonia->bind_param("i", $idColonia);
    $stmtValidarColonia->execute();
    $resultadoColonia = $stmtValidarColonia->get_result();
    if ($resultadoColonia->num_rows === 0) {
        throw new Exception('La colonia seleccionada no existe.');
    }
    $stmtValidarRaza = $conexion->prepare("
        SELECT id
        FROM razas
        WHERE id = ?
        AND is_active = 1
        LIMIT 1
    ");
    $stmtValidarRaza->bind_param("i", $idRaza);
    $stmtValidarRaza->execute();
    $resultadoRaza = $stmtValidarRaza->get_result();
    if ($resultadoRaza->num_rows === 0) {
        throw new Exception('La raza seleccionada no existe.');
    }
    $sqlDireccion = "
        INSERT INTO direccion
        (
            id_colonia,
            calle_principal,
            calle_adyacente,
            numero_exterior,
            numero_interior
        )
        VALUES (?, ?, ?, ?, ?)
    ";
    $stmtDireccion = $conexion->prepare($sqlDireccion);
    $stmtDireccion->bind_param(
        "issss",
        $idColonia,
        $callePrincipal,
        $calleAdyacente,
        $numeroExterior,
        $numeroInterior
    );
    $stmtDireccion->execute();
    $idDireccion = $conexion->insert_id;
    $sqlDueno = "
        INSERT INTO duenos
        (
            curp,
            nombres,
            apellido_paterno,
            apellido_materno,
            telefono,
            clave_catastral,
            id_direccion
        )
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ";
    $stmtDueno = $conexion->prepare($sqlDueno);
    $stmtDueno->bind_param(
        "ssssssi",
        $curp,
        $nombres,
        $apellidoPaterno,
        $apellidoMaterno,
        $telefono,
        $claveCatastral,
        $idDireccion
    );
    $stmtDueno->execute();
    $idDueno = $conexion->insert_id;
    $sqlAnimal = "
        INSERT INTO animal
        (
            id_dueno,
            id_raza,
            nombre,
            peso,
            colores,
            sexo,
            esterilizado,
            carnet_de_vacunacion
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ";
    $stmtAnimal = $conexion->prepare($sqlAnimal);
    $stmtAnimal->bind_param(
        "iisdssii",
        $idDueno,
        $idRaza,
        $nombreMascota,
        $peso,
        $colores,
        $sexo,
        $esterilizado,
        $carnetVacunacion
    );
    $stmtAnimal->execute();
    $conexion->commit();
    header('Location: ../registro/inicioPrincipalRegistro.php?success=1');
    exit();
} catch (mysqli_sql_exception $e) {
    $conexion->rollback();
    if ($conexion->errno == 1062 || str_contains($e->getMessage(), 'Duplicate entry')) {
        header('Location: ../registro/inicioPrincipalRegistro.php?error=8');
        exit();
    }
    header('Location: ../registro/inicioPrincipalRegistro.php?error=7');
    exit();
} catch (Exception $e) {
    $conexion->rollback();
    header('Location: ../registro/inicioPrincipalRegistro.php?error=9');
    exit();
}