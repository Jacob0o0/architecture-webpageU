<?php
    require 'conexion.php';

    if (isset($_POST['subirEspacio'])){
        // Establecer la conexión a la base de datos
        require 'conexion.php';

        if (empty($_POST['nombreEU']) || empty($_POST['urlUbiEU']) || empty($_POST['calleEU']) || empty($_POST['coloniasEU']) || empty($_POST['municipiosEU']) || empty($_POST['estadosEU']) || empty($_FILES['imagenEspacio']['name'])){
            echo '
            <script>
                alert("Existen campos vacíos en el formulario. Por favor, complete todos los campos. AQUIIIII");
                window.location= "../formulario.php";
            </script>  
            ';
            exit();
        }
        else if (empty($_POST['periodoConstruc']) || empty($_POST['funcion']) || empty($_POST['contextoEU']) || empty($_POST['transformEU']) || empty($_POST['principiosDis'])) {
            echo '
            <script>
                alert("Existen campos vacíos en el formulario. Por favor, complete todos los campos.");
                window.location= "../formulario.php";
            </script>  
            ';
            exit();
        }

        // Verificar que el archivo tenga un formato válido
        $permitidos = array("image/jpeg", "image/png", "image/gif");
        $tipo = $_FILES['imagenEspacio']['type'];

        if (!in_array($tipo, $permitidos)) {
            echo '
            <script>
                alert("¡El tipo de archivo de la imagen no está permitido!");
                window.location= "../formulario.php";
            </script>  
            ';
            exit();
        }

        $nombre = mysqli_real_escape_string($conexion, $_POST['nombreEU']);
        $periodoConstruc = mysqli_real_escape_string($conexion, $_POST['periodoConstruc']);
        $funcion = mysqli_real_escape_string($conexion, $_POST['funcion']);

        $urlUbi = mysqli_real_escape_string($conexion, $_POST['urlUbiEU']);
        $calle = mysqli_real_escape_string($conexion, $_POST['calleEU']);
        $idEstado = intval($_POST['estadosEU']);
        $idMunicipio = intval($_POST['municipiosEU']);
        $idColonia = intval($_POST['coloniasEU']);
        
        $contextoH = mysqli_real_escape_string($conexion, $_POST['contextoEU']);

        $plan = mysqli_real_escape_string($conexion, $_POST['plan']);
        $caracteristicas = mysqli_real_escape_string($conexion, $_POST['caracteristicas']);
        $orientacion = mysqli_real_escape_string($conexion, $_POST['orientacion']);
        $dimensiones = mysqli_real_escape_string($conexion, $_POST['dimensiones']);
        $secciones = mysqli_real_escape_string($conexion, $_POST['secciones']);
        $elementos = mysqli_real_escape_string($conexion, $_POST['elementos']);
        $tiposEdif = mysqli_real_escape_string($conexion, $_POST['tiposEdif']);

        $transform = mysqli_real_escape_string($conexion, $_POST['transformEU']);
        $principiosDis = mysqli_real_escape_string($conexion, $_POST['principiosDis']);
        $importancia = mysqli_real_escape_string($conexion, $_POST['importancia']);

        $verificarUbi = mysqli_query($conexion, "SELECT*FROM ubicacion WHERE ubicacion_url='$urlUbi' ");

        if (mysqli_num_rows($verificarUbi) > 0) {
            // LA UBICACION YA ESTÁ ALMACENADA EN LA BASE DE DATOS

            $fila = $verificarUbi->fetch_assoc();
            $idUbi = $fila['idUbicacion'];

            $sql = "INSERT INTO descripUrbano (nombreEspacio, planUrbanistico, caracteristicas, orientacion, dimensiones, secciones, elementos, tiposEdifRodeando)
            VALUES ('$nombre', '$plan', '$caracteristicas', '$orientacion', '$dimensiones', '$secciones', '$elementos', '$tiposEdif')";


            if(mysqli_query($conexion, $sql)){
                // SE SUBIÓ LA DESCRIPCION
                $getIDdescrip = mysqli_query($conexion, "SELECT*FROM descripUrbano WHERE nombreEspacio='$nombre' ");
                
                $filaDescrip = $getIDdescrip->fetch_assoc();
                $idDescripUrb = $filaDescrip['id'];

                $sql = "INSERT INTO espacioUrbano (espacioUrbNom, periodoConstruc, funcion, idUbicacion, contextoHistorico, descripUrb_idDescripUrb, transformaciones, principiosDiseño, importancia)
                VALUES ('$nombre', '$periodoConstruc', '$funcion', '$idUbi', '$contextoH', $idDescripUrb, '$transform', '$principiosDis', '$importancia')";

                if(mysqli_query($conexion, $sql)){
                    $getIDespacio = mysqli_query($conexion, "SELECT*FROM espacioUrbano WHERE espacioUrbNom='$nombre' ");
                        
                    $filaEspacio = $getIDespacio->fetch_assoc();
                    $idEspacio = $filaEspacio['id'];

                    // Obtener los datos de la imagen
                    $nombreImagen = $_FILES['imagenEspacio']['name'];
                    $tipoImagen = $_FILES['imagenEspacio']['type'];
                    $tamañoImagen = $_FILES['imagenEspacio']['size'];
                    $tempImagen = $_FILES['imagenEspacio']['tmp_name'];
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
                    $sql = "INSERT INTO imagenesObras (idSeccion, idEspacio, imagen)
                            VALUES ('$idSeccion', '$idEspacio', '$contenido')";

                    // Ejecutar la consulta SQL
                    if (mysqli_query($conexion, $sql)) {
                        echo '
                        <script>
                            alert("Espacio Urbano subido con éxito.");
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

                    $sql = "INSERT INTO descripUrbano (nombreEspacio, planUrbanistico, caracteristicas, orientacion, dimensiones, secciones, elementos, tiposEdifRodeando)
                    VALUES ('$nombre', '$plan', '$caracteristicas', '$orientacion', '$dimensiones', '$secciones', '$elementos', '$tiposEdif')";

                    if(mysqli_query($conexion, $sql)){
                        // SE SUBIÓ LA DESCRIPCION
                        $getIDdescrip = mysqli_query($conexion, "SELECT*FROM descripUrbano WHERE nombreEspacio='$nombre' ");
                        
                        $filaDescrip = $getIDdescrip->fetch_assoc();
                        $idDescripUrb = $filaDescrip['id'];
                        $sql = "INSERT INTO espacioUrbano (espacioUrbNom, periodoConstruc, funcion, idUbicacion, contextoHistorico, descripUrb_idDescripUrb, transformaciones, principiosDiseño, importancia)
                        VALUES ('$nombre', '$periodoConstruc', '$funcion', '$idUbi', '$contextoH', $idDescripUrb, '$transform', '$principiosDis', '$importancia')";

                        if(mysqli_query($conexion, $sql)){
                            $getIDespacio = mysqli_query($conexion, "SELECT*FROM espacioUrbano WHERE espacioUrbNom='$nombre' ");
                        
                            $filaEspacio = $getIDespacio->fetch_assoc();
                            $idEspacio = $filaEspacio['id'];
        
                            // Obtener los datos de la imagen
                            $nombreImagen = $_FILES['imagenEspacio']['name'];
                            $tipoImagen = $_FILES['imagenEspacio']['type'];
                            $tamañoImagen = $_FILES['imagenEspacio']['size'];
                            $tempImagen = $_FILES['imagenEspacio']['tmp_name'];
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
                            $sql = "INSERT INTO imagenesObras (idSeccion, idEspacio, imagen)
                                    VALUES ('$idSeccion', '$idEspacio', '$contenido')";
        
                            // Ejecutar la consulta SQL
                            if (mysqli_query($conexion, $sql)) {
                                echo '
                                <script>
                                    alert("Espacio Urbano subido con éxito.");
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