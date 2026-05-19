<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div>
        <p>Datos del animal</p>
        </div>
        <div class="row g-4 align-items-center">
            <img src="imagenes/Imagen.png" class="rounded-circle" width="50">
            <div class="row g-4 align-items-center">
                <button type="button" class="btn">Tomar foto</button>
                <button type="button" class="btn">Cargar foto</button>
            </div>
        </div>
        <div>
            <label for="CurpDueño">CURP del dueño*</label>
            <input type="text" id="CURP" name="CURP" placeholder="COSD050405MDFTNN21" minlength="18" required><hr>
            <label for="NombreAnimal">Nombre del animal*</label>
            <input type="text" id="NombreAnimal" name="NombreAnimal" placeholder="Princesa" minlength="3" required><hr>
            <label for="Especie">Especie*</label>
            <select id="Especie" name="Especie" require>
                <option value="*">
                    Selecciona especie...
                </option>
                <option value="Canino">
                    Canino
                </option>
                <option value="Felino">
                    Felino
                </option>
                <option value="Ave">
                    Ave
                </option>
                <option value="Reptil">
                    Reptil
                </option>
                <option value="Roedor">
                    Roedor
                </option>
                <option value="Granja">
                    Granja
                </option>
                <option value="Peces">
                    Peces
                </option>
                <option value="Anfibio">
                    Anfibio
                </option>
            </select><hr>
            <label for="Raza">Raza*</label>
            <!--RAZAS estan pendientes hasta la base de datos-->
            <!--INVESTIGAR SI LAS RAZAS SE PUEDEN JALAR DE LA BASE DE DATOS-->
            <select id="Raza" name="Raza" require>
                <option value="*">
                    Selecciona raza...
                </option>
            </select><hr>
            <label for="Sexo">Peso*</label>
            <input type="number" id="Peso" name="Peso" placeholder="En kilogramos" required><hr>
            <label for="Color">Color</label>
            <input type="text" id="Color" required><hr>
            <label for="Sexo">Sexo*</label>
            <label for="Macho">Macho</label>
            <input type="radio" id="Sexo" name="Sexo" value="Macho"><hr>
            <label for="Hembra">Hembra</label>
            <input type="radio" id="Sexo" name="Sexo" value="Hembra"><hr>
            <label for="Desconocido">Desconocido</label>
            <input type="radio" id="Sexo" name="Sexo" value="Desconocido"><hr>
            <label for="Estirilizado">Estrilizado</label>
            <label for="respuesta">Si</label>
            <input type="radio" id="Estirilizado" name="Estirilizado"><hr>
            <label for="respuesta">No</label>
            <input type="radio" id="NoEsterilizado" name="NoEsterilizado"><hr>
            <label for="Carnet">Carnet de vacunacion</label>
            <label for="respuesta">Si</label>
            <input type="radio" id="Carnet" name="Carnet"><hr>
            <label for="respuesta">No</label>
            <input type="radio" id="NoCarnet" name="NoCarnet"><hr>
            <button type="button" class="btn">Generar QR</button><hr>
            <button type="button" class="btn">Guardar</button><hr>
            <button type="button" class="btn">Cancelar</button><hr>
        </div>
    </main>
</body>
</html>