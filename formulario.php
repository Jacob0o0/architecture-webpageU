<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="container">
        <h2>Añadir Edificación</h2>
        <form method="POST">
            Nombre: <input type="text" name="nombre"> <br>
            Genero Edificio: <br>
            Uso Actual: <br>
            <textarea id="usoActual" name="usoActual" rows="5" cols="50"></textarea> <br>
            Fecha de Construcción: <input type="date" name="fechaConstruc"> <br>
            Arquitecto: <br>
            <select name='arquitectos'>
                <option value="">Seleccione una opción.</option>
                <?php 
                    require 'backend/conexion.php';

                    $arquis = mysqli_query($conexion, "SELECT idPersonaje, nomPer, apellido FROM personaje");

                    if (mysqli_num_rows($arquis) > 0) {
                        while ($fila = mysqli_fetch_assoc($arquis)) {
                        echo "<option value='" . $fila["idPersonaje"] . "'>" . $fila["nomPer"] .' '. $fila["apellido"] . "</option>";}
                    }
                    else {
                        echo "Error con la conexión.";
                    }
                ?>
            </select> <br>

            <div class="container" style="background-color: cornsilk;">
                <h3>Ubicación:</h3>
                URL dirección en Google Maps: <input type="text" name="urlUbi"> <br>
                Calle: <input type="text" name="calle"> <br>
                Estado:
                    <select name='estados' onchange='getMunicipios(this.value)'>
                        <option value="">Seleccione una opción.</option>
                        <?php 
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
                Municipio:
                <select name='municipios' onchange='getColonias(this.value)' id='municipios'>
                    <option value="">Seleccione una opción.</option>
                </select> <br>
                Colonia:
                <select name="colonias" id="colonias">
                    <option value="">Seleccione una opción.</option>
                </select>
            </div>

            Contexto Histórico: <br>
            <textarea id="contexto" name="contexto" rows="5" cols="50"></textarea> <br>

            <div class="container" style="background-color: cornsilk;">
                <h3>Descripcion del Edificio</h3>
            </div>

            Corriente Estilística: <br>
            <textarea id="corrienteEst" name="corrienteEst" rows="5" cols="50"></textarea> <br>

            Materiales y Sistema: <br>
            <textarea id="matYSist" name="matYSist" rows="5" cols="50"></textarea> <br>

            Contexto Urbano: <br>
            <textarea id="contextUrb" name="contextUrb" rows="5" cols="50"></textarea> <br>

            Transformaciones: <br>
            <textarea id="transform" name="transform" rows="5" cols="50"></textarea> <br>
        </form>
    </div>

    <div class="container">
        <h2>Añadir Espacio Urbano</h2>
    </div>

    <div class="container">
        <h2>Añadir Arquitecto</h2>
        <form method="POST">
            Nombre: <input type="text" name="nombre"> <br>
            Primer Apellido: <input type="text" name="apellido1"> <br>
            Segundo Apellido: <input type="text" name="apellido2"> <br>
            Fecha de Nacimiento: <input type="date" name="nacimiento"> <br>
            País de Origen:
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
            Información: <br>
            <textarea id="informacion" name="informacion" rows="5" cols="50"></textarea> <br>

            <input type="submit" name="subirArqui" value="Subir Arquitecto">

        </form>
    </div>

    <!-- <script>
        document.getElementById("estados").addEventListener("change", function() {
            var estado_id = this.value;
            var municipios_select = document.getElementById("municipios");

            document.getElementById("estados").addEventListener("change", function() {
                var estado_id = this.value;
                var municipios_select = document.getElementById("municipios");

                // Realizar petición AJAX para obtener municipios del estado seleccionado
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "get_municipios.php?estado_id=" + estado_id, true);
                xhr.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        // Actualizar select de municipios con las opciones recibidas
                        municipios_select.innerHTML = this.responseText;
                    }
                };
                xhr.send();
                });
        });
    </script> -->
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
</script>
</body>
</html>

<?php
    if (isset($_POST['subirArqui'])){
        // Establecer la conexión a la base de datos
        require 'backend/conexion.php';

        // Escapar los datos POST
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $apellidoUno = mysqli_real_escape_string($conexion, $_POST['apellido1']);
        $apellidoDos = mysqli_real_escape_string($conexion, $_POST['apellido2']);
        $nacimiento = mysqli_real_escape_string($conexion, $_POST['nacimiento']);
        $pais = mysqli_real_escape_string($conexion, $_POST['paises']);
        $informacion = mysqli_real_escape_string($conexion, $_POST['informacion']);

        // Construir la consulta SQL utilizando los valores escapados
        $sql = "INSERT INTO personaje (nomPer, apellido, apellido2, fechaNac, idPais, informacion) 
                VALUES ('$nombre', '$apellidoUno', '$apellidoDos', '$nacimiento', '$pais', '$informacion')";

        // Ejecutar la consulta SQL
        if(mysqli_query($conexion, $sql)) {
            echo "El registro se ha subido exitosamente a la base de datos.";
        } else {
            echo "Error al subir el registro a la base de datos: " . mysqli_error($conexion);
        }
    }
?>