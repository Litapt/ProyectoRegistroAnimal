<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="registro.css">
    <link rel="script" href="registro.js">
</head>
<body>
    <div class="Progreso">
        <form id="FUno">
            <h3>
            REGISTRAR PROPIETARIO
            </h3>
            <label for="fecha">
                Fecha de registro
            </label>
            <input type="date" id="fecha" name="fecha" placeholder="Fecha" required>
            <label for="propietario">
                Nombre del propietario
            </label>
            <input type="text" id="propietario" name="propietario" placeholder="Nombre del propietario" required>
            <label for="tel">
                Telefono
            </label>
            <input type="tel" id="tel" name="tel" placeholder="Telefono" required>
            <label for="catastral">
                Clave catastral
            </label>
            <input type="text" id="catastral" name="catastral" placeholder="Clave catastral" required>
            <label for="cantidad">
                Cantidad
            </label>
            <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad" required min="1">
            <br>
            <button type="button" onclick="mostrarRegistro()" class="btn" id="btn">Siguiente</button>
        </form>
        <form id="FDos" style="display: none;">
        <h3>
            REGISTRO DE ANIMALES
        </h3>
        <div>
            <img src="Imagen.png" class="foto">
            <br>
            <button type="button" class="btn">Tomar foto</button>
            <button type="button" class="btn">Cargar foto</button>
        </div>
        <div>
            <label for="NombreAnimal">Nombre del animal*</label>
            <input type="text" id="NombreAnimal" name="NombreAnimal" placeholder="Princesa" minlength="3" required>
            <label for="Especie">Especie*</label>
            <select id="Especie" name="Especie" require>
                <option value="*">
                    Selecciona especie...
                </option>
                <option value="canino">
                    Canino
                </option>
                <option value="felino">
                    Felino
                </option>
                <option value="aves">
                    Aves
                </option>
                <option value="peces">
                    Peces
                </option>
                <option value="anfibios">
                    Anfibios
                </option>
                <option value="reptiles">
                    Reptiles
                </option>
                <option value="invertebrados">
                    Invertebrados
                </option>
            </select>
                <label for="Raza">Raza*</label>
                <!--RAZAS estan pendientes hasta la base de datos-->
                <select id="Raza" name="Raza" require>
                    <option value="*">
                        Selecciona raza...
                    </option>
            </select>
            <label for="Sexo">Peso*</label>
            <input type="number" id="Peso" name="Peso" placeholder="En kilogramos" required min="0" step="0.001">
            <label for="Color">Color</label>
            <select name="Color" id="Color" required>
                <option value="*">
                    Selecciona color...
                </option>
                <option value="negro">
                    Negro
                </option>
                <option value="blanco">
                    Blanco
                </option>
                <option value="gris">
                    Gris
                </option>
                <option value="marron">
                    Marron
                </option>
                <option value="rojo">
                    Rojo
                </option>
                <option value="azul">
                    Azul
                </option>
                <option value="verde">
                    Verde
                </option>
                <option value="amarillo">
                    Amarillo
                </option>
                <option value="naranja">
                    Naranja
                </option>
                <option value="rosa">
                    Rosa
                </option>
                <option value="cafe">
                    Cafe
                </option>
                <option value="plateado">
                    Plateado
                </option> 
            </select>
            <label for="Direccion">Direccion</label>
            <!--<input type="" id="Direccion" name="Direccion"label>-->
            <!--Esto de aqui queda pendiente-->
            <label for="Sexo">Sexo*</label>
            <!--PREGUNTAR AL MAESTRO COMO HACER PARA QUE NO HAYA UN SALTO DE LINEA DESPUES DE ESTOS INPUT-->
            <label for="Macho">Macho</label>
            <input type="radio" id="Sexo" name="Sexo" value="Macho">
            <label for="Hembra">Hembra</label>
            <input type="radio" id="Sexo" name="Sexo" value="Hembra">
            <label for="Desconocido">Desconocido</label>
            <input type="radio" id="Sexo" name="Sexo" value="Desconocido">
            <label for="Estirilizado">Estrilizado</label>
            Si
            <input type="radio" id="Estirilizado" name="Estirilizado">
            No
            <input type="radio" id="NoEsterilizado" name="NoEsterilizado">
            <label for="Carnet">Carnet de vacunacion</label>
            Si
            <input type="radio" id="Carnet" name="Carnet">
            No
            <input type="radio" id="NoCarnet" name="NoCarnet">
            <br>
            <button type="button" class="btn">Generar QR</button>
            <button type="button" class="btn">Guardar</button>
            <button type="button" class="btn">Cancelar</button>
        </div>
        </form>
    </div>
    <script src="registro.js">
    </script>
</body>
</html>