<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
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

$datosEspecies = obtenerDatosGrafica($conexion, "
    SELECT 
        e.nombre_especie AS nombre,
        COUNT(a.id) AS total
    FROM animal a
    INNER JOIN razas r ON a.id_raza = r.id
    INNER JOIN especies e ON r.id_especie = e.id
    WHERE a.is_active = 1
    GROUP BY e.id, e.nombre_especie
    ORDER BY total DESC
");

$datosEsterilizados = obtenerDatosGrafica($conexion, "
    SELECT 
        CASE 
            WHEN esterilizado = 1 THEN 'Esterilizados'
            ELSE 'No esterilizados'
        END AS nombre,
        COUNT(*) AS total
    FROM animal
    WHERE is_active = 1
    GROUP BY esterilizado
");

$datosCartilla = obtenerDatosGrafica($conexion, "
    SELECT 
        CASE 
            WHEN carnet_de_vacunacion = 1 THEN 'Con cartilla'
            ELSE 'Sin cartilla'
        END AS nombre,
        COUNT(*) AS total
    FROM animal
    WHERE is_active = 1
    GROUP BY carnet_de_vacunacion
");

$datosColonias = obtenerDatosGrafica($conexion, "
    SELECT 
        c.nombre_colonia AS nombre,
        COUNT(a.id) AS total
    FROM animal a
    INNER JOIN duenos d ON a.id_dueno = d.id
    INNER JOIN direccion dir ON d.id_direccion = dir.id
    INNER JOIN colonias c ON dir.id_colonia = c.id
    WHERE a.is_active = 1
    GROUP BY c.id, c.nombre_colonia
    ORDER BY total DESC
");

$totalAnimales = $conexion->query("
    SELECT COUNT(*) AS total
    FROM animal
    WHERE is_active = 1
")->fetch_assoc()['total'];

$totalDuenos = $conexion->query("
    SELECT COUNT(*) AS total
    FROM duenos
    WHERE is_active = 1
")->fetch_assoc()['total'];

$totalColonias = $conexion->query("
    SELECT COUNT(DISTINCT dir.id_colonia) AS total
    FROM animal a
    INNER JOIN duenos d ON a.id_dueno = d.id
    INNER JOIN direccion dir ON d.id_direccion = dir.id
    WHERE a.is_active = 1
")->fetch_assoc()['total'];

$totalEsterilizados = $conexion->query("
    SELECT COUNT(*) AS total
    FROM animal
    WHERE is_active = 1
    AND esterilizado = 1
")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Mi Mascota Comondú</title>

    <link rel="stylesheet" href="../css/inicioPrincipalRegistro.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background: #d1e7dd;
            min-height: 100vh;
        }

        .estadisticas-container {
            width: 95%;
            max-width: 1300px;
            margin: 30px auto;
        }

        .card-estadistica {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.10);
            height: 100%;
        }

        .titulo-estadisticas {
            font-weight: bold;
            color: #2c3e50;
        }

        .numero-card {
            font-size: 38px;
            font-weight: bold;
            color: #198754;
        }

        .texto-card {
            color: #6c757d;
            font-weight: 600;
        }

        .chart-box {
            height: 350px;
        }

        .chart-box canvas {
            max-height: 330px;
        }

        .PPHeader {
            background: #198754;
        }
    </style>
</head>

<body>

    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>

        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Estadísticas del registro animal</small>
        </div>

        <div class="dropdown d-flex align-items-center">
            <a class="btn btn-sm btn-outline-light me-2" href="../admin/pprincipal.php">
                Regresar
            </a>
            <a href="../accesosgral/misDatos.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>

    <main class="estadisticas-container">

        <div class="mb-4 text-center">
            <h1 class="titulo-estadisticas">Estadísticas Generales</h1>
            <p class="text-muted">Resumen de registros de mascotas por especie, colonia, cartilla y esterilización.</p>
        </div>

        <div class="row g-4 mb-4">

            <div class="col-md-3">
                <div class="card-estadistica text-center">
                    <div class="numero-card">
                        <?= $totalAnimales ?>
                    </div>
                    <div class="texto-card">
                        Mascotas registradas
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-estadistica text-center">
                    <div class="numero-card">
                        <?= $totalDuenos ?>
                    </div>
                    <div class="texto-card">
                        Dueños registrados
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-estadistica text-center">
                    <div class="numero-card">
                        <?= $totalColonias ?>
                    </div>
                    <div class="texto-card">
                        Colonias con registros
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-estadistica text-center">
                    <div class="numero-card">
                        <?= $totalEsterilizados ?>
                    </div>
                    <div class="texto-card">
                        Mascotas esterilizadas
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-4">

            <div class="col-lg-6">
                <div class="card-estadistica">
                    <h4 class="mb-3">Mascotas por especie</h4>
                    <div class="chart-box">
                        <canvas id="graficaEspecies"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-estadistica">
                    <h4 class="mb-3">Mascotas esterilizadas</h4>
                    <div class="chart-box">
                        <canvas id="graficaEsterilizados"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-estadistica">
                    <h4 class="mb-3">Cartilla de vacunación</h4>
                    <div class="chart-box">
                        <canvas id="graficaCartilla"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-estadistica">
                    <h4 class="mb-3">Registros por colonia</h4>
                    <div class="chart-box">
                        <canvas id="graficaColonias"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <script>
        const datosEspecies = <?= json_encode($datosEspecies, JSON_UNESCAPED_UNICODE) ?>;
        const datosEsterilizados = <?= json_encode($datosEsterilizados, JSON_UNESCAPED_UNICODE) ?>;
        const datosCartilla = <?= json_encode($datosCartilla, JSON_UNESCAPED_UNICODE) ?>;
        const datosColonias = <?= json_encode($datosColonias, JSON_UNESCAPED_UNICODE) ?>;

        function crearGraficaPie(idCanvas, datos, titulo) {
            const ctx = document.getElementById(idCanvas);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: datos.labels,
                    datasets: [{
                        label: titulo,
                        data: datos.valores
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        function crearGraficaBarra(idCanvas, datos, titulo) {
            const ctx = document.getElementById(idCanvas);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: datos.labels,
                    datasets: [{
                        label: titulo,
                        data: datos.valores
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        }

        crearGraficaPie(
            'graficaEspecies',
            datosEspecies,
            'Mascotas por especie'
        );

        crearGraficaPie(
            'graficaEsterilizados',
            datosEsterilizados,
            'Mascotas esterilizadas'
        );

        crearGraficaPie(
            'graficaCartilla',
            datosCartilla,
            'Cartilla de vacunación'
        );

        crearGraficaBarra(
            'graficaColonias',
            datosColonias,
            'Registros por colonia'
        );
    </script>

</body>

</html>