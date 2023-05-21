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
    
    <title><?php echo($filaPersonaje['nomPer']) ?></title>
    <title><?php echo($filaPersonaje['apellido']) ?></title>
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

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="datos">
                    <div class="container-section shadow">
                        <h3> Fecha de Nacimiento: <?php echo($filaPersonaje['fechaNac'])?><br></h3>
                        <h3> País de Origen: <?php echo($filaPais['nombre'])?><br></h3>
                        <div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="infoPer">
                    <div class="container-section shadow">
                        <h2>Información</h2>
                        <div class="container-texto">
                            <p><?php 
                                $texto_con_br = nl2br(htmlspecialchars($filaPersonaje['informacion']));
                                echo($texto_con_br)
                            ?></p>
                        </div>
                    </div>
                </div>

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