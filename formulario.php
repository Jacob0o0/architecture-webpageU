<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="style.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Formulario</title>
</head>
<body>
    <div class="nav-bar">Barra navegación
        <a href="index.php">Inicio</a>
        <a href="edificios.php">Edificios</a>
        <a href="formulario.php">Formulario</a>
    </div>

    <!-- AÑADIR EDIFICIOS -->
    <div class="container">
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

    <!-- AÑADIR ESPACIOS URBANOS -->
    <div class="container">
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

            <input type="submit" name="subirEspacio" value="Subir Espacio Urbano">
        </form>
    </div>

    <!-- AÑADIR PERSONAJES -->
    <div class="container">
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

            <input type="submit" name="subirArqui" value="Subir Personaje">

        </form>
    </div>

    <!-- AÑADIR IMAGENES -->
    <div class="container">
        <h2>Subir Imagenes</h2>
        <form action="subir_imagenes.php" method="post" enctype="multipart/form-data" id="subirImagen">
            <label for="imagen">Seleccione una imagen:</label>
            <input type="file" id="imagen" name="imagen"> <br>
            Tipo:
            <select name="campoImagen" id="campoImagen">
                <option value="">Selecione una opción.</option>
                <option value="1">Edificio</option>
                <option value="2">Espacio Urbano</option>
                <!-- <option value="3">Biografía</option> -->
            </select> <br>
            Obra:
            <select name="chus" id="chus">
                <option value="">Seleccione una opción.</option>
            </select> <br>
            Sección:
            <select name="seccionObra" id="seccionObra">
                <option value="">Seleccione una opción.</option>
            </select> <br>
            <br> <br>
        </form>
        <div id="formularios"></div>
        <button onclick="subirImagenes()">Subir todas las imágenes</button>
        <button onclick="crearForm()">Añadir campos</button>
    </div>

    <!-- ASOCIAR PERSONAJES CON OBRAS -->
    <div class="container">
        <h2>Asociar personajes con obras</h2>
        <form action="asociar_Personajes.php">
            Personaje:
            <select name="personajeChus" id="personajeChus">
                <?php 
                    include("backend/get_Biografias.php");
                ?>
            </select> <br>
            Edificación:
            <select name="edificioChus" id="edificioChus">
                <?php 
                    include("backend/get_Edificios.php");
                ?>
            </select> <br>
            Espacio Urbano:
            <select name="espaciosChus" id="espaciosChus">
                <?php 
                    include("backend/get_Espacios.php");
                ?>
            </select> <br>
            <input type="submit" value="Asociar Personaje">
        </form>
    </div>

    <div class="footer footer-J">
        Pie de página
    </div>

    <!-- JAVASCRIPT -->
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
        $('#campoImagen').change(function() {
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
    });

    function crearForm() {
        // Clonar el formulario original
        var formulario = document.querySelector('#subirImagen').cloneNode(true);
        
        // Cambiar el atributo "id" del formulario clonado para que sea único
        formulario.id = 'subirImagen' + Date.now();
        
        // Agregar el formulario clonado al contenedor
        var contenedor = document.querySelector('#formularios');
        contenedor.appendChild(formulario);
    }

    function subirImagenes() {
    // Obtener todos los formularios clonados
    var formularios = document.querySelectorAll('form[id^="subirImagen"]');
    
    // Iterar sobre cada formulario
    formularios.forEach(function(formulario) {
        // Obtener los datos del formulario
        var imagen = formulario.querySelector('input[type="file"]').files[0];
        var campoImagen = formulario.querySelector('#campoImagen').value;
        var chus = formulario.querySelector('#chus').value;
        var seccionObra = formulario.querySelector('#seccionObra').value;
        
        // Crear un objeto FormData para enviar los datos al servidor
        var formData = new FormData();
        formData.append('imagen', imagen);
        formData.append('campoImagen', campoImagen);
        formData.append('chus', chus);
        formData.append('seccionObra', seccionObra);
        
        // Realizar una solicitud HTTP mediante fetch() para enviar los datos al servidor
        fetch('subir_imagenes.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            // Manejar la respuesta del servidor si es necesario
            console.log(response);
        })
        .catch(function(error) {
            // Manejar cualquier error que ocurra
            console.error(error);
        });
    });
    }

</script>
</body>
</html>