<?php
require 'conexion.php';

if (isset($_POST['subirArqui'])){
    // Establecer la conexión a la base de datos
    require 'conexion.php';

    if (empty($_POST['nombre']) || empty($_POST['apellido1']) || empty($_POST['informacion']) || empty($_FILES['imagenPersonaje']['name']) || empty($_POST['paises'])){
        echo '
        <script>
            alert("¡Existen Campos Vacíos! Por favor, complete todos los campos.");
            window.location= "../formulario.php";
        </script>  
        ';
        exit();
    }

    // Verificar que el archivo tenga un formato válido
    $permitidos = array("image/jpeg", "image/png", "image/gif");
    $tipo = $_FILES['imagenPersonaje']['type'];

    if (!in_array($tipo, $permitidos)) {
        echo '
        <script>
            alert("¡El tipo de archivo de la imagen no está permitido!");
            window.location= "../formulario.php";
        </script>  
        ';
        exit();
    }

    // Escapar los datos POST
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellidoUno = mysqli_real_escape_string($conexion, $_POST['apellido1']);
    $apellidoDos = mysqli_real_escape_string($conexion, $_POST['apellido2']);
    $nacimiento = mysqli_real_escape_string($conexion, $_POST['nacimiento']);
    $pais = mysqli_real_escape_string($conexion, $_POST['paises']);
    $informacion = mysqli_real_escape_string($conexion, $_POST['informacion']);
    $obras = mysqli_real_escape_string($conexion, $_POST['obras']);

    // Construir la consulta SQL utilizando los valores escapados
    $sql = "INSERT INTO personaje (nomPer, apellido, apellido2, fechaNac, idPais, informacion, obras) 
            VALUES ('$nombre', '$apellidoUno', '$apellidoDos', '$nacimiento', '$pais', '$informacion', '$obras')";

    // Ejecutar la consulta SQL
    if(mysqli_query($conexion, $sql)) {
        // YA SE SUBIÓ EL PERSONAJE

        $getIDpersonaje = mysqli_query($conexion, "SELECT*FROM personaje WHERE nomPer='$nombre' AND apellido='$apellidoUno'");

        $filaPer = $getIDpersonaje->fetch_assoc();
        $idPersonaje = $filaPer['idPersonaje'];

        // Obtener los datos de la imagen
        $nombreImagen = $_FILES['imagenPersonaje']['name'];
        $tipoImagen = $_FILES['imagenPersonaje']['type'];
        $tamañoImagen = $_FILES['imagenPersonaje']['size'];
        $tempImagen = $_FILES['imagenPersonaje']['tmp_name'];
        $idSeccion = "MN"; // main image

        // Escapar los datos necesarios para prevenir inyección SQL
        $nombreImagen = mysqli_real_escape_string($conexion, $nombreImagen);
        $tipoImagen = mysqli_real_escape_string($conexion, $tipoImagen);
        $tamañoImagen = mysqli_real_escape_string($conexion, $tamañoImagen);

        // Leer el contenido binario de la imagen
        $fp = fopen($tempImagen, 'r');
        $contenido = fread($fp, $tamañoImagen);
        $contenido = mysqli_real_escape_string($conexion, $contenido);
        fclose($fp);

        // Preparar la consulta SQL para insertar la imagen
        $sql = "INSERT INTO imagenesBiografias (idPersonaje, imagen)
                VALUES ('$idPersonaje', '$contenido')";

        // Ejecutar la consulta SQL
        if (mysqli_query($conexion, $sql)) {
            echo '
            <script>
                alert("Personaje subido con éxito.");
                window.location= "../formulario.php";
            </script>  
            ';
        } else {
            echo "Error al subir la imagen: " . mysqli_error($conexion);
        }
    } else {
        echo '
        <script>
            alert("Intentelo de nuevo");
            window.location= "../formulario.php";
        </script>  
        ';
    }
}
?>