// 1. Inicializamos con una ruta por defecto que empiece en 'paso-inicio'
let rutaActual = ['paso-inicio']; 
let indicePaso = 0;

function definirRuta(opcion) {
    indicePaso = 0;
    if (opcion === 'nueva') {
        rutaActual = ['paso-inicio', 'paso-ubicacion-nueva', 'paso-datos-dueno', 'paso-elegir-animal', 'paso-datos-animal'];
    } else {
        rutaActual = ['paso-inicio', 'paso-ubicacion-actual', 'paso-datos-dueno', 'paso-elegir-animal', 'paso-datos-animal'];
    }
    avanzar();
}

function avanzar() {
    // Si intentan dar "Siguiente" en el inicio sin haber elegido opción, los detenemos
    if (rutaActual.length === 1 && indicePaso === 0) {
        alert("Por favor, seleccione si la ubicación es 'Existente' o 'Nueva'.");
        return;
    }

    const pasoActualId = rutaActual[indicePaso];
    
    // Validación de campos requeridos
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

    // Lógica de cambio de interfaz segura usando remove y add en vez de replace
    if (indicePaso < rutaActual.length - 1) {
        const elementoActual = document.getElementById(rutaActual[indicePaso]);
        elementoActual.classList.remove('d-block');
        elementoActual.classList.add('d-none');

        indicePaso++;

        const elementoSiguiente = document.getElementById(rutaActual[indicePaso]);
        elementoSiguiente.classList.remove('d-none');
        elementoSiguiente.classList.add('d-block');
        
        actualizarUI();
    } else {
        alert("Registro Finalizado");
        location.reload();
    }
}

function retroceder() {
    if (indicePaso > 0) {
        const elementoActual = document.getElementById(rutaActual[indicePaso]);
        elementoActual.classList.remove('d-block');
        elementoActual.classList.add('d-none');

        indicePaso--;

        const elementoAnterior = document.getElementById(rutaActual[indicePaso]);
        elementoAnterior.classList.remove('d-none');
        elementoAnterior.classList.add('d-block');
        
        actualizarUI();
    }
}

function actualizarUI() {
    const btn = document.getElementById('btnSiguiente');
    btn.innerText = (indicePaso === rutaActual.length - 1) ? "Terminar" : "Siguiente";

    // Ocultar el botón "Siguiente" si se está en el paso-inicio para obligar a elegir
    if (indicePaso === 0) {
        btn.style.display = 'none';
    } else {
        btn.style.display = 'inline-block';
    }

    let circuloActivo = 1;
    if (rutaActual[indicePaso].includes('dueno')) circuloActivo = 2;
    if (rutaActual[indicePaso].includes('animal')) circuloActivo = 3;

    document.querySelectorAll('.paso-circulo').forEach((c, i) => {
        c.classList.toggle('activo', (i + 1) === circuloActivo);
    });
}