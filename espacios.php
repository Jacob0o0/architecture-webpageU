<?php 
    $idEspacio = $_POST['id_espacio'];
    require 'backend/conexion.php';

    $espacioUrbano = mysqli_query($conexion, "SELECT * FROM espacioUrbano WHERE id ='$idEspacio'");
    $filaEspacio = $espacioUrbano->fetch_assoc();

    $idDescrip = $filaEspacio['descripUrb_idDescripUrb'];
    $descripUrbano = mysqli_query($conexion, "SELECT * FROM descripUrbano WHERE id ='$idDescrip'");
    $filaDescrip = $descripUrbano->fetch_assoc();

    $imagen = mysqli_query($conexion, "SELECT * FROM imagenesObras WHERE idEspacio = '$idEspacio' AND idSeccion = 'MN'");
    
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
    
    <title><?php echo($filaEspacio['espacioUrbNom']) ?></title>
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
                                <a class="nav-link" href="#transform">
                                    <i class="bi bi-hourglass-split"></i>
                                    <span>Cambios</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#diseño">
                                    <i class="bi bi-palette-fill"></i>
                                    <span>Diseño</span>
                                </a>
                            <li class="nav-item">
                                <a class="nav-link" href="#importancia">
                                    <i class="bi bi-question-lg"></i>
                                    <span>Importancia</span>
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
                            <?php echo($filaEspacio['espacioUrbNom']) ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="general">
                    <div class="container-section shadow">
                        <h3>Género y tipología de edificio:<br></h3>
                        <h3>Periodo en que se estableció:</h3>
                            <div class="container-texto">
                                <p><?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEspacio['periodoConstruc']));
                                    echo($texto_con_br)
                                ?></p>
                            </div>
                        <h3>Función:<br></h3>
                            <div class="container-texto">
                                <p><?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEspacio['funcion']));
                                    echo($texto_con_br)
                                ?></p>
                            </div>
                        <div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="personajes">
                    <div class="container-section shadow">
                        <h2>Arquitecto o ingeniero que lo diseñó</h2>
                        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="card-title">Foto</div>
                        </div>
                        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="card-title">Edificio</div>
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
                                $texto_con_br = nl2br(htmlspecialchars($filaEspacio['contextoHistorico']));
                                echo($texto_con_br)
                            ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="descripcion">
                    <div class="container-section shadow">
                        <h2>Descripción del proyecto original</h2>
                        <h3>Plan urbanístico o política urbana:</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaDescrip['planUrbanistico']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <h3>Características particulares:</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaDescrip['caracteristicas']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <h3>Orientación:</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaDescrip['orientacion']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <h3>Dimensiones:</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaDescrip['dimensiones']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <h3>Secciones:</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaDescrip['secciones']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <h3>Elementos de la imagen urbana:</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaDescrip['elementos']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                        <h3>Tipos de edificaciones que rodean al espacio:</h3>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaDescrip['tiposEdifRodeando']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="transform">
                    <div class="container-section shadow">
                        <h2>Transformaciones del espacio</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEspacio['transformaciones']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="diseño">
                    <div class="container-section shadow">
                        <h2>Principios de diseño</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEspacio['principiosDiseño']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="importancia">
                    <div class="container-section shadow">
                        <h2>Importancia del espacio urbano</h2>
                        <div class="container-texto">
                            <p>
                                <?php 
                                    $texto_con_br = nl2br(htmlspecialchars($filaEspacio['importancia']));
                                    echo($texto_con_br);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

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
