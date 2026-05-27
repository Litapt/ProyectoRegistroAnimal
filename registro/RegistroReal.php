<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once '../login/check.php';
require_once '../bd/conexion.php';

$conexion->set_charset('utf8mb4');

function regresarError($codigo, $mensaje)
{
    header('Location: ../registro/inicioPrincipalRegistro.php?error=' . $codigo . '&msg=' . urlencode($mensaje));
    exit();
}

function regresarExito()
{
    header('Location: ../registro/inicioPrincipalRegistro.php?success=1');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    regresarError(5, 'Acceso no permitido.');
}

try {
    $conexion->begin_transaction();

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
    $peso = isset($_POST['peso']) && $_POST['peso'] !== '' ? floatval($_POST['peso']) : 0;
    $colores = trim($_POST['colores'] ?? '');
    $sexo = strtoupper(trim($_POST['sexo'] ?? ''));

    $esterilizado = intval($_POST['esterilizado'] ?? 0);
    $carnetVacunacion = intval($_POST['carnet_vacunacion'] ?? 0);

    if ($idColonia <= 0) {
        throw new Exception('Debes seleccionar una colonia.');
    }

    if ($callePrincipal === '') {
        throw new Exception('La calle principal es obligatoria.');
    }

    if ($calleAdyacente === '') {
        throw new Exception('La calle adyacente es obligatoria.');
    }

    if ($nombres === '') {
        throw new Exception('El nombre del dueño es obligatorio.');
    }

    if ($curp === '' || strlen($curp) !== 18) {
        throw new Exception('La CURP debe tener exactamente 18 caracteres.');
    }

    if ($telefono !== '' && !preg_match('/^[0-9]{10}$/', $telefono)) {
        throw new Exception('El teléfono debe tener exactamente 10 números.');
    }

    if ($idRaza <= 0) {
        throw new Exception('Debes seleccionar una raza.');
    }

    if ($nombreMascota === '') {
        throw new Exception('El nombre de la mascota es obligatorio.');
    }

    if ($peso <= 0) {
        throw new Exception('El peso debe ser mayor a 0.');
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
        throw new Exception('La colonia seleccionada no existe o está inactiva.');
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
        throw new Exception('La raza seleccionada no existe o está inactiva.');
    }

    /*
        1. Insertamos la dirección.
    */
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

    /*
        2. Revisamos si el dueño ya existe por CURP.
        Si existe, reutilizamos su ID.
        Si no existe, lo insertamos.
    */
    $stmtBuscarDueno = $conexion->prepare("
        SELECT id
        FROM duenos
        WHERE curp = ?
        LIMIT 1
    ");
    $stmtBuscarDueno->bind_param("s", $curp);
    $stmtBuscarDueno->execute();
    $resultadoDueno = $stmtBuscarDueno->get_result();

    if ($resultadoDueno->num_rows > 0) {
        $duenoExistente = $resultadoDueno->fetch_assoc();
        $idDueno = intval($duenoExistente['id']);

        /*
            Actualizamos los datos del dueño existente.
            Esto evita el error de CURP duplicada.
        */
        $stmtActualizarDueno = $conexion->prepare("
            UPDATE duenos
            SET
                nombres = ?,
                apellido_paterno = ?,
                apellido_materno = ?,
                telefono = ?,
                clave_catastral = ?,
                id_direccion = ?
            WHERE id = ?
        ");

        $stmtActualizarDueno->bind_param(
            "sssssii",
            $nombres,
            $apellidoPaterno,
            $apellidoMaterno,
            $telefono,
            $claveCatastral,
            $idDireccion,
            $idDueno
        );

        $stmtActualizarDueno->execute();

    } else {
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
    }

    /*
        3. Insertamos la mascota asociada al dueño.
    */
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

    regresarExito();

} catch (mysqli_sql_exception $e) {
    $conexion->rollback();

    regresarError(7, 'Error de base de datos: ' . $e->getMessage());

} catch (Exception $e) {
    $conexion->rollback();

    regresarError(9, $e->getMessage());
}