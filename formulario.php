<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Formulario</title>
</head>
<body class="overflow-x-hidden">

    <div class="container col-12" style="padding-left: 0px; padding-right: 0px;">
        <div class="row col-12" style="padding-left: 0px; padding-right: 0px; margin-left: 0px; margin-left: 0px; background-color: #1a1a1a;">

            <!-- NAVBAR -->
            <div class="col-lg-2 col-md-12 col-sm-12 w-100" style="padding-left: 0px; padding-right: 0px; background-color: #F1E71E;">
                <nav class="navbar navbar-expand-lg navbar-light nav-bar-J">
                    <div class="container-fluid" style="margin-left: 0px; margin-right: 0px; padding: 0px">
                        <a class="navbar-brand" href="#"><i class="bi bi-building-fill"></i> Espacio Urbano</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar-D" aria-controls="navBar-D" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navBar-D">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">
                                        <i class="bi bi-house-door-fill"></i>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#espacios">
                                        <i class="bi bi-bank"></i>
                                        <span>Espacios</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#edificios">
                                        <i class="bi bi-buildings-fill"></i>
                                        <span>Edificios</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#personajes">
                                        <i class="bi bi-people-fill"></i>
                                        <span>Personajes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#imagenes">
                                        <i class="bi bi-image-fill"></i>
                                        <span>Imagenes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#personObras">
                                        <i class="bi bi-link-45deg"></i>
                                        <span>Asociar</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contacto">
                                        <i class="bi bi-search-heart"></i>
                                        <span>Contacto</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Contenedor del lado derecho de la barra y normal en pantalla md y sm -->
            <div class="col-lg-10 col-md-12 col-sm-12" style="background-color: #1a1a1a; padding-left: 0px; padding-right: 0px; margin: auto; display: flex; flex-direction: column; align-items: center;  border-radius: 20px;">
            
                <div class="" style="padding-left: 0px; padding-right: 0px; margin: 0px; display: flex; flex-direction: column; align-items: center; border-radius: 20px; width: 100%; background-color: #fff;">

                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                        <div class="main-image" id="top"></div>
                    </div>

                    <div class="divider"></div>

                    <!-- AÑADIR ESPACIOS URBANOS -->
                    <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="espacios">
                        <div class="container-section shadow">
                            <h2>Añadir Espacio Urbano</h2>
                            <div class="divider"></div>
                            <form action="backend/subir_espacio.php" method="POST" enctype="multipart/form-data" id="formularioEspacio">
                                Nombre:* <input class="form-control" type="text" name="nombreEU" placeholder="Nombre del espacio urbano..."> <br>

                                <!-- <div class="divider"></div> -->

                                <label for="imagenEspacio">Seleccione la imagen principal:*</label> <br>
                                <input class="upload-box" type="file" id="imagenEspacio" name="imagenEspacio"> <br>

                                <div class="divider"></div>

                                Periodo de Construcción:* <br>
                                <textarea class="form-control" id="periodoConstruc" name="periodoConstruc" rows="1" placeholder="Inserte periodo aquí..."></textarea> <br>

                                Función:* <br>
                                <textarea class="form-control" id="funcion" name="funcion" rows="5" placeholder="Inserte texto aquí..."></textarea> <br>

                                <!-- <div class="divider"></div> -->

                                <div class="sub-container">
                                    <h3>Ubicación</h3>
                                    <br>
                                    URL dirección en Google Maps:* <input class="form-control" type="text" name="urlUbiEU"> <br>
                                    Calle: <input class="form-control" placeholder="Calle y número..." type="text" id="calleEU" name="calleEU"> <br>
                                    Estado:*
                                        <select class="form-control" name='estadosEU' onchange='getMunicipiosEU(this.value)'>
                                            <option value="">Seleccione una opción.</option>
                                            <?php 
                                                require 'backend/conexion.php';

                                                $estados = mysqli_query($conexion, "SELECT nukidestado, chd_estado FROM estado");

                                                if (mysqli_num_rows($estados) > 0) {
                                                    while ($fila = mysqli_fetch_assoc($estados)) {
                                                    echo "<option value='" . $fila["nukidestado"] . "'>" . $fila["chd_estado"] ."</option>";}
                                                }
                                                else {
                                                    echo "Error con la conexión.";
                                                }
                                            ?>
                                        </select> <br>
                                    Municipio:*
                                    <select class="form-control" name='municipiosEU' onchange='getColoniasEU(this.value)' id='municipiosEU'>
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    Colonia:*
                                    <select class="form-control" name="coloniasEU" id="coloniasEU">
                                        <option value="">Seleccione una opción.</option>
                                    </select>
                                </div>

                                Contexto Histórico:* <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="contextoEU" name="contextoEU" rows="5"></textarea> <br>

                                <div class="sub-container">
                                    <h3>Descripcion del proyecto original</h3>
                                    Plan Urbanistico: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="plan" name="plan" rows="5"></textarea> <br>
                                    Características: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="caracteristicas" name="caracteristicas" rows="5"></textarea> <br>
                                    Orientación: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="orientacion" name="orientacion" rows="5"></textarea> <br>
                                    Dimensiones: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="dimensiones" name="dimensiones" rows="5"></textarea> <br>
                                    Secciones: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="secciones" name="secciones" rows="5"></textarea> <br>
                                    Elementos de la imagen urbana: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="elementos" name="elementos" rows="5"></textarea> <br>
                                    Tipos de edificaciones que rodean el espacio urbano: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="tiposEdif" name="tiposEdif" rows="5"></textarea>
                                </div>

                                Transformaciones del espacio:* <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="transformEU" name="transformEU" rows="5"></textarea> <br>

                                Principios del diseño:* <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="principiosDis" name="principiosDis" rows="5"></textarea> <br>

                                Importancia del espacio urbano: <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="importancia" name="importancia" rows="5"></textarea> <br>
                                
                                <div class="divider"></div>
                                <div class="divider"></div>

                                <input class="btn btn-primary" type="submit" name="subirEspacio" value="Subir Espacio Urbano">
                                <div class="divider"></div>
                            </form>
                            
                            <!-- <button class="btn-expandir" id="btnExpandir">
                                <i class="bi bi-arrow-bar-down"></i>
                            </button> -->

                        </div>

                    </div>

                    <!-- AÑADIR EDIFICIOS -->
                    <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="edificios">
                        <div class="container-section shadow">
                            <h2>Añadir Edificación</h2>
                            <div class="divider"></div>
                            <form action="backend/subir_edificio.php" method="POST" enctype="multipart/form-data">
                                Nombre:* <input class="form-control" placeholder="Nombre del edificio..." type="text" name="nombre"> <br>

                                <label for="imagenEdif">Seleccione la imagen principal:*</label> <br>
                                <input class="upload-box" type="file" id="imagenEdif" name="imagenEdif"> <br>

                                <div class="divider"></div>
                                Genero Edificio:* <br>

                                <select class="form-select form-control" name='generos'>
                                    <option value="">Seleccione una opción.</option>
                                    <?php 
                                        require 'backend/conexion.php';

                                        $generos = mysqli_query($conexion, "SELECT idGenero, nombreGenero FROM generos");

                                        if (mysqli_num_rows($generos) > 0) {
                                            while ($fila = mysqli_fetch_assoc($generos)) {
                                            echo "<option value='" . $fila["idGenero"] . "'>" . $fila["nombreGenero"] ."</option>";}
                                        }
                                        else {
                                            echo "Error con la conexión.";
                                        }
                                    ?>
                                </select>

                                <div class="divider"></div>

                                Uso Actual: <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="usoActual" name="usoActual" rows="5" placeholder="Introduzca texto aquí..."></textarea> <br>

                                Fecha de Construcción: <textarea class="form-control" placeholder="Inserte periodo aquí..." name="fechaConstruc" id="fechaConstruc" rows="1"></textarea> <br>

                                <div class="divider"></div>
                                
                                <!-- Arquitecto(s) o Ingeniero(s): <br> -->
                                <!-- <select name='arquitectos'>
                                    <option value="">Seleccione una opción.</option>
                                    <?php 
                                        // require 'backend/conexion.php';
                                        // $arquis = mysqli_query($conexion, "SELECT idPersonaje, nomPer, apellido FROM personaje");
                                        // if (mysqli_num_rows($arquis) > 0) {
                                        //     while ($fila = mysqli_fetch_assoc($arquis)) {
                                        //     echo "<option value='" . $fila["idPersonaje"] . "'>" . $fila["nomPer"] .' '. $fila["apellido"] . "</option>";}
                                        // }
                                        // else {
                                        //     echo "Error con la conexión.";
                                        // }
                                    ?>
                                </select> <br>
                                <button id="botonAgregarSelect">Agregar Personaje.</button> <br>
                                <div id="contenedorSelect"></div> -->
                                <!-- SECCION ELIMINADA PORQUE SE ASOCIARÁN LOS PERSONAJES EN OTRO APARTADO -->

                                <div class="sub-container">
                                    <h3>Ubicación</h3>
                                    <br>
                                    URL dirección en Google Maps:* <input class="form-control" type="text" name="urlUbi"> <br>
                                    Calle:* <input class="form-control" placeholder="Calle y número..." type="text" name="calle"> <br>
                                    Estado:*
                                    <select class="form-control" name='estados' onchange='getMunicipios(this.value)'>
                                        <option value="">Seleccione una opción.</option>
                                        <?php 
                                            require 'backend/conexion.php';

                                            $estados = mysqli_query($conexion, "SELECT nukidestado, chd_estado FROM estado");

                                            if (mysqli_num_rows($estados) > 0) {
                                                while ($fila = mysqli_fetch_assoc($estados)) {
                                                echo "<option value='" . $fila["nukidestado"] . "'>" . $fila["chd_estado"] ."</option>";}
                                            }
                                            else {
                                                echo "Error con la conexión.";
                                            }
                                        ?>
                                    </select> <br>
                                    Municipio:*
                                    <select class="form-control" name='municipios' onchange='getColonias(this.value)' id='municipios'>
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    Colonia:*
                                    <select class="form-control" name="colonias" id="colonias">
                                        <option value="">Seleccione una opción.</option>
                                    </select>
                                </div>

                                Contexto Histórico:* <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="contexto" name="contexto" rows="5"></textarea> <br>

                                <div class="sub-container">
                                    <h3>Descripcion del Edificio</h3>
                                    Concepto: <br>
                                    <textarea class="form-control" placeholder="Inserte texto aquí..." id="concepto" name="concepto" rows="5"></textarea>
                                </div>

                                Corriente Estilística: <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="corrienteEst" name="corrienteEst" rows="5"></textarea> <br>

                                Materiales y Sistema: <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="matYSist" name="matYSist" rows="5"></textarea> <br>

                                Contexto Urbano: <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="contextUrb" name="contextUrb" rows="5"></textarea> <br>

                                Transformaciones del espacio: <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="transform" name="transform" rows="5"></textarea> <br>
                                <div class="divider"></div>
                                <div class="divider"></div>

                                <input class="btn btn-primary" type="submit" name="subirEdif" value="Subir Edificación">

                                <div class="divider"></div>
                            </form>
                        </div>
                    </div>
                    <!--  -->
                    
                    <!-- AÑADIR PERSONAJES -->
                    <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="personajes">
                        <div class="container-section shadow">
                            <h2>Añadir Arquitecto o Ingeniero</h2>
                            <div class="divider"></div>
                            <form action="backend/subir_personaje.php" method="POST" enctype="multipart/form-data">

                                Nombre:* <input class="form-control" type="text" name="nombre"> <br>
                                Primer Apellido:* <input class="form-control" type="text" name="apellido1"> <br>
                                Segundo Apellido: <input class="form-control" type="text" name="apellido2">
                                <div class="divider"></div>

                                <label for="imagenPersonaje">Seleccione la imagen principal:*</label> <br>
                                <input class="upload-box" type="file" id="imagenPersonaje" name="imagenPersonaje"> <br>
                                <div class="divider"></div>

                                Fecha de Nacimiento: <input class="form-control" type="date" name="nacimiento"> <br>
                                País de Origen:*
                                <select class="form-control" name='paises'>
                                    <option value="">Seleccione una opción.</option>
                                    <?php 
                                        require 'backend/conexion.php';

                                        $paises = mysqli_query($conexion, "SELECT idPais, nombre FROM pais");

                                        if (mysqli_num_rows($paises) > 0) {
                                            while ($fila = mysqli_fetch_assoc($paises)) {
                                            echo "<option value='" . $fila["idPais"] . "'>" . $fila["nombre"] . "</option>";}
                                        }
                                        else {
                                            echo "Error con la conexión.";
                                        }
                                    ?>
                                </select>
                                <div class="divider"></div>

                                Información:* <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." id="informacion" name="informacion" rows="5"></textarea> <br>

                                Principales obras: <br>
                                <textarea class="form-control" placeholder="Inserte texto aquí..." name="obras" id="obras" cols="50" rows="5"></textarea> <br>

                                <div class="divider"></div>
                                <div class="divider"></div>
                                <input class="btn btn-primary" type="submit" name="subirArqui" value="Subir Personaje">
                                <div class="divider"></div>

                            </form>
                        </div>
                    </div>

                    <!-- AÑADIR IMAGENES -->
                    <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="imagenes">
                        <div class="container-section shadow">
                            <h2>Subir Imagenes</h2> <br>
                            <div id="formularios">
                                <button class="btn btn-primary" type="button" onclick="subirImagenes()">Subir todas las imágenes</button> <br>
                                <div class="divider"></div>

                                <form action="subir_imagenes.php" method="post" enctype="multipart/form-data" id="subirImagen">
                                    <label for="imagen">Seleccione una imagen:*</label>
                                    <input class="upload-box" type="file" id="imagen" name="imagen"> <br> <br>
                                    Tipo:*
                                    <select class="form-control" name="campoImagen" id="campoImagen" class="campoImagen">
                                        <option value="">Selecione una opción.</option>
                                        <option value="1">Edificio</option>
                                        <option value="2">Espacio Urbano</option>
                                        <!-- <option value="3">Biografía</option> -->
                                    </select> <br>
                                    Obra:*
                                    <select class="form-control" name="chus" id="chus" class="chus">
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    Sección:*
                                    <select class="form-control" name="seccionObra" id="seccionObra" class="seccionObra">
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    <br> <br>
                                </form>
                            </div>
                            <button class="btn btn-primary" id="btnClonar">Añadir campos</button>
                        </div>
                    </div>

                    <!-- ASOCIAR PERSONAJES CON OBRAS -->
                    <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="asociar">
                        <div class="container-section shadow">
                            <h2>Asociar personajes con obras</h2>
                            <div class="divider"></div>
                            <div id="personObras">
                                <button class="btn btn-primary" type="button" onclick="asociarPer()">Asociar personajes</button> <br>
                                <div class="divider"></div>
                                <form method="post" id="asociarPer">
                                    Personaje:
                                    <select name="personajeChus" id="personajeChus" class="form-control personajeChus">
                                        <?php 
                                            include("backend/get_Biografias.php");
                                        ?>
                                    </select> <br>
                                    Edificación:
                                    <select name="edificioChus" id="edificioChus" class="form-control edificioChus">
                                        <?php 
                                            include("backend/get_Edificios.php");
                                        ?>
                                    </select> <br>
                                    Espacio Urbano:
                                    <select name="espacioChus" id="espacioChus" class="form-control espacioChus">
                                        <?php 
                                            include("backend/get_Espacios.php");
                                        ?>
                                    </select> <br>
                                    <br> <br>
                                </form>
                            </div>
                            <button class="btn btn-primary" id="btnClonarAsoc">Añadir campos</button>
                        </div>
                    </div>

                    <div class="divider"></div>

                </div>

                <div class="container col-lg-12 col-md-12 col-sm-12 seccion_Pag" style="background-color: #1A1A1A; margin: 0px;" id="contacto">
                <!-- <div class="footer footer-J col-10-lg col-md-12 col-sm-12">
                    <a href="login.php">Login</a>
                </div> -->
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <a href="login.php" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                            <i class="bi bi-buildings"></i>
                            <span class="" style="color: #fff;">Espacio Arquitectónico y Urbano del Siglo XIX y Principios del Siglo XX - Arquitectura FES Acatlán</span>
                        </a>

                        <br>
                    </div>

                    <div class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <a href="" style="color: #F1E71E; padding-right: 10px;"><i class="bi bi-twitter" style="font-size: 30px;"></i></a>
                        <a href="" style="color: #F1E71E; padding-right: 10px;"><i class="bi bi-instagram" style="font-size: 30px;"></i></a>
                        <a href="" style="color: #F1E71E; padding-right: 10px;"><i class="bi bi-facebook" style="font-size: 30px;"></i></a>
                    </div>
                </footer>
            </div>
            </div>

        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/scroll-active.js"></script>

    <script>
        function getMunicipios(estadoId) {
            // crea una instancia del objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // configura la solicitud AJAX
            xhr.open('GET', 'backend/get_municipios.php?estado_id=' + estadoId, true);

            // define la función que se llamará cuando la solicitud AJAX se complete
            xhr.onload = function() {
                // comprueba si la solicitud AJAX se realizó correctamente
                if (this.status == 200) {
                    // actualiza el select de municipios con los datos obtenidos
                    document.getElementById('municipios').innerHTML = this.responseText;
                }
            };

            // envía la solicitud AJAX
            xhr.send();
        }

        function getMunicipiosEU(estadoId) {
            // crea una instancia del objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // configura la solicitud AJAX
            xhr.open('GET', 'backend/get_municipios.php?estado_id=' + estadoId, true);

            // define la función que se llamará cuando la solicitud AJAX se complete
            xhr.onload = function() {
                // comprueba si la solicitud AJAX se realizó correctamente
                if (this.status == 200) {
                    // actualiza el select de municipios con los datos obtenidos
                    document.getElementById('municipiosEU').innerHTML = this.responseText;
                }
            };

            // envía la solicitud AJAX
            xhr.send();
        }

        function getColonias(municipioId) {
            // crea una instancia del objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // configura la solicitud AJAX
            xhr.open('GET', 'backend/get_colonias.php?municipio_id=' + municipioId, true);

            // define la función que se llamará cuando la solicitud AJAX se complete
            xhr.onload = function() {
                // comprueba si la solicitud AJAX se realizó correctamente
                if (this.status == 200) {
                    // actualiza el select de municipios con los datos obtenidos
                    document.getElementById('colonias').innerHTML = this.responseText;
                }
            };

            // envía la solicitud AJAX
            xhr.send();
        }

        function getColoniasEU(municipioId) {
            // crea una instancia del objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // configura la solicitud AJAX
            xhr.open('GET', 'backend/get_colonias.php?municipio_id=' + municipioId, true);

            // define la función que se llamará cuando la solicitud AJAX se complete
            xhr.onload = function() {
                // comprueba si la solicitud AJAX se realizó correctamente
                if (this.status == 200) {
                    // actualiza el select de municipios con los datos obtenidos
                    document.getElementById('coloniasEU').innerHTML = this.responseText;
                }
            };

            // envía la solicitud AJAX
            xhr.send();
        }

        $(document).ready(function() {
            let contador = 0;
            let contadorAsoc = 0;

            $(document).on('change', '#campoImagen', function() {
                // Encontrar la barra de navegación
                var navBar = $('nav');

                // Encontrar todos los enlaces de la barra de navegación
                var navLinks = navBar.find('a');

                // Agregar un controlador de eventos de clic a cada enlace de navegación
                navLinks.click(function() {
                    // Eliminar la clase "active" de todos los enlaces de navegación
                    navLinks.parent().removeClass('active');

                    // Agregar la clase "active" al enlace de navegación que se hizo clic
                    $(this).parent().addClass('active');
                });

                var valor = $(this).val();
                switch(valor) {
                case '1':
                    $.get('backend/get_Edificios.php', function(data) {
                    $('#chus').html(data);
                    });
                    $('#seccionObra').html('<option value="">Seleccione una opción.</option><option value="1">Plantas arquitectónicas</option><option value="2">Fachadas y ornamentos</option><option value="3">Corriente estilística</option><option value="4">Materiales y sistemas</option><option value="5">Contexto urbano</option><option value="6">Transformaciones</option>');
                    break;
                case '2':
                    $.get('backend/get_Espacios.php', function(data) {
                    $('#chus').html(data);
                    });
                    $('#seccionObra').html('<option value="">Seleccione una opción.</option><option value="1">Características particulares</option><option value="2">Orientación</option><option value="3">Dimensiones</option><option value="4">Secciones</option><option value="5">Elementos de la imagen urbana</option><option value="6">Tipos de edificaciones que la rodean</option><option value="7">Transformaciones</option><option value="8">Principios de diseño</option>');
                    break;
                // case '3':
                //     $.get('backend/get_Biografias.php', function(data) {
                //     $('#chus').html(data);
                //     });
                //     break;
                default:
                    $('#chus').html('<option value="">Seleccione una opción.</option>');
                    $('#seccionObra').html('<option value="">Seleccione una opción.</option>');
                    break;
                }
            });

            $('#btnClonar').click(function() {
                contador++;
                let formulario = `
                    <form action="subir_imagenes.php" method="post" enctype="multipart/form-data" id="subirImagen${contador}">
                        <label for="imagen${contador}">Seleccione una imagen:*</label>
                        <input class="upload-box" type="file" id="imagen${contador}" name="imagen${contador}"> <br> <br>
                        Tipo:*
                        <select name="campoImagen${contador}" id="campoImagen${contador}" class="form-control campoImagen">
                            <option value="">Selecione una opción.</option>
                            <option value="1">Edificio</option>
                            <option value="2">Espacio Urbano</option>
                        </select> <br>
                        Obra:*
                        <select name="chus${contador}" id="chus${contador}" class="form-control chus">
                            <option value="">Seleccione una opción.</option>
                        </select> <br>
                        Sección:*
                        <select name="seccionObra${contador}" id="seccionObra${contador}" class="form-control seccionObra">
                            <option value="">Seleccione una opción.</option>
                        </select> <br>
                        <br> <br>
                    </form>
                `;
                $('#formularios').append(formulario);
            });

            $('#btnClonarAsoc').click(function() {
                contadorAsoc++;
                let formularioAsoc = `
                    <form action="asociar_Personajes.php" method="post" id="asociarPer${contadorAsoc}">
                        Personaje:*
                        <select name="personajeChus" id="personajeChus${contadorAsoc}" class="form-control personajeChus">
                            <?php 
                                include("backend/get_Biografias.php");
                            ?>
                        </select> <br>
                        Edificación:
                        <select name="edificioChus" id="edificioChus${contadorAsoc}" class="form-control edificioChus">
                            <?php 
                                include("backend/get_Edificios.php");
                            ?>
                        </select> <br>
                        Espacio Urbano:
                        <select name="espacioChus" id="espacioChus${contadorAsoc}" class="form-control espacioChus">
                            <?php 
                                include("backend/get_Espacios.php");
                            ?>
                        </select> <br>
                        <br> <br>
                        </form>
                `;
                $('#personObras').append(formularioAsoc);
            });

            $('#formularios').on('change', '.campoImagen', function() {
                let valor = $(this).val();
                let form = $(this).closest('form');

                switch(valor) {
                    case '1':
                        $.get('backend/get_Edificios.php', function(data) {
                            form.find('.chus').html(data);
                        });
                        form.find('.seccionObra').html('<option value="">Seleccione una opción.</option><option value="1">Plantas arquitectónicas</option><option value="2">Fachadas y ornamentos</option><option value="3">Corriente estilística</option><option value="4">Materiales y sistemas</option><option value="5">Contexto urbano</option><option value="6">Transformaciones</option>');
                        break;
                    case '2':
                        $.get('backend/get_Espacios.php', function(data) {
                            form.find('.chus').html(data);
                        });
                        form.find('.seccionObra').html('<option value="">Seleccione una opción.</option><option value="1">Características particulares</option><option value="2">Orientación</option><option value="3">Dimensiones</option><option value="4">Secciones</option><option value="5">Elementos de la imagen urbana</option><option value="6">Tipos de edificaciones que la rodean</option><option value="7">Transformaciones</option><option value="8">Principios de diseño</option>');
                        break;
                    default:
                        form.find('.chus').html('<option value="">Seleccione una opción.</option>');
                        form.find('.seccionObra').html('<option value="">Seleccione una opción.</option>');
                        break;
                }
            });
        });

        function subirImagenes() {
            // Obtener todos los formularios dentro del div con id "formularios"
            var formularios = document.querySelectorAll('#formularios form[id*="subirImagen"]');
            // Crear un array para almacenar todas las promesas generadas al enviar los formularios
            var promesasEnvio = [];

            // Iterar sobre cada formulario
            formularios.forEach(function(formulario) {
                // Obtener los datos del formulario
                var imagen = formulario.querySelector('input[type="file"]').files[0];
                var campoImagen = formulario.querySelector('.campoImagen').value;
                var chus = formulario.querySelector('.chus').value;
                var seccionObra = formulario.querySelector('.seccionObra').value;

                // Comprobar si alguno de los campos está vacío
                if (!imagen || !campoImagen || !chus || !seccionObra) {
                    alert("¡Existen Campos Vacíos! Por favor, complete todos los campos.");
                    window.location= "formulario.php";
                    exit();
                }

                
                // Crear un objeto FormData para enviar los datos al servidor
                var formData = new FormData();
                formData.append('imagen', imagen);
                formData.append('campoImagen', campoImagen);
                formData.append('chus', chus);
                formData.append('seccionObra', seccionObra);

                console.log(formData);
                
                // Realizar una solicitud HTTP mediante fetch() para enviar los datos al servidor
                var promesaEnvio = fetch('backend/subir_imagenes.php', {
                    method: 'POST',
                    body: formData
                })
                .then(function(response) {
                    // Manejar la respuesta del servidor si es necesario
                    console.log(response);
                })
                .catch(function(error) {
                    // Manejar cualquier error que ocurra
                    alert("Intentelo de nuevo");
                });

                // Agregar la promesa al array de promesas
                promesasEnvio.push(promesaEnvio);
            });

            // Esperar a que se resuelvan todas las promesas antes de mostrar el mensaje de éxito
            Promise.all(promesasEnvio)
            .then(function() {
                alert('Todas las imágenes se subieron correctamente.');
                window.location= "formulario.php";
            })
            .catch(function(error) {
                alert('Error al subir las imágenes.');
                window.location= "formulario.php"
            });
        }

        function asociarPer() {
            // Obtener todos los formularios dentro del div con id "formularios"
            var formulariosAsoc = document.querySelectorAll('#personObras form[id*="asociarPer"]');
            // Crear un array para almacenar todas las promesas generadas al enviar los formulariosAsoc
            var promesasEnvioAsoc = [];

            // Iterar sobre cada formulario
            formulariosAsoc.forEach(function(formulario) {
                // Obtener los datos del formulario
                var personajeChus = formulario.querySelector('.personajeChus').value;
                var edificioChus = formulario.querySelector('.edificioChus').value;
                var espacioChus = formulario.querySelector('.espacioChus').value;

                // Comprobar si alguno de los campos está vacío
                if (!personajeChus || (!edificioChus && !espacioChus)) {
                    alert("¡Existen Campos Vacíos! Por favor, complete todos los campos.");
                    window.location= "formulario.php";
                    exit();
                }

                // Crear un objeto FormData para enviar los datos al servidor
                var formDataAsoc = new FormData();
                formDataAsoc.append('personajeChus', personajeChus);
                formDataAsoc.append('edificioChus', edificioChus);
                formDataAsoc.append('espacioChus', espacioChus);
                
                // Realizar una solicitud HTTP mediante fetch() para enviar los datos al servidor
                var promesaEnvioAsoc = fetch('backend/asociar_Personajes.php', {
                    method: 'POST',
                    body: formDataAsoc
                })
                .then(function(response) {
                    // Manejar la respuesta del servidor si es necesario
                    console.log(response);
                })
                .catch(function(error) {
                    // Manejar cualquier error que ocurra
                    alert("Intentelo de nuevo");
                });

                // Agregar la promesa al array de promesas
                promesasEnvioAsoc.push(promesaEnvioAsoc);
            });

            // Esperar a que se resuelvan todas las promesas antes de mostrar el mensaje de éxito
            Promise.all(promesasEnvioAsoc)
            .then(function() {
                alert('¡Todas las obras se asociaron de forma satisfactoria!');
                window.location= "formulario.php";
            })
            .catch(function(error) {
                alert('Error al asociar obras.');
                window.location= "formulario.php"
            });
        }
    </script>
</body>
</html>