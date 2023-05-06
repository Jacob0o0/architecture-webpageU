<?php 
    require 'conexion.php';

    $personaje = $_POST['personajeChus'];
    $edificio = $_POST['edificioChus'];
    $espacio = $_POST['espacioChus'];

    if (empty($_POST['personajeChus']) || ( empty($_POST['edificioChus']) && empty($_POST['espacioChus']) ) ){
        echo '
        <script>
            alert("¡Existen Campos Vacíos! Por favor, complete todos los campos.");
            window.location= "../formulario.php";
        </script>  
        ';
        exit();
    }

    if (!empty($_POST['personajeChus']) && !empty($_POST['edificioChus']) && empty($_POST['espacioChus']) ){
        // Campo espacio vacio
        $sql = "SELECT id FROM arquitectosObras WHERE idPersonaje = $personaje AND idEdificio = $edificio";
        $resultEdif = $conexion->query($sql);

        if (mysqli_num_rows($resultEdif) > 0) {
            // ya se asoció el edificio con el personaje
            exit();
        } else {
            // No se ha asociado el edificio con el personaje
            // Insertar los valores en la tabla
            $sql = "INSERT INTO arquitectosObras (idPersonaje, idEdificio) VALUES ('$personaje', '$edificio')";

            if ($conexion->query($sql)) {
                echo "Valores guardados exitosamente.";
            } else {
                echo "Error al guardar valores: " . $conexion->error;
            }
        }
    } else if (!empty($_POST['personajeChus']) && empty($_POST['edificioChus']) && !empty($_POST['espacioChus']) ){
        // Campo edificio vacio
        $sql = "SELECT id FROM arquitectosObras WHERE idPersonaje = $personaje AND idEspacio = $espacio";
        $resultEspa = $conexion->query($sql);

        if (mysqli_num_rows($resultEspa) > 0) {
            // ya se asoció el espacio con el personaje
            exit();
        } else {
            // No se ha asociado el espacio con el personaje
            // Insertar los valores en la tabla
            $sql = "INSERT INTO arquitectosObras (idPersonaje, idEspacio) VALUES ('$personaje', '$espacio')";

            if ($conexion->query($sql)) {
                echo "Valores guardados exitosamente.";
            } else {
                echo "Error al guardar valores: " . $conexion->error;
            }
        }
    } else if (!empty($_POST['personajeChus']) && !empty($_POST['edificioChus']) && !empty($_POST['espacioChus']) ){
        // Ningun campo vacío
        $sql = "SELECT id FROM arquitectosObras WHERE idPersonaje = $personaje AND idEdificio = $edificio";
        $resultEdif = $conexion->query($sql);
    
        $sql = "SELECT id FROM arquitectosObras WHERE idPersonaje = $personaje AND idEspacio = $espacio";
        $resultEspa = $conexion->query($sql);

        if (mysqli_num_rows($resultEdif) > 0 && mysqli_num_rows($resultEspa) > 0) {
            // Datos ya subidos
            exit();
        } else if (mysqli_num_rows($resultEdif) > 0 && mysqli_num_rows($resultEspa) == 0) {
            // Insertar los valores en la tabla
            $sql = "INSERT INTO arquitectosObras (idPersonaje, idEspacio) VALUES ('$personaje', '$espacio')";
    
            if ($conexion->query($sql)) {
                echo "Valores guardados exitosamente.";
            } else {
                echo "Error al guardar valores: " . $conexion->error;
            }
        } else if (mysqli_num_rows($resultEspa) > 0 && mysqli_num_rows($resultEdif) == 0) {
            // Insertar los valores en la tabla
            $sql = "INSERT INTO arquitectosObras (idPersonaje, idEdificio) VALUES ('$personaje', '$edificio')";
    
            if ($conexion->query($sql)) {
                echo "Valores guardados exitosamente.";
            } else {
                echo "Error al guardar valores: " . $conexion->error;
            }
        } else {
            // Insertar los valores en la tabla
            $sql = "INSERT INTO arquitectosObras (idPersonaje, idEdificio, idEspacio) VALUES ('$personaje', '$edificio', '$espacio')";
    
            if ($conexion->query($sql)) {
                echo "Valores guardados exitosamente.";
            } else {
                echo "Error al guardar valores: " . $conexion->error;
            }
        }
    } 


?>