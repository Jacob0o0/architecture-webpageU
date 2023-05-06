<?php
    require 'conexion.php';

    if (isset($_POST['subirEdif'])){
        // Establecer la conexión a la base de datos
        require 'conexion.php';

        if (empty($_POST['nombre']) || empty($_POST['generos']) || empty($_POST['contexto']) || empty($_POST['urlUbi']) || empty($_POST['calle']) || empty($_POST['colonias']) || empty($_POST['municipios']) || empty($_POST['estados']) || empty($_FILES['imagenEdif']['name'])){
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
        $tipo = $_FILES['imagenEdif']['type'];

        if (!in_array($tipo, $permitidos)) {
            echo '
            <script>
                alert("¡El tipo de archivo de la imagen no está permitido!");
                window.location= "../formulario.php";
            </script>  
            ';
            exit();
        }

        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $idGenero = intval($_POST['generos']);
        $uso = mysqli_real_escape_string($conexion, $_POST['usoActual']);
        $fechaConstruc = mysqli_real_escape_string($conexion, $_POST['fechaConstruc']);
        $urlUbi = mysqli_real_escape_string($conexion, $_POST['urlUbi']);
        $calle = mysqli_real_escape_string($conexion, $_POST['calle']);
        $idEstado = intval($_POST['estados']);
        $idMunicipio = intval($_POST['municipios']);
        $idColonia = intval($_POST['colonias']);
        $contextoH = mysqli_real_escape_string($conexion, $_POST['contexto']);
        $concepto = mysqli_real_escape_string($conexion, $_POST['concepto']);
        $corriente = mysqli_real_escape_string($conexion, $_POST['corrienteEst']);
        $matYSist = mysqli_real_escape_string($conexion, $_POST['matYSist']);
        $contextoUrb = mysqli_real_escape_string($conexion, $_POST['contextUrb']);
        $transform = mysqli_real_escape_string($conexion, $_POST['transform']);

        $verificarUbi = mysqli_query($conexion, "SELECT*FROM ubicacion WHERE ubicacion_url='$urlUbi' ");

        if (mysqli_num_rows($verificarUbi) > 0) {
            // LA UBICACION YA ESTÁ ALMACENADA EN LA BASE DE DATOS

            $fila = $verificarUbi->fetch_assoc();
            $idUbi = $fila['idUbicacion'];

            $sql = "INSERT INTO edificio (nombre, idGeneroEdif, usoActual, fechaConstruc, idUbicacion, contextoHistorico, concepto, corrienteEst, materialYSistem, contextoUrbano, transformaciones) 
            VALUES ('$nombre', '$idGenero', '$uso', '$fechaConstruc', '$idUbi', '$contextoH', '$concepto', '$corriente', '$matYSist', '$contextoUrb', '$transform')";

            if(mysqli_query($conexion, $sql)){
                $getIDedif = mysqli_query($conexion, "SELECT*FROM edificio WHERE nombre='$nombre' ");
                        
                $filaEdif = $getIDedif->fetch_assoc();
                $idEdificio = $filaEdif['idEdificio'];

                // Obtener los datos de la imagen
                $nombreImagen = $_FILES['imagenEdif']['name'];
                $tipoImagen = $_FILES['imagenEdif']['type'];
                $tamañoImagen = $_FILES['imagenEdif']['size'];
                $tempImagen = $_FILES['imagenEdif']['tmp_name'];
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
                $sql = "INSERT INTO imagenesObras (idSeccion, idEdificio, imagen)
                        VALUES ('$idSeccion', '$idEdificio', '$contenido')";

                // Ejecutar la consulta SQL
                if (mysqli_query($conexion, $sql)) {
                    echo '
                    <script>
                        alert("Edificio subido con éxito.");
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
        } else {
            // Construir la consulta SQL utilizando los valores escapados
            $sql = "INSERT INTO ubicacion (ubicacion_url, calleNum, idColonia, idMunicipio, idEstado) 
            VALUES ('$urlUbi', '$calle', '$idColonia', '$idMunicipio', '$idEstado')";

            // Ejecutar la consulta SQL
            if(mysqli_query($conexion, $sql)) {
                $verificarUbi = mysqli_query($conexion, "SELECT*FROM ubicacion WHERE ubicacion_url='$urlUbi' ");

                if (mysqli_num_rows($verificarUbi) > 0) {
                    // YA SE SUBIÓ LA UBICACION

                    $fila = $verificarUbi->fetch_assoc();
                    $idUbi = $fila['idUbicacion'];

                    $sql = "INSERT INTO edificio (nombre, idGeneroEdif, usoActual, fechaConstruc, idUbicacion, contextoHistorico, concepto, corrienteEst, materialYSistem, contextoUrbano, transformaciones) 
                    VALUES ('$nombre', '$idGenero', '$uso', '$fechaConstruc', '$idUbi', '$contextoH', '$concepto', '$corriente', '$matYSist', '$contextoUrb', '$transform')";

                    if(mysqli_query($conexion, $sql)){
                        // SE SUBIÓ EL EDIFICIO
                        $getIDedif = mysqli_query($conexion, "SELECT*FROM edificio WHERE nombre='$nombre' ");
                        
                        $filaEdif = $getIDedif->fetch_assoc();
                        $idEdificio = $filaEdif['idEdificio'];

                        echo $idEdificio;

                        // Obtener los datos de la imagen
                        $nombreImagen = $_FILES['imagenEdif']['name'];
                        $tipoImagen = $_FILES['imagenEdif']['type'];
                        $tamañoImagen = $_FILES['imagenEdif']['size'];
                        $tempImagen = $_FILES['imagenEdif']['tmp_name'];
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
                        $sql = "INSERT INTO imagenesObras (idSeccion, idEdificio, imagen)
                                VALUES ('$idSeccion', '$idEdificio', '$contenido')";

                        // Ejecutar la consulta SQL
                        if (mysqli_query($conexion, $sql)) {
                            echo '
                            <script>
                                alert("Edificio subido con éxito.");
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
            } else {
                echo '
                <script>
                    alert("Intentelo de nuevo");
                    window.location= "../formulario.php";
                </script>  
                ';
            }
        }

        $_SESSION['timestamp'] = strtotime("now");
    }
?>