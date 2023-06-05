<?php 
    $idPersonaje = $_POST['id_biografia'];
    require 'backend/conexion.php';

    $personaje = mysqli_query($conexion, "SELECT * FROM personaje WHERE idPersonaje ='$idPersonaje'");

    $filaPersonaje = $personaje->fetch_assoc();
    $idPais = $filaPersonaje['idPais'];

    $pais = mysqli_query($conexion, "SELECT * FROM pais WHERE idPais = '$idPais'");

    $filaPais = $pais->fetch_assoc();

    $imagen = mysqli_query($conexion, "SELECT * FROM imagenesBiografias WHERE idPersonaje = '$idPersonaje'");
    
    $filaMainImagen = $imagen->fetch_assoc();
    $mainImagen = $filaMainImagen['imagen'];
    // Obtener el tipo de imagen
    $infoImagen = getimagesize('data://application/octet-stream;base64,' . base64_encode($mainImagen));
    $tipoImagen = $infoImagen['mime'];
?>

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
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    
    <title><?php echo($filaPersonaje['nomPer'] . " " . $filaPersonaje['apellido']) ?></title>
</head>
<body>
<div class="container col-12" style="padding-left: 0px; padding-right: 0px;">
    <div id="container-carga">
        <div id="carga"></div>
    </div>
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
                                <a class="nav-link" href="#datos">
                                    <i class="bi bi-person-vcard-fill"></i>
                                    <span>Datos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#infoPer">
                                    <i class="bi bi-card-heading"></i>
                                    <span>Información</span>
                                </a>
                            </li>    
                            <li class="nav-item">
                                <a class="nav-link" href="#obrasPrin">
                                    <i class="bi bi-houses-fill"></i>
                                    <span>Obras</span>
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

            <div class="" style="padding-left: 0px; padding-right: 0px; margin: 0px; display: flex; flex-direction: column; align-items: center; border-radius: 20px; width: 100%; background-color: #fff;">

                <!-- MAIN IMAGE -->
                <div class="col-lg-12 col-md-12 col-sm-12 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="top">
                    <div class="main-image" style="background-image: url('data:<?php echo $tipoImagen; ?>;base64,<?php echo base64_encode($mainImagen); ?>')">
                        <div class="main-title">
                            <?php echo($filaPersonaje['nomPer']); echo(" ");?>
                            <?php echo($filaPersonaje['apellido']); echo(" "); ?>
                            <?php echo($filaPersonaje['apellido2']) ?>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- GENERAL INFORMATION -->
                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="datos">
                    <div class="container-section shadow">
                        <div class="divider"></div>
                        <h3> Fecha de Nacimiento: 
                            <?php 
                                if($filaPersonaje['fechaNac'] === "0000-00-00"){
                                    echo 'Desconocido';
                                } else {
                                    echo($filaPersonaje['fechaNac']);
                                }
                            ?><br></h3>
                        <h3> País de Origen: <?php echo($filaPais['nombre'])?><br></h3>
                        <div class="divider"></div>
                    </div>
                </div>

                <!-- RELEVANT INFORMATION -->
                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="infoPer">
                    <div class="container-section shadow">
                        <h2>Información</h2>
                        <div class="container-texto">
                            <p><?php 
                                $texto_con_br = nl2br(htmlspecialchars($filaPersonaje['informacion']));
                                echo($texto_con_br)
                            ?></p>
                        </div>
                        <div class="divider"></div>
                    </div>
                </div>

                <!-- OBRAS -->
                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="obrasPrin">
                    <div class="container-section shadow">
                        <h2>Obras Principales</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaPersonaje['obras']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <div class="divider"></div>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                            <?php 
                                require 'backend/conexion.php';
                                // Consulta para obtener los datos del personaje y su imagen
                                // Sentencia SQL para obtener los personajes con idEspacio 3
                                $sql = "SELECT * FROM arquitectosObras WHERE idPersonaje = '$idPersonaje'";
                    
                                $resultado = $conexion->query($sql);

                                // Verificar si se encontraron registros
                                if (mysqli_num_rows($resultado) > 0) {
                                    // Recorrer los resultados
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        // Verificar si idEdificio es nulo
                                        if ($fila['idEdificio'] === null) {
                                            // Código a ejecutar si idEdificio es nulo
                                            $idEspacioAsoc = $fila['idEspacio'];

                                            $sql = "SELECT e.id, e.espacioUrbNom, i.imagen FROM espacioUrbano e
                                            INNER JOIN imagenesObras i ON e.id = i.idEspacio
                                            WHERE i.idSeccion = 'MN' AND e.id = '$idEspacioAsoc'";

                                            $espacios = $conexion->query($sql);

                                            // Iterar sobre los resultados y generar un card HTML para cada espacio
                                            while ($filaEspacio = $espacios->fetch_assoc()) {
                                                $idEspacio = $filaEspacio['id'];
                                                $nombreEspacio = $filaEspacio['espacioUrbNom'];
                                                $imagenEspacio = base64_encode($filaEspacio['imagen']);

                                                // Generar el card HTML con el nombre y la imagen del espacio
                                                echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                                echo '<div class="card shadow">';
                                                echo '<img src="data:image/jpeg;base64,' . $imagenEspacio . '" class="card-img-top img-fluid" alt="' . $nombreEspacio . '">';
                                                echo '<form action="espacios.php" method="post">';
                                                echo '<div class="card-body">';
                                                echo '<h5 class="card-title">' . $nombreEspacio . '</h5>';
                                                echo '<input type="hidden" name="id_espacio" value="' . $idEspacio . '">';
                                                echo '<button type="submit" class="btn btn-primary">Ver detalles</button>';
                                                echo '</div>';
                                                echo '</form>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }

                                        // Verificar si idEspacio es nulo
                                        if ($fila['idEspacio'] === null) {
                                            // Código a ejecutar si idEspacio es nulo
                                            $idEdificioAsoc = $fila['idEdificio'];

                                            $sql = "SELECT e.idEdificio, e.nombre, i.imagen FROM edificio e
                                            INNER JOIN imagenesObras i ON e.idEdificio = i.idEdificio
                                            WHERE i.idSeccion = 'MN' AND e.idEdificio = '$idEdificioAsoc'";

                                            $edificio = $conexion->query($sql);

                                            // Iterar sobre los resultados y generar un card HTML para cada espacio
                                            while ($filaEdificio = $edificio->fetch_assoc()) {
                                                $idEdificio = $filaEdificio['idEdificio'];
                                                $nombreEdificio = $filaEdificio['nombre'];
                                                $imagenEdificio = base64_encode($filaEdificio['imagen']);

                                                // Generar el card HTML con el nombre y la imagen del espacio
                                                echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                                echo '<div class="card shadow">';
                                                echo '<img src="data:image/jpeg;base64,' . $imagenEdificio . '" class="card-img-top img-fluid" alt="' . $nombreEdificio . '">';
                                                echo '<form action="edificios.php" method="post">';
                                                echo '<div class="card-body">';
                                                echo '<h5 class="card-title">' . $nombreEdificio . '</h5>';
                                                echo '<input type="hidden" name="id_edificio" value="' . $idEdificio . '">';
                                                echo '<button type="submit" class="btn btn-primary">Ver detalles</button>';
                                                echo '</div>';
                                                echo '</form>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                    }
                                } else {
                                    // // Generar el card HTML default
                                    // echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                    // echo '<div class="card shadow">';
                                    // echo '<img src="assets/images/default-building.png" class="card-img-top img-fluid" alt="Sin datos">';
                                    // echo '<div class="card-body">';
                                    // echo '<h5 class="card-title">Sin obras(s) asociado(s)</h5>';
                                    // echo '<input type="hidden" name="id_biografia" value="0">';
                                    // echo '</div>';
                                    // echo '</div>';
                                    // echo '</div>';
                                }
                            ?>
                        </div>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="divider"></div>

            </div>

            <!-- FOOTER -->
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

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/scroll-active.js"></script>
    <script src="js/scrollreveal.js"></script>
    <script src="js/carga.js"></script>

    <script>
        $(document).ready(function() {
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
        });
    </script>
</body>
</html>