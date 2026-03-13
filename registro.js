/*function mostrarRegistro() {
    document.getElementById("FDos").style.display = "block";
}*/
/*function mostrarRegistro(){
    let cantidad=document.getElementById("cantidad").value;
    let contenedor=document.getElementById("FDos");
    contenedor.innerHTML="";
    for(let i=1;i<=cantidad;i++){
        let registro=document.cloneNode(true);
        registro.style.display="block";
        registro.removeAttribute("id");
        contenedor.appendChild(registro);
   }
}*/
/*function mostrarRegistro(){
    let cantidad = document.getElementById("cantidad").value;
    let plantilla = document.getElementById("FDos");
    let contenedor = document.querySelector(".Progreso");
    for(let i = 0; i < cantidad; i++){
        let nuevo = plantilla.cloneNode(true);
        nuevo.style.display = "block";
        let titulo = nuevo.querySelector("h3");
        titulo.textContent = "REGISTRO DE ANIMAL " + (i+1);
        contenedor.appendChild(nuevo);
    }
}*/
function mostrarRegistro(){
    let form = document.getElementById("FUno"); /*Elemento completo*/
    if(!form.checkValidity()){ /*Esta completo?*/
        form.reportValidity();/*Esta correcto?*/
        return; /*True/False */
    }
    let cantidad = document.getElementById("cantidad").value; /*Valor del elemento*/
    let plantilla = document.getElementById("FDos");
    let contenedor = document.querySelector(".Progreso");
    for(let i = 0; i < cantidad; i++){ /*Dependiendo de el numero que haya en el elemento de id cantidad se va a repetir la funcion*/
        let nuevo = plantilla.cloneNode(true);
        nuevo.style.display = "block"; /*Aparece el formulario que estaba escondido*/
        let titulo = nuevo.querySelector("h3");/*Aparece una etiqueta nueva de titulo*/
        titulo.textContent = "REGISTRO DE ANIMAL " + (i+1); /*Se imprime el numero de registro dependiendo de el numero de "bucle" en el que va*/
        contenedor.appendChild(nuevo);
    }
}