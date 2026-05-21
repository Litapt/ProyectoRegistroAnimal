document.addEventListener('DOMContentLoaded', () => {
    //Seleccion de elementos de html
    const progress=document.querySelector('.progreso');
    const stepsContainer=document.querySelector('.pasos-contenedor');
    const steps=document.querySelectorAll('.step');
    const stepIndicators=document.querySelectorAll('.contenedor-progreso li');
    const anterior=document.querySelector('.anterior');
    const siguiente=document.querySelector('.siguiente');
    const completar=document.querySelector('.completar');

    //Seleccion de propiedades css
    document.documentElement.style.setProperty("--steps", stepIndicators.length);

    //Se "esconde la linea de seleccion"
    let currentStep=0;

    anterior.addEventListener("click", (e)=>{
        //Por si el tipo de boton no se espeficia se le da el tipo de submit
        e.preventDefault();

        if(currentStep>0){
            currentStep--;
            updateProgress();
        }
    });

    siguiente.addEventListener("click", (e)=>{
        //Por si el tipo de boton no se espeficia se le da el tipo de submit
        e.preventDefault();

        if(currentStep<stepIndicators.length-1){
            currentStep++;
            updateProgress();
        }
    });

    //Funcion progreso de los pasos respecto a los botones
    const updateProgress=()=>{
        let width=currentStep / (stepIndicators.length -1);
        progress.style.transform = `scaleX(${width})`;
        stepsContainer.style.height=steps[currentStep].offsetHeight + "px";
        stepIndicators.forEach((indicators, index)=>{
            indicators.classList.toggle('ds', currentStep === index);
            indicators.classList.toggle('dn', currentStep > index);
        });
        steps.forEach((step, index)=>{
            step.style.transform=`translateX(-${currentStep * 100}%)`;
            step.classList.toggle('ds', currentStep === index);
        });
        updateButtons();
    }

    const updateButtons = () =>{
        anterior.hidden=currentStep===0;
        siguiente.hidden=currentStep>=stepIndicators.length-1;
        completar.hidden=!siguiente.hidden;
    };

    updateProgress();

});