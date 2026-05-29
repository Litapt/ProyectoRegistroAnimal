document.addEventListener('DOMContentLoaded', () => {
    //Seleccion de elementos de html
    const form = document.querySelector('.formulario');
    const progress = document.querySelector('.progreso');
    const stepsContainer = document.querySelector('.pasos-contenedor');
    const steps = document.querySelectorAll('.step');
    const stepIndicators = document.querySelectorAll('.contenedor-progreso li');
    const anterior = document.querySelector('.anterior');
    const siguiente = document.querySelector('.siguiente');
    const completar = document.querySelector('.completar');

    //Seleccion de propiedades css
    document.documentElement.style.setProperty("--steps", stepIndicators.length);

    //Se "esconde la linea de seleccion"
    let currentStep = 0;

    const isValidStep = () => {
        const fields = steps[currentStep].querySelectorAll('input, textarea, select');
        return [...fields].every(field => field.reportValidity());
    };

    const inputs = form.querySelectorAll('input, textarea, select');

    inputs.forEach(input => input.addEventListener('focus', (e) => {
        const focusedElement = e.target;

        const focusedStep = [...steps].findIndex(step => step.contains(focusedElement));

        if (focusedStep !== -1 && focusedStep !== currentStep) {
            if (!isValidStep()) return;
            currentStep = focusedStep;
            updateProgress();
        }

        stepsContainer.scrollLeft = 0;
        stepsContainer.scrollTop = 0;
    }));

    anterior.addEventListener("click", (e) => {
        //Por si el tipo de boton no se especifica se le da el tipo de submit
        e.preventDefault();

        if (currentStep > 0) {
            currentStep--;
            updateProgress();
        }
    });

    siguiente.addEventListener("click", (e) => {
        //Por si el tipo de boton no se especifica se le da el tipo de submit
        e.preventDefault();

        if (!isValidStep()) return;

        if (currentStep < stepIndicators.length - 1) {
            currentStep++;
            updateProgress();
        }
    });

    //Funcion progreso de los pasos respecto a los botones
    const updateProgress = () => {
        let width = currentStep / (stepIndicators.length - 1);

        progress.style.transform = `scaleX(${width})`;
        stepsContainer.style.height = steps[currentStep].offsetHeight + "px";

        stepIndicators.forEach((indicators, index) => {
            indicators.classList.toggle('ds', currentStep === index);
            indicators.classList.toggle('dn', currentStep > index);
        });

        steps.forEach((step, index) => {
            step.style.transform = `translateX(-${currentStep * 100}%)`;
            step.classList.toggle('ds', currentStep === index);
        });

        updateButtons();
    };

    const updateButtons = () => {
        anterior.hidden = currentStep === 0;
        siguiente.hidden = currentStep >= stepIndicators.length - 1;
        completar.hidden = !siguiente.hidden;
    };

    //Confirmacion antes de completar el formulario
    completar.addEventListener('click', function (e) {
        e.preventDefault();

        if (!isValidStep()) return;

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Se enviará la información del formulario.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, completar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#198754',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            if (!result.isConfirmed) return;

            form.submit();
        });
    });

    updateProgress();
});