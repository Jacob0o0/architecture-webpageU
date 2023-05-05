<?php 
    // Establecer la conexión a la base de datos
    require 'conexion.php';

    if (empty($_POST['campoImagen']) || empty($_POST['chus']) || empty($_POST['seccionObra']) || empty($_FILES['izmagen']['name'])){
        echo '
        <script>
            alert("¡Existen Campos Vacíos! Por favor, complete todos los campos.");
            window.location= "../formulario.php";
        </script>  
        ';
        exit();
    }

    // Verificar que el archivo tenga un formato válido
    $permitidos = array("image/jpeg", "image/png");
    $tipo = $_FILES['imagen']['type'];

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
    $campoI = mysqli_real_escape_string($conexion, $_POST['campoImagen']);
    $eleccionObra = mysqli_real_escape_string($conexion, $_POST['chus']);
    $seccionID = mysqli_real_escape_string($conexion, $_POST['seccionObra']);

    if ($campoI == 1) {
        // Obtener los datos de la imagen
        $nombreImagen = $_FILES['imagen']['name'];
        $tipoImagen = $_FILES['imagen']['type'];
        $tamañoImagen = $_FILES['imagen']['size'];
        $tempImagen = $_FILES['imagen']['tmp_name'];

        // Escapar los datos necesarios para prevenir inyección SQL
        $nombreImagen = mysqli_real_escape_string($conexion, $nombreImagen);
        $tipoImagen = mysqli_real_escape_string($conexion, $tipoImagen);
        $tamañoImagen = mysqli_real_escape_string($conexion, $tamañoImagen);

        // Leer el contenido binario de la imagen
        $fp = fopen($tempImagen, 'r');
        $contenido = fread($fp, $tamañoImagen);
        $contenido = mysqli_real_escape_string($conexion, $contenido);
        fclose($fp);

        switch ($seccionID) {
            case 1:
                $seccionCH = '5B';
                break;
            case 2:
                $seccionCH = '5C';
                break;
            case 3:
                $seccionCH = '6X';
                break;
            case 4:
                $seccionCH = '7X';
                break;
            case 5:
                $seccionCH = '8X';
                break;
            case 6:
                $seccionCH = '9X';
                break;
            // Otros casos
            default:
                // Bloque de código a ejecutar si ningún caso anterior coincide
                break;
        }

        // Construir la consulta SQL utilizando los valores escapados
        $sql = "INSERT INTO imagenesObras (idSeccion, idEdificio, imagen) 
                VALUES ('$seccionCH', '$eleccionObra', '$contenido')";

        if (mysqli_query($conexion, $sql)) {
            echo "se subió la imagen";
        } else {
            echo '
            <script>
                alert("Intentelo de nuevo");
                window.location= "../formulario.php";
            </script>  
            ';
        }
    } else if ($campoI == 2) {
        // Obtener los datos de la imagen
        $nombreImagen = $_FILES['imagen']['name'];
        $tipoImagen = $_FILES['imagen']['type'];
        $tamañoImagen = $_FILES['imagen']['size'];
        $tempImagen = $_FILES['imagen']['tmp_name'];

        // Escapar los datos necesarios para prevenir inyección SQL
        $nombreImagen = mysqli_real_escape_string($conexion, $nombreImagen);
        $tipoImagen = mysqli_real_escape_string($conexion, $tipoImagen);
        $tamañoImagen = mysqli_real_escape_string($conexion, $tamañoImagen);

        // Leer el contenido binario de la imagen
        $fp = fopen($tempImagen, 'r');
        $contenido = fread($fp, $tamañoImagen);
        $contenido = mysqli_real_escape_string($conexion, $contenido);
        fclose($fp);

        switch ($seccionID) {
            case 1:
                $seccionCH = '5B';
                break;
            case 2:
                $seccionCH = '5C';
                break;
            case 3:
                $seccionCH = '5D';
                break;
            case 4:
                $seccionCH = '5E';
                break;
            case 5:
                $seccionCH = '5F';
                break;
            case 6:
                $seccionCH = '5G';
                break;
            case 7:
                $seccionCH = '6X';
                break;
            case 8:
                $seccionCH = '7X';
                break;
            // Otros casos
            default:
                // Bloque de código a ejecutar si ningún caso anterior coincide
                break;
        }

        // Construir la consulta SQL utilizando los valores escapados
        $sql = "INSERT INTO imagenesObras (idSeccion, idEspacio, imagen) 
                VALUES ('$seccionCH', '$eleccionObra', '$contenido')";

        if (mysqli_query($conexion, $sql)) {
            echo "se subió la imagen";
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