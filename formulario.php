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
        <div class="row col-12" style="padding-left: 0px; padding-right: 0px; margin-left: 0px; margin-left: 0px; background-color: #494d7e;">

            <!-- NAVBAR -->
            <div class="col-lg-2 col-md-12 col-sm-12 w-100" style="padding-left: 0px; padding-right: 0px; background-color: #494d7e;">
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
                                    <a class="nav-link" href="#info">
                                        <i class="bi bi-info-circle-fill"></i>
                                        <span>Información</span>
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
                                    <a class="nav-link" href="#biografias">
                                        <i class="bi bi-people-fill"></i>
                                        <span>Biografías</span>
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
            <div class="col-lg-10 col-md-12 col-sm-12" style="padding-left: 0px; padding-right: 0px; margin: auto; display: flex; flex-direction: column; align-items: center;  border-radius: 20px;">
                <div class="" style="padding-left: 0px; padding-right: 0px; margin: 0px; display: flex; flex-direction: column; align-items: center; border-radius: 20px; width: 100%; background-color: #eef3fb;">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                        <div class="main-image" id="top"></div>
                    </div>

                    <div class="col-lg-10 col-md-12 col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                        <!-- AÑADIR ESPACIOS URBANOS -->
                        <div class="container-section">
                            <h2>Añadir Espacio Urbano</h2>
                            <form action="backend/subir_espacio.php" method="POST" enctype="multipart/form-data">
                                Nombre:* <input type="text" name="nombreEU"> <br>

                                <label for="imagenEspacio">Seleccione la imagen principal:*</label> <br>
                                <input type="file" id="imagenEspacio" name="imagenEspacio"> <br>

                                Periodo de Construcción:* <br>
                                <textarea id="periodoConstruc" name="periodoConstruc" rows="5" cols="50" placeholder="Inserte texto aquí..."></textarea> <br>

                                Función:* <br>
                                <textarea id="funcion" name="funcion" rows="5" cols="50" placeholder="Inserte texto aquí..."></textarea> <br>

                                <div class="container" style="background-color: cornsilk;">
                                    <h3>Ubicación:</h3>
                                    URL dirección en Google Maps:* <input type="text" name="urlUbiEU"> <br>
                                    Calle:* <input type="text" name="calleEU"> <br>
                                    Estado:*
                                        <select name='estadosEU' onchange='getMunicipiosEU(this.value)'>
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
                                    <select name='municipiosEU' onchange='getColoniasEU(this.value)' id='municipiosEU'>
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    Colonia:*
                                    <select name="coloniasEU" id="coloniasEU">
                                        <option value="">Seleccione una opción.</option>
                                    </select>
                                </div>

                                Contexto Histórico:* <br>
                                <textarea id="contextoEU" name="contextoEU" rows="5" cols="50"></textarea> <br>

                                <div class="container" style="background-color: cornsilk;">
                                    <h3>Descripcion del proyecto original:</h3>
                                    Plan Urbanistico: <br>
                                    <textarea id="plan" name="plan" rows="5" cols="50"></textarea> <br>
                                    Características: <br>
                                    <textarea id="caracteristicas" name="caracteristicas" rows="5" cols="50"></textarea> <br>
                                    Orientación: <br>
                                    <textarea id="orientacion" name="orientacion" rows="5" cols="50"></textarea> <br>
                                    Dimensiones: <br>
                                    <textarea id="dimensiones" name="dimensiones" rows="5" cols="50"></textarea> <br>
                                    Secciones: <br>
                                    <textarea id="secciones" name="secciones" rows="5" cols="50"></textarea> <br>
                                    Elementos de la imagen urbana: <br>
                                    <textarea id="elementos" name="elementos" rows="5" cols="50"></textarea> <br>
                                    Tipos de edificaciones que rodean el espacio urbano: <br>
                                    <textarea id="tiposEdif" name="tiposEdif" rows="5" cols="50"></textarea> <br>
                                </div>

                                Transformaciones del espacio:* <br>
                                <textarea id="transformEU" name="transformEU" rows="5" cols="50"></textarea> <br>

                                Principios del diseño:* <br>
                                <textarea id="principiosDis" name="principiosDis" rows="5" cols="50"></textarea> <br>

                                Importancia del espacio urbano: <br>
                                <textarea id="importancia" name="importancia" rows="5" cols="50"></textarea> <br>

                                <input class="btn btn-primary" type="submit" name="subirEspacio" value="Subir Espacio Urbano">
                            </form>
                        </div>

                        <!-- AÑADIR EDIFICIOS -->
                        <div class="container-section">
                            <h2>Añadir Edificación</h2>
                            <form action="backend/subir_edificio.php" method="POST" enctype="multipart/form-data">
                                Nombre:* <input type="text" name="nombre"> <br>

                                <label for="imagenEdif">Seleccione la imagen principal:*</label> <br>
                                <input type="file" id="imagenEdif" name="imagenEdif"> <br>
                                Genero Edificio:* <br>

                                <select class="form-select" name='generos'>
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
                                </select> <br>
                                Uso Actual: <br>
                                <textarea id="usoActual" name="usoActual" rows="5" cols="50" placeholder="Introduzca texto aquí..."></textarea> <br>
                                Fecha de Construcción: <input type="date" 
                                name="fechaConstruc"> <br>
                                
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

                                <div class="container" style="background-color: cornsilk;">
                                    <h3>Ubicación:</h3>
                                    URL dirección en Google Maps:* <input type="text" name="urlUbi"> <br>
                                    Calle:* <input type="text" name="calle"> <br>
                                    Estado:*
                                    <select name='estados' onchange='getMunicipios(this.value)'>
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
                                    <select name='municipios' onchange='getColonias(this.value)' id='municipios'>
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    Colonia:*
                                    <select name="colonias" id="colonias">
                                        <option value="">Seleccione una opción.</option>
                                    </select>
                                </div>

                                Contexto Histórico:* <br>
                                <textarea id="contexto" name="contexto" rows="5" cols="50"></textarea> <br>

                                <div class="container" style="background-color: cornsilk;">
                                    <h3>Descripcion del Edificio</h3>
                                    Concepto: <br>
                                    <textarea id="concepto" name="concepto" rows="5" cols="50"></textarea> <br>
                                </div>

                                Corriente Estilística: <br>
                                <textarea id="corrienteEst" name="corrienteEst" rows="5" cols="50"></textarea> <br>

                                Materiales y Sistema: <br>
                                <textarea id="matYSist" name="matYSist" rows="5" cols="50"></textarea> <br>

                                Contexto Urbano: <br>
                                <textarea id="contextUrb" name="contextUrb" rows="5" cols="50"></textarea> <br>

                                Transformaciones del espacio: <br>
                                <textarea id="transform" name="transform" rows="5" cols="50"></textarea> <br>

                                <input class="btn btn-primary" type="submit" name="subirEdif" value="Subir Edificación">
                            </form>
                        </div>
                        <!--  -->

                        <!-- AÑADIR PERSONAJES -->
                        <div class="container-section">
                            <h2>Añadir Arquitecto o Ingeniero</h2>
                            <form action="backend/subir_personaje.php" method="POST" enctype="multipart/form-data">
                                Nombre:* <input type="text" name="nombre"> <br>
                                Primer Apellido:* <input type="text" name="apellido1"> <br>
                                Segundo Apellido: <input type="text" name="apellido2"> <br>
                                <label for="imagenPersonaje">Seleccione la imagen principal:*</label> <br>
                                <input type="file" id="imagenPersonaje" name="imagenPersonaje"> <br>
                                Fecha de Nacimiento: <input type="date" name="nacimiento"> <br>
                                País de Origen:*
                                <select name='paises'>
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
                                </select> <br>
                                Información:* <br>
                                <textarea id="informacion" name="informacion" rows="5" cols="50"></textarea> <br>

                                Principales obras: <br>
                                <textarea name="obras" id="obras" cols="50" rows="5"></textarea> <br>

                                <input class="btn btn-primary" type="submit" name="subirArqui" value="Subir Personaje">

                            </form>
                        </div>

                        <!-- AÑADIR IMAGENES -->
                        <div class="container-section">
                            <h2>Subir Imagenes</h2> <br>
                            <div id="formularios">
                                <button type="button" onclick="subirImagenes()">Subir imágenes</button> <br><br>

                                <form action="subir_imagenes.php" method="post" enctype="multipart/form-data" id="subirImagen">
                                    <label for="imagen">Seleccione una imagen:*</label>
                                    <input type="file" id="imagen" name="imagen"> <br>
                                    Tipo:*
                                    <select name="campoImagen" id="campoImagen" class="campoImagen">
                                        <option value="">Selecione una opción.</option>
                                        <option value="1">Edificio</option>
                                        <option value="2">Espacio Urbano</option>
                                        <!-- <option value="3">Biografía</option> -->
                                    </select> <br>
                                    Obra:*
                                    <select name="chus" id="chus" class="chus">
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    Sección:*
                                    <select name="seccionObra" id="seccionObra" class="seccionObra">
                                        <option value="">Seleccione una opción.</option>
                                    </select> <br>
                                    <br> <br>
                                </form>
                            </div>
                            <button class="btn btn-primary" id="btnClonar">Añadir campos</button>
                        </div>

                        <!-- ASOCIAR PERSONAJES CON OBRAS -->
                        <div class="container-section">
                            <h2>Asociar personajes con obras</h2>
                            <div id="formulariosObrasPer">
                                <button type="button" onclick="asociarPer()">Asociar personajes</button> <br><br>
                                <form method="post" id="asociarPer">
                                    Personaje:
                                    <select name="personajeChus" id="personajeChus" class="personajeChus">
                                        <?php 
                                            include("backend/get_Biografias.php");
                                        ?>
                                    </select> <br>
                                    Edificación:
                                    <select name="edificioChus" id="edificioChus" class="edificioChus">
                                        <?php 
                                            include("backend/get_Edificios.php");
                                        ?>
                                    </select> <br>
                                    Espacio Urbano:
                                    <select name="espacioChus" id="espacioChus" class="espacioChus">
                                        <?php 
                                            include("backend/get_Espacios.php");
                                        ?>
                                    </select> <br>
                                </form> <br>
                            </div>
                            <button class="btn btn-primary" id="btnClonarAsoc">Añadir campos</button>
                        </div>
                    </div>
                </div>

                <div class="container col-lg-10 col-md-12 col-sm-12" style="background-color: #494d7e; margin:0px;">
                    <div class="footer footer-J col-10-lg col-md-12 col-sm-12" id="contacto">
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
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
                    <label for="imagen${contador}">Seleccione una imagen:</label>
                    <input type="file" id="imagen${contador}" name="imagen${contador}"> <br>
                    Tipo:
                    <select name="campoImagen${contador}" id="campoImagen${contador}" class="campoImagen">
                        <option value="">Selecione una opción.</option>
                        <option value="1">Edificio</option>
                        <option value="2">Espacio Urbano</option>
                    </select> <br>
                    Obra:
                    <select name="chus${contador}" id="chus${contador}" class="chus">
                        <option value="">Seleccione una opción.</option>
                    </select> <br>
                    Sección:
                    <select name="seccionObra${contador}" id="seccionObra${contador}" class="seccionObra">
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
                    Personaje:
                    <select name="personajeChus" id="personajeChus${contadorAsoc}" class="personajeChus">
                        <?php 
                            include("backend/get_Biografias.php");
                        ?>
                    </select> <br>
                    Edificación:
                    <select name="edificioChus" id="edificioChus${contadorAsoc}" class="edificioChus">
                        <?php 
                            include("backend/get_Edificios.php");
                        ?>
                    </select> <br>
                    Espacio Urbano:
                    <select name="espacioChus" id="espacioChus${contadorAsoc}" class="espacioChus">
                        <?php 
                            include("backend/get_Espacios.php");
                        ?>
                    </select> <br>
                </form> <br>
            `;
            $('#formulariosObrasPer').append(formularioAsoc);
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
        var formulariosAsoc = document.querySelectorAll('#formulariosObrasPer form[id*="asociarPer"]');
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