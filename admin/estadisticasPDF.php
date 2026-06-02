<?php 
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
require_once 'estadisticasDatos.php';

function totalValores($datos) {
    return array_sum($datos['valores'] ?? []);
}

function porcentaje($valor, $total) {
    if ($total <= 0) {
        return '0%';
    }

    return number_format(($valor / $total) * 100, 2) . '%';
}

function obtenerValorPorCategoria($datos, $categoriasBuscadas) {
    if (!isset($datos['labels']) || !isset($datos['valores'])) {
        return 0;
    }

    foreach ($datos['labels'] as $indice => $label) {
        foreach ($categoriasBuscadas as $categoria) {
            if (mb_strtolower(trim($label)) === mb_strtolower(trim($categoria))) {
                return intval($datos['valores'][$indice]);
            }
        }
    }

    return 0;
}

function tablaPorcentajes($titulo, $datos, $mostrarTotal = true) {
    $total = totalValores($datos);

    echo '<h5 class="text-end fw-bold mb-0 mt-2">' . htmlspecialchars($titulo) . '</h5>';

    echo '<table class="table table-bordered border-dark table-sm align-middle mb-4">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="border border-dark fw-bold">Categoría</th>';
    echo '<th class="border border-dark fw-bold">Cantidad</th>';
    echo '<th class="border border-dark fw-bold">Porcentaje</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';

    if ($total <= 0) {
        echo '<tr>';
        echo '<td class="border border-dark" colspan="3">No hay datos registrados.</td>';
        echo '</tr>';
    } else {
        foreach ($datos['labels'] as $indice => $label) {
            $valor = intval($datos['valores'][$indice]);

            echo '<tr>';
            echo '<td class="border border-dark">' . htmlspecialchars($label) . '</td>';
            echo '<td class="border border-dark">' . $valor . '</td>';
            echo '<td class="border border-dark">' . porcentaje($valor, $total) . '</td>';
            echo '</tr>';
        }

        if ($mostrarTotal) {
            echo '<tr>';
            echo '<td class="border border-dark fw-bold">Total</td>';
            echo '<td class="border border-dark fw-bold">' . intval($total) . '</td>';
            echo '<td class="border border-dark fw-bold">100%</td>';
            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
}

function tablaDosCategorias($titulo, $categoria1, $valor1, $categoria2, $valor2) {
    $valor1 = intval($valor1);
    $valor2 = intval($valor2);
    $total = $valor1 + $valor2;

    echo '<h5 class="text-end fw-bold mb-0 mt-2">' . htmlspecialchars($titulo) . '</h5>';

    echo '<table class="table table-bordered border-dark table-sm align-middle mb-4">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="border border-dark fw-bold">Categoría</th>';
    echo '<th class="border border-dark fw-bold">Cantidad</th>';
    echo '<th class="border border-dark fw-bold">Porcentaje</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';

    echo '<tr>';
    echo '<td class="border border-dark">' . htmlspecialchars($categoria1) . '</td>';
    echo '<td class="border border-dark">' . $valor1 . '</td>';
    echo '<td class="border border-dark">' . porcentaje($valor1, $total) . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="border border-dark">' . htmlspecialchars($categoria2) . '</td>';
    echo '<td class="border border-dark">' . $valor2 . '</td>';
    echo '<td class="border border-dark">' . porcentaje($valor2, $total) . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="border border-dark fw-bold">Total</td>';
    echo '<td class="border border-dark fw-bold">' . $total . '</td>';
    echo '<td class="border border-dark fw-bold">100%</td>';
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';
}

$totalAnimales = intval($totalAnimales ?? 0);
$totalDuenos = intval($totalDuenos ?? 0);
$totalColonias = intval($totalColonias ?? count($datosColonias['labels'] ?? []));

$totalEsterilizadas = obtenerValorPorCategoria($datosEsterilizados, [
    'Esterilizadas',
    'Esterilizados',
    'Esterilizado',
    'Sí',
    'Si'
]);

$totalNoEsterilizadas = obtenerValorPorCategoria($datosEsterilizados, [
    'No esterilizadas',
    'No esterilizados',
    'No esterilizado',
    'No'
]);

$totalConCartilla = obtenerValorPorCategoria($datosCartilla, [
    'Con cartilla',
    'Con cartilla de vacunación',
    'Con carnet',
    'Con carnet de vacunación',
    'Sí',
    'Si'
]);

$totalSinCartilla = obtenerValorPorCategoria($datosCartilla, [
    'Sin cartilla',
    'Sin cartilla de vacunación',
    'Sin carnet',
    'Sin carnet de vacunación',
    'No'
]);

ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas generales</title>

    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-3">

    <main class="container-fluid">

        <h3 class="fw-bold mb-3">Estadísticas generales.</h3>

        <p class="fw-bold mb-2">
            Registro de mascotas en el municipio de Comondú, por especie, colonia, cartilla y esterilización.
        </p>

        <p class="mb-2">
            Estadísticas obtenidas del registro realizado en la página de 
            <span class="text-decoration-underline">Mi Mascota Comondú</span>.
        </p>

        <table class="table table-bordered border-dark table-sm align-middle mb-0">
            <thead>
                <tr>
                    <th class="border border-dark fw-bold">Total, mascotas registradas.</th>
                    <th class="border border-dark fw-bold">Total, dueños registrados.</th>
                    <th class="border border-dark fw-bold">Total, colonias con registros.</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="border border-dark"><?php echo $totalAnimales; ?></td>
                    <td class="border border-dark"><?php echo $totalDuenos; ?></td>
                    <td class="border border-dark"><?php echo $totalColonias; ?></td>
                </tr>
            </tbody>
        </table>

        <?php
            tablaPorcentajes(
                'Mascotas por especie.',
                $datosEspecies,
                true
            );

            tablaDosCategorias(
                'Mascotas esterilizadas.',
                'Esterilizadas',
                $totalEsterilizadas,
                'No esterilizadas',
                $totalNoEsterilizadas
            );

            tablaDosCategorias(
                'Mascotas con cartilla de vacunación.',
                'Con cartilla',
                $totalConCartilla,
                'Sin cartilla',
                $totalSinCartilla
            );

            tablaPorcentajes(
                'Registros realizados por colonia.',
                $datosColonias,
                true
            );
        ?>

    </main>

</body>
</html>

<?php 
$html = ob_get_clean();

require_once '../dompdf/autoload.inc.php';

$dompdf = new \Dompdf\Dompdf();

$options = $dompdf->getOptions();
$options->set([
    'isRemoteEnabled' => true
]);

$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();

$dompdf->stream("EstadisticaMascotas.pdf", [
    "Attachment" => true
]);
?>