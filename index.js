document.addEventListener("DOMContentLoaded", function () {

    const boton = document.getElementById("btnregistro");

    boton.addEventListener("click", function (event) {

        event.preventDefault(); // evita que el formulario recargue la página

        let cantidad = document.getElementById("cantidad").value;
        let contenedor = document.getElementById("registrosMascotas");

        contenedor.innerHTML = ""; // limpia registros anteriores

        for (let i = 1; i <= cantidad; i++) {

            let registro = document.createElement("div");

            registro.classList.add("registroMascota");

            registro.innerHTML = `
                <h4>Mascota ${i}</h4>

                <input type="text" placeholder="Nombre de la mascota" required>
                
                <select>
                    <option value="">Especie...</option>
                    <option value="canino">Canino</option>
                    <option value="felino">Felino</option>
                    <option value="aves">Aves</option>
                    <option value="peces">Peces</option>
                </select>

                <input type="text" placeholder="Raza">
                <input type="number" placeholder="Edad">

                <hr>
            `;

            contenedor.appendChild(registro);
        }

    });

});