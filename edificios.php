<?php 
    $idEdificio = $_POST['id_edificio'];
    require 'backend/conexion.php';

    $edificio = mysqli_query($conexion, "SELECT edificio.*, generos.nombreGenero FROM edificio INNER JOIN generos ON edificio.idGeneroEdif = generos.idGenero   WHERE edificio.idEdificio = '$idEdificio'");


    $filaEdificio = $edificio->fetch_assoc();

    $imagen = mysqli_query($conexion, "SELECT * FROM imagenesObras WHERE idEdificio = '$idEdificio' AND idSeccion = 'MN'");
    
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
    
    <title><?php echo($filaEdificio['nombre']) ?></title>
</head>
<body>
<div class="container col-12" style="padding-left: 0px; padding-right: 0px;">
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
                                <a class="nav-link" href="#general">
                                    <i class="bi bi-info-circle-fill"></i>
                                    <span>General</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#personajes">
                                    <i class="bi bi-people-fill"></i>
                                    <span>Creadores</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#ubicacion">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>Ubicación</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contextoH">
                                    <i class="bi bi-book-fill"></i>
                                    <span>Historia</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#descripcion">
                                    <i class="bi bi-file-text-fill"></i>
                                    <span>Descripción</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#corriente">
                                    <i class="bi bi-palette-fill"></i>
                                    <span>Corriente</span>
                                </a>
                            <li class="nav-item">
                                <a class="nav-link" href="#materiales">
                                    <i class="bi bi-bricks"></i>
                                    <span>Materiales</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contextoU">
                                    <i class="bi bi-building-fill-exclamation"></i>
                                    <span>Contexto</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#transform">
                                    <i class="bi bi-hourglass-split"></i>
                                    <span>Cambios</span>
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

                <div class="col-lg-12 col-md-12 col-sm-12 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="top">
                    <div class="main-image" style="background-image: url('data:<?php echo $tipoImagen; ?>;base64,<?php echo base64_encode($mainImagen); ?>')">
                        <div class="main-title">
                            <?php echo($filaEdificio['nombre']) ?>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="general">
                    <div class="container-section shadow">
                        <h2>Género: <?php echo($filaEdificio['nombreGenero'])?><br></h2>
                        <h3>Uso actual: <?php echo($filaEdificio['usoActual'])?><br></h3>
                        <h3>Periodo de construcción: <?php echo($filaEdificio['fechaConstruc'])?><br></h4>
                        <div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="personajes">
                    <div class="container-section shadow">
                        <h2>Arquitecto o ingeniero que lo diseñó</h2>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                            <?php 
                                require 'backend/conexion.php';
                                // Consulta para obtener los datos del personaje y su imagen
                                // Sentencia SQL para obtener los personajes con idEspacio 3
                                $sql = "SELECT p.nomPer, p.apellido, p.apellido2, p.idPersonaje, i.imagen
                                        FROM personaje p
                                        INNER JOIN arquitectosObras ao ON p.idPersonaje = ao.idPersonaje
                                        INNER JOIN imagenesBiografias i ON p.idPersonaje = i.idPersonaje
                                        WHERE ao.idEdificio = '$idEdificio'";
                    
                                $resultado = $conexion->query($sql);
                    
                                // Iterar sobre los resultados y generar un card HTML para cada personaje
                                while ($filaPersonaje = $resultado->fetch_assoc()) {
                                    $idPersonaje = $filaPersonaje['idPersonaje'];
                                    $nombrePersonaje = $filaPersonaje['nomPer'];
                                    $imagenPersonaje = base64_encode($filaPersonaje['imagen']);
                    
                                    // Generar el card HTML con el nombre y la imagen del personaje
                                    echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                    echo '<div class="card shadow">';
                                    echo '<img src="data:image/jpeg;base64,' . $imagenPersonaje . '" class="card-img-top img-fluid" alt="' . $nombrePersonaje . '">';
                                    echo '<form action="biografias.php" method="post">';
                                    echo '<div class="card-body">';
                                    echo '<h5 class="card-title">' . $nombrePersonaje . '</h5>';
                                    echo '<input type="hidden" name="id_biografia" value="' . $idPersonaje . '">';
                                    echo '<button type="submit" class="btn btn-primary">Ver detalles</button>';
                                    echo '</div>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="ubicacion">
                    <div class="container-section shadow">
                        <h2>Ubicación</h2>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="contextoH">
                    <div class="container-section shadow">
                        <h2>Contexto Histórico</h2>
                        <div class="container-texto">
                            <p><?php 
                                $texto_con_br = nl2br(htmlspecialchars($filaEdificio['contextoHistorico']));
                                echo($texto_con_br)
                            ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="descripcion">
                    <div class="container-section shadow">
                        <h2>Descripción del espacio arquitectónico</h2>
                        <h3>Concepto</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEdificio['concepto']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <h3>Plantas Arquitectónicas</h3>
                        <div class="divider"></div>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                                <?php 
                                $sql = "SELECT imagen FROM imagenesObras WHERE idSeccion = '5B' AND idEdificio = $idEdificio";
                                $result = $conexion->query($sql);
                                
                                // Mostrar las imágenes en el div
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '" class="rounded img-thumbnail" alt="Imagen">';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No se encontraron imágenes.";
                                }
                                ?>
                        </div>
                        <div class="divider"></div>
                        <h3>Fachadas y ornamentos</h3>
                        <div class="divider"></div>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                                <?php 
                                $sql = "SELECT imagen FROM imagenesObras WHERE idSeccion = '5C' AND idEdificio = $idEdificio";
                                $result = $conexion->query($sql);
                                
                                // Mostrar las imágenes en el div
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '" class="rounded img-thumbnail img-fluid img-responsive" alt="Imagen">';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No se encontraron imágenes.";
                                }
                                ?>
                        </div>
                        <div class="divider"></div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="corriente">
                    <div class="container-section shadow">
                        <h2>Corriente estilística</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEdificio['corrienteEst']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="materiales">
                    <div class="container-section shadow">
                        <h2>Materiales y sistemas constructivos empleados</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEdificio['materialYSistem']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="contextoU">
                    <div class="container-section shadow">
                        <h2>Contexto urbano: Situación y emplazamiento</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEdificio['contextoUrbano']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                                <?php 
                                $sql = "SELECT imagen FROM imagenesObras WHERE idSeccion = '8X' AND idEdificio = $idEdificio";
                                $result = $conexion->query($sql);
                                
                                // Mostrar las imágenes en el div
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '" class="rounded img-thumbnail img-fluid img-responsive" alt="Imagen">';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No se encontraron imágenes.";
                                }
                                ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="transform">
                    <div class="container-section shadow">
                        <h2>Transformaciones del espacio: Remodelaciones y/o adecuaciones</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEdificio['transformaciones']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                                <?php 
                                $sql = "SELECT imagen FROM imagenesObras WHERE idSeccion = '9X' AND idEdificio = $idEdificio";
                                $result = $conexion->query($sql);
                                
                                // Mostrar las imágenes en el div
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '" class="rounded img-thumbnail img-fluid img-responsive" alt="Imagen">';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No se encontraron imágenes.";
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>

            </div>

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