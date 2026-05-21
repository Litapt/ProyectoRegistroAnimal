<?php
require_once '../login/check.php';
require_rol('ADMINISTRADOR');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro mascotas</title>
    <link rel="stylesheet" href="../css/inicioPrincipalRegistro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../javascript/registro.js" defer></script>
</head>

<body class="bg-success-subtle vh-100 d-flex flex-column">
    <header class="position-relative d-flex align-items-center justify-content-between p-3 PPHeader text-white">
        <div class="d-flex align-items-center gap-2">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h4 class="mb-0">Mi mascota Comondú</h4>
            <small>Registro animal del municipio de Comondú</small>
        </div>
        <div class="dropdown d-flex align-items-center">
            <a class="btn btn-sm btn-outline-light me-2" href="../inicio_sesion/index.php">
                Cerrar sesion
            </a>
            <a href="../accesosgral/misDatos.php">
                <img src="../imagenes/Imagen.png" class="rounded-circle" width="50">
            </a>
        </div>
    </header>
    <div class="divform">
        <form class="formulario">
            <H1>Registro</H1>
            <div class="contenedor-progreso">
                <div class="progreso">
                </div>
                <ol>
                    <li class="dn">Direccion</li>
                    <li class="ds">Dueño(s)</li>
                    <li class="ms">Mascotas</li>
                </ol>
            </div>

            <div class="pasos-contenedor">
                <div class="step">
                    <h3>
                        Direccion
                    </h3>
                    <form>
                        <label class="label-purple">Ciudad</label>
                        <input type="text" class="form-control" placeholder="Agregar texto" required>
                        <label for="colonia">Colonia</label>
                        <select id="Especie" name="Especie"  class="form-control" required>
                            <option value="*">
                                Selecciona especie...
                            </option>
                            <option value="centro">
                                Centro
                            </option>
                            <option value="pueblonuevo">
                                Pueblo Nuevo
                            </option>
                            <option value="infonavitsanmartin">
                                Infonavit San Martín
                            </option>
                            <option value="infonavitguaycura">
                                Infonavit Guaycura
                            </option>
                            <option value="pioneros">
                                Pioneros
                            </option>
                            <option value="pionerosII">
                                Pioneros II
                            </option>
                            <option value="universidad">
                                Universidad
                            </option>
                            <option value="magisterial">
                                Magisterial
                            </option>
                            <option value="esperanza">
                                Esperanza
                            </option>
                            <option value="4demarzo">
                                4 de Marzo
                            </option>
                            <option value="ladrillera">
                                Ladrillera
                            </option>
                            <option value="lienzocharro">
                                Lienzo Charro
                            </option>
                            <option value="juandominguezcota">
                                Juan Dominguez Cota
                            </option>
                            <option value="agricultorINDECO">
                                Agricultor INDECO
                            </option>
                        </select>
                        <label class="label-purple">Calle principal</label>
                        <input type="text" class="form-control" placeholder="Agregar texto" required>
                        <label class="label-purple">Calle adyacente</label>
                        <input type="text" class="form-control" placeholder="Agregar texto" required>
                        <label class="label-purple">Numero externo</label>
                        <input type="text" class="form-control" placeholder="Agregar texto">
                        <label class="label-purple">Numero interno</label>
                        <input type="text" class="form-control" placeholder="Agregar texto">
                        <label class="label-purple">Codigo postal</label>
                        <input type="text" class="form-control" placeholder="Agregar texto">
                    </form>
                </div>
                <div class="step">
                    <h3>
                        Dueño(s)
                    </h3>
                    <label class="label-purple">Nombre</label>
                    <input type="text" class="form-control" placeholder="Agregar texto">
                    <label class="label-purple">Apellido paterno</label>
                    <input type="text" class="form-control" placeholder="Agregar texto">
                    <label class="label-purple">Apellido materno</label>
                    <input type="text" class="form-control" placeholder="Agregar texto">
                    <label class="label-purple">CURP</label>
                    <input type="text" class="form-control" placeholder="Agregar texto">
                    <label class="label-purple">Telefono</label>
                    <input type="text" class="form-control" placeholder="Agregar texto">
                </div>
                <div class="step">
                    <h3>
                        Mascotas
                    </h3>
                    <label class="label-purple">Nombre del animal</label>
                    <input type="text" class="form-control" placeholder="Agregar texto" required>
                    <label class="label-purple">Especie</label>
                    <select id="Especie" name="Especie" class="form-control" require>
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
                    </select>
                    <label class="label-purple">Raza</label>   
                    <!--RAZAS estan pendientes hasta la base de datos-->
                    <!--INVESTIGAR SI LAS RAZAS SE PUEDEN JALAR DE LA BASE DE DATOS-->
                    <select id="Especie" name="Especie" class="form-control" required>
                        <option value="*">
                            Selecciona especie...
                        </option>
                    </select>      
                    <label class="label-purple">Peso</label>
                    <input type="text" class="form-control" placeholder="Agregar texto" required>
                    <label class="label-purple">Color</label>
                    <input type="text" class="form-control" placeholder="Agregar texto" required>
                    <label class="label-purple h-100">Sexo</label>
                    <div class="">
                        <label class="label-purple">Macho</label>
                        <input type="radio" id="Sexo" name="Sexo" value="Macho" class="form-check" required>
                        <label class="label-purple">Hembra</label>
                        <input type="radio" id="Sexo" name="Sexo" value="Hembra" class="form-check" required>
                    </div>
                </div>
            </div>
            <div class="control">
                <button type="button" class="anterior">
                    Anterior
                </button>
                <button type="button" class="siguiente">
                    Siguiente
                </button>
                <button type="submit" class="completar">
                    Completar
                </button>
            </div>
        </form>
    </div>
    <div class="PIMarcaDeAgua">
        <img src="../imagenes/ImagenEquipoNF.png">
    </div>
</body>

</html>