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

function iniciarMap(){
  var coord = {lat:25.0440617, lng:-111.6392783};
  var map = new google.maps.Map(document.getElementById("map"),{zoom:10,center:coord});
}