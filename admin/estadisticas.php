<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
require_once 'estadisticasDatos.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Mi Mascota Comondú</title>
    <link rel="icon" href="../imagenes/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estadisticas.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
         window.estadisticasData = {
            datosEspecies: <?= json_encode($datosEspecies, JSON_UNESCAPED_UNICODE) ?>,
            datosEsterilizados: <?= json_encode($datosEsterilizados, JSON_UNESCAPED_UNICODE) ?>,
            datosCartilla: <?= json_encode($datosCartilla, JSON_UNESCAPED_UNICODE) ?>,
            datosColonias: <?= json_encode($datosColonias, JSON_UNESCAPED_UNICODE) ?>
        };
        document.addEventListener('DOMContentLoaded', function () {
            const datos = window.estadisticasData;
            if (!datos) {
                console.error('No se encontraron los datos de estadísticas.');
                return;
            }
            function crearGraficaPie(idCanvas, datosGrafica, titulo) {
                const canvas = document.getElementById(idCanvas);
                if (!canvas || !datosGrafica) {
                    return;
                }
                new Chart(canvas, {
                    type: 'pie',
                    data: {
                        labels: datosGrafica.labels,
                        datasets: [{
                            label: titulo,
                            data: datosGrafica.valores
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }
            function crearGraficaBarra(idCanvas, datosGrafica, titulo) {
                const canvas = document.getElementById(idCanvas);
                if (!canvas || !datosGrafica) {
                    return;
                }
                new Chart(canvas, {
                    type: 'bar',
                    data: {
                        labels: datosGrafica.labels,
                        datasets: [{
                            label: titulo,
                            data: datosGrafica.valores
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
                datos.datosEspecies,
                'Mascotas por especie'
            );

            crearGraficaPie(
                'graficaEsterilizados',
                datos.datosEsterilizados,
                'Mascotas esterilizadas'
            );

            crearGraficaPie(
                'graficaCartilla',
                datos.datosCartilla,
                'Cartilla de vacunación'
            );

            crearGraficaBarra(
                'graficaColonias',
                datos.datosColonias,
                'Registros por colonia'
            );
        });
    </script>
</head>
<body class="bg-success-subtle">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="text-center flex-grow-1">
            <a class="ink-offset-2 link-underline link-underline-opacity-0 link-light" href="../admin/pprincipal.php">
                <h4 class="mb-0">Mi mascota Comondú</h4>
                <small>Registro animal del municipio de Comondú</small>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap header-botones">
            <a class="btn btn-sm btn-outline-light" href="../admin/pprincipal.php">
                Regresar
            </a>
        </div>
    </header>
    <main class="estadisticas-container">
        <div class="mb-4 text-center">
            <h1 class="titulo-estadisticas">
                Estadísticas Generales
            </h1>
            <p class="text-muted">
                Resumen de registros por especie, colonia, cartilla y esterilización.
            </p>
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
                    <h4 class="mb-3">
                        Mascotas por especie
                    </h4>
                    <div class="chart-box">
                        <canvas id="graficaEspecies"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-estadistica">
                    <h4 class="mb-3">
                        Mascotas esterilizadas
                    </h4>
                    <div class="chart-box">
                        <canvas id="graficaEsterilizados"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-estadistica">
                    <h4 class="mb-3">
                        Cartilla de vacunación
                    </h4>
                    <div class="chart-box">
                        <canvas id="graficaCartilla"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-estadistica">
                    <h4 class="mb-3">
                        Registros por colonia
                    </h4>
                    <div class="chart-box">
                        <canvas id="graficaColonias"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-start mt-3 header-botones">
            <a class="btn btn-sm btn-primary" href="estadisticasPDF.php">
                Descargar Estadistica
            </a>
        </div>
    </main>
    <div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>
</html>
