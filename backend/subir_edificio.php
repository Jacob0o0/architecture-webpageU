<?php
    require 'conexion.php';

    if (isset($_POST['subirEdif'])){
        // Establecer la conexión a la base de datos
        require 'conexion.php';

        if (empty($_POST['nombre']) || empty($_POST['generos']) || empty($_POST['contexto']) || empty($_POST['urlUbi']) || empty($_POST['calle']) || empty($_POST['colonias']) || empty($_POST['municipios']) || empty($_POST['estados'])){
            echo '
            <script>
                alert("¡Existen Campos Vacíos! Por favor, complete todos los campos.");
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
                echo '
                <script>
                    alert("Edificio subido con éxito.");
                    window.location= "../formulario.php";
                </script>  
                ';
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
                        echo '
                        <script>
                            alert("Edificio subido con éxito.");
                            window.location= "../formulario.php";
                        </script>  
                        ';
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