<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <header >
        <div class="PRAHeader">
            <img src="Imagen.png" class="PPMenuIcono" style="width:3%;">
            <img src="Imagen.png" class="PPMenuIcono" style="width:3%;">
            <a href="#" class="PPLogo"><img src="LogoGobierno.png" style="width:15%; margin-left:35%; margin-right: 35%;"></a>
            <label for="PPMenu">
            <img src="Imagen.png" class="PPMenuIcono" style="width:3%;">
        </div>
    </header>    
    <main>
        <div>
        <p>Datos del animal</p>
        </div>
        <div>
            <img src="mdksmds" alt="">
            <button type="button" class="btn">Tomar foto</button>
            <button type="button" class="btn">Cargar foto</button>
        </div>
        <div>
            <label for="CurpDueño">CURP del dueño*</label>
            <input type="text" id="CURP" name="CURP" placeholder="COSD050405MDFTNN21" minlength="18" required>
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
            <input type="number" id="Peso" name="Peso" placeholder="En kilogramos" required>
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
            <label for="Macho">Macho</label>
            <input type="radio" id="Sexo" name="Sexo" value="Macho">
            <label for="Hembra">Hembra</label>
            <input type="radio" id="Sexo" name="Sexo" value="Hembra">
            <label for="Desconocido">Desconocido</label>
            <input type="radio" id="Sexo" name="Sexo" value="Desconocido">
            <label for="Estirilizado">Estrilizado</label>
            <label for="respuesta">Si</label>
            <input type="radio" id="Estirilizado" name="Estirilizado">
            <label for="respuesta">No</label>
            <input type="radio" id="NoEsterilizado" name="NoEsterilizado">
            <label for="Carnet">Carnet de vacunacion</label>
            <label for="respuesta">Si</label>
            <input type="radio" id="Carnet" name="Carnet">
            <label for="respuesta">No</label>
            <input type="radio" id="NoCarnet" name="NoCarnet">
            <button type="button" class="btn">Generar QR</button>
            <button type="button" class="btn">Guardar</button>
            <button type="button" class="btn">Cancelar</button>
        </div>
    </main>
</body>
</html>