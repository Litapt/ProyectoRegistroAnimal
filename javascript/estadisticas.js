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