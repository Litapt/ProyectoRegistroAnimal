document.addEventListener('DOMContentLoaded', function () {

    const botonesConsulta = document.querySelectorAll('.btn-consulta');
    const tablasConsulta = document.querySelectorAll('.consulta-tabla');

    botonesConsulta.forEach(boton => {
        boton.addEventListener('click', () => {

            const target = boton.dataset.target;

            botonesConsulta.forEach(btn => {
                btn.classList.remove('active');
            });

            boton.classList.add('active');

            tablasConsulta.forEach(tabla => {
                tabla.classList.add('d-none');
            });

            const tablaSeleccionada = document.getElementById('consulta-' + target);

            if (tablaSeleccionada) {
                tablaSeleccionada.classList.remove('d-none');
            }

        });
    });

    // Clic en las filas de las tablas
    const filasClick = document.querySelectorAll('.fila-click');

    filasClick.forEach(fila => {
        fila.addEventListener('click', function () {
            const url = fila.dataset.url;

            if (url) {
                window.location.href = url;
            }
        });
    });

});