let rutaActual = [];
let indicePaso = 0;

function definirRuta(opcion) {
    if (opcion === 'nueva') {
        // Ruta Completa: Inicio -> Imagen 5 -> Imagen 2 -> Imagen 3 -> Imagen 4
        rutaActual = ['paso-inicio', 'paso-ubicacion-nueva', 'paso-ubicacion-actual', 'paso-datos-dueno', 'paso-datos-animal'];
    } else {
        // Ruta Corta: Inicio -> Imagen 2 -> Imagen 3 -> Imagen 4
        rutaActual = ['paso-inicio', 'paso-ubicacion-actual', 'paso-datos-dueno', 'paso-datos-animal'];
    }
    avanzar(); // Salta al primer paso real de la ruta
}

function avanzar() {
    const pasoActualId = rutaActual[indicePaso];
    
    // Validación: Solo avanzar si los inputs requeridos están llenos
    const inputs = document.querySelectorAll(`#${pasoActualId} input[required], #${pasoActualId} select[required]`);
    let esValido = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            esValido = false;
            input.classList.add('is-invalid');
        } else {
            input.classList.remove('is-invalid');
        }
    });

    if (!esValido && indicePaso > 0) {
        alert("Por favor, complete todos los campos obligatorios.");
        return;
    }

    // Lógica de cambio de interfaz
    if (indicePaso < rutaActual.length - 1) {
        document.getElementById(rutaActual[indicePaso]).classList.replace('d-block', 'd-none');
        indicePaso++;
        document.getElementById(rutaActual[indicePaso]).classList.replace('d-none', 'd-block');
        actualizarUI();
    } else {
        // Si es el último paso, el botón "Terminar" recarga a la Imagen 1
        alert("Registro Finalizado");
        location.reload();
    }
}

function retroceder() {
    if (indicePaso > 0) {
        document.getElementById(rutaActual[indicePaso]).classList.replace('d-block', 'd-none');
        indicePaso--;
        document.getElementById(rutaActual[indicePaso]).classList.replace('d-none', 'd-block');
        actualizarUI();
    }
}

function actualizarUI() {
    // Actualiza el texto del botón en el último paso
    const btn = document.getElementById('btnSiguiente');
    btn.innerText = (indicePaso === rutaActual.length - 1) ? "Terminar" : "Siguiente";

    // Lógica de los círculos (Stepper)
    // Paso 1 (Ubicación), Paso 2 (Dueño), Paso 3 (Animal)
    let circuloActivo = 1;
    if (rutaActual[indicePaso].includes('dueno')) circuloActivo = 2;
    if (rutaActual[indicePaso].includes('animal')) circuloActivo = 3;

    document.querySelectorAll('.paso-circulo').forEach((c, i) => {
        c.classList.toggle('activo', (i + 1) === circuloActivo);
    });
}