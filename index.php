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
    <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>


    <!-- Scrollreveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <title>Espacio Urbano</title>
</head>
<body class="overflow-x-hidden">

<div class="container col-12" style="padding-left: 0px; padding-right: 0px;">
    <div id="container-carga">
        <div id="carga"></div>
    </div>
    <div class="row col-12" style="padding-left: 0px; padding-right: 0px; margin-left: 0px; margin-left: 0px; background-color: #1A1A1A;">
        
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
                                <a class="nav-link" href="#top">
                                    <i class="bi bi-house-door-fill"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#info">
                                    <i class="bi bi-info-circle-fill"></i>
                                    <span>Información</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#espacios">
                                    <i class="bi bi-bank"></i>
                                    <span>Espacios</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#edificios">
                                    <i class="bi bi-buildings-fill"></i>
                                    <span>Edificios</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#biografias">
                                    <i class="bi bi-people-fill"></i>
                                    <span>Biografías</span>
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
        <div class="col-lg-10 col-md-12 col-sm-12" style="background-color: #1A1A1A; padding-left: 0px; padding-right: 0px; margin: auto; display: flex; flex-direction: column; align-items: center;  border-radius: 20px;">

            <div class="" style="padding-left: 0px; padding-right: 0px; margin: 0px; display: flex; flex-direction: column; align-items: center; border-radius: 20px; width: 100%; background-color: #fff;">

                <!-- MAIN IMAGE -->
                <div class="col-lg-12 col-md-12 col-sm-12 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="top">
                    <div class="main-image"></div>
                </div>

                <div class="divider"></div>

                <!-- GENERAL INFORMATION -->
                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="info">
                    <div class="container-section shadow">
                        <h2>Información</h2>
                        <div class="row" style="display: none;" id="info-collapse">
                            <div class="col-sm-12 col-md-6 col-lg-6" style="padding: 10px 30px 40px 30px;">
                                <div class="container-section container-imagen" style="background-image: url(assets/images/san-rafael.jpg); height: 100%">
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6" style="margin: 0;">
                                
                                <div class="container-texto" style="margin: 0; width: 100%">
                                    <p>
                                        El siglo XIX es importante para México por  representar los primeros pasos como nación independiente y con ello, un tiempo de profundos cambios sociales, políticos y económicos. Un tiempo convulso, caracterizado por constantes luchas  y contiendas ideológicas en esa constante búsqueda por definir el rumbo del naciente país. El quehacer arquitectónico, sin duda  no escapa a todas estas transformaciones  y es el reflejo de la “cultura” de la época, con todo lo que ello significa.
                                    </p>
                        
                                    <p>
                                        “Espacio arquitectónico en México”  es el resultado de la colaboración de estudiantes de la carrera de Arquitectura  en la  Facultad de Estudios Superiores Acatlán, UNAM,  que tiene como objetivo : el conocimiento, la  difusión  y revalorización del patrimonio arquitectónico  del siglo XIX  y principios del siglo XX desarrollado en la Ciudad de México.
                                    </p>
                        
                                    <p>
                                        Es un espacio formado por y para estudiantes de arquitectura, así como para profesores ,arquitectos y para todo aquel interesado en conocer las características  del espacio arquitectónico  de toda una época, bajo una premisa:  si conocemos nuestro pasado podremos valorarlo y solo así construir nuestro futuro.
                                    </p>
                                </div>
                                <div class="" style="display: flex; flex-direction: column; align-items: flex-end; margin: 0; padding-right: 50px;">
                                    <p class="caption-J"><em>Arq. Rosa Alejandra Guzmán Martínez</em></p>
                                    <p class="caption-J"><em>Profesora de la Facultad de Estudios Superiores Acatlán, UNAM</em></p>
                                    <p class="caption-J"><em>Arquitectura</em></p>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <button class="btn btn-primary" id="mostrarContenido" style="border-radius: 50px;">
                            <i class="bi bi-arrow-bar-down"></i>
                        </button>
                        <div class="divider"></div>
                    </div>
                </div>
                
                <!-- ESPACIOS URBANOS -->
                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px; text-align: center;" id="espacios">
                    <div class="container-section shadow">
                        <h2>Espacios Urbanos</h2>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                            <?php 
                                require 'backend/conexion.php';
                                // Consulta para obtener los datos del edificio y su imagen
                                $sql = "SELECT e.id, e.espacioUrbNom, i.imagen FROM espacioUrbano e
                                        INNER JOIN imagenesObras i ON e.id = i.idEspacio
                                        WHERE i.idSeccion = 'MN'
                                        ORDER BY e.espacioUrbNom ASC";
                    
                                $resultado = $conexion->query($sql);
                    
                                // Iterar sobre los resultados y generar un card HTML para cada espacio
                                while ($filaEspacio = $resultado->fetch_assoc()) {
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
                            ?>
                        </div>
                    </div>
                </div>

                <!-- EDIFICIOS -->
                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="edificios">
                    <div class="container-section shadow">
                        <h2>Edificios</h2>
                        <div class="divider"></div>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                            <div class="category-list">
                                <a href="" class="category-item" category="All">Todos</a>
                                <a href="" class="category-item" category="Cultura">Cultura</a>
                                <a href="" class="category-item" category="Comercio">Comercio</a>
                                <a href="" class="category-item" category="Vivienda">Vivienda</a>
                                <a href="" class="category-item" category="Exposiciones">Exposiciones</a>
                                <a href="" class="category-item" category="Educación">Educación</a>
                                <a href="" class="category-item" category="Iglesias">Iglesias</a>
                                <a href="" class="category-item" category="Gobierno">Gobierno</a>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                            <?php 
                                require 'backend/conexion.php';
                                // Consulta para obtener los datos del edificio, su imagen y el género
                                $sql = "SELECT e.idEdificio, e.nombre, e.idGeneroEdif, g.nombreGenero, i.imagen FROM edificio e
                                        INNER JOIN generos g ON e.idGeneroEdif = g.idGenero
                                        INNER JOIN imagenesObras i ON i.idEdificio = e.idEdificio
                                        WHERE i.idSeccion = 'MN'
                                        ORDER BY e.nombre ASC";
                                // $sql = "SELECT e.idEdificio, e.nombre, i.imagen FROM edificio e
                                // INNER JOIN imagenesObras i ON e.idEdificio = i.idEdificio
                                // WHERE i.idSeccion = 'MN'";
                    
                                $resultado = $conexion->query($sql);
                    
                                // Iterar sobre los resultados y generar un card HTML para cada edificio
                                while ($filaEdif = $resultado->fetch_assoc()) {
                                    $idEdif = $filaEdif['idEdificio'];
                                    $nombreEdif = $filaEdif['nombre'];
                                    $imagenEdif = base64_encode($filaEdif['imagen']);
                                    $nombreGenero = $filaEdif['nombreGenero'];
                    
                                    // Generar el card HTML con el nombre y la imagen del edificio
                                    echo '<div class="col-lg-4 col-md-6 col-md-6 edif-card" category="'.$nombreGenero.'">';
                                    echo '<div class="card shadow">';
                                    echo '<img src="data:image/jpeg;base64,' . $imagenEdif . '" class="card-img-top img-fluid" alt="' . $nombreEdif . '">';
                                    echo '<form action="edificios.php" method="post">';
                                    echo '<div class="card-body d-flex flex-column">';
                                    echo '<h5 class="card-title">' . $nombreEdif . '</h5>';
                                    echo '<input type="hidden" name="id_edificio" value="' . $idEdif . '">';
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

                <!-- BIOGRAFIAS -->
                <div class="col-lg-11 col-md-11 col-sm-11 seccion_Pag" style="padding-left: 0px; padding-right: 0px;" id="biografias">
                    <div class="container-section shadow">
                        <h2>Biografias</h2>
                        <div class="row col-12" style="align-items: center; justify-content: center;">
                            <?php 
                                require 'backend/conexion.php';
                                // Consulta para obtener los datos del personaje y su imagen
                                $sql = "SELECT p.idPersonaje, p.nomPer, p.apellido, i.imagen FROM personaje p
                                        INNER JOIN imagenesBiografias i ON p.idPersonaje = i.idPersonaje
                                        ORDER BY p.nomPer ASC";
                    
                                $resultado = $conexion->query($sql);
                    
                                // Iterar sobre los resultados y generar un card HTML para cada personaje
                                while ($filaPersonaje = $resultado->fetch_assoc()) {
                                    $idPersonaje = $filaPersonaje['idPersonaje'];
                                    $nombrePersonaje = $filaPersonaje['nomPer'];
                                    $apellidoPersonaje = $filaPersonaje['apellido'];
                                    $imagenPersonaje = base64_encode($filaPersonaje['imagen']);
                    
                                    // Generar el card HTML con el nombre y la imagen del personaje
                                    echo '<div class="col-lg-4 col-md-6 col-md-6">';
                                    echo '<div class="card shadow">';
                                    echo '<img src="data:image/jpeg;base64,' . $imagenPersonaje . '" class="card-img-top img-fluid" alt="' . $nombrePersonaje . '">';
                                    echo '<form action="biografias.php" method="post">';
                                    echo '<div class="card-body">';
                                    echo '<h5 class="card-title">' . $nombrePersonaje . ' ' . $apellidoPersonaje .'</h5>';
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
                        <a href="https://www.instagram.com/alien_bones_px/" style="color: #F1E71E; padding-right: 10px;"><i class="bi bi-instagram" style="font-size: 30px;"></i></a>
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
    <script src="js/filtros.js"></script>
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

            var contenidoVisible = false; // Variable de estado
            var infoDiv = document.getElementById('info-collapse');
            document.getElementById('mostrarContenido').addEventListener('click', function() {
                
                if (contenidoVisible) {
                    gsap.to(infoDiv, { opacity: 0, height: 0, duration: 0.5, onComplete: hideContent }); // Animación para ocultar contenido
                    contenidoVisible = false; // Actualizar estado
                    this.innerHTML = '<i class="bi bi-arrow-bar-down"></i>';
                    // this.textContent = '<i class="bi bi-arrow-bar-down"></i>'; // Cambiar texto del botón
                } else {
                    showContent();
                    gsap.fromTo(infoDiv, { opacity: 0, height: 0 }, { opacity: 1, height: 'auto', duration: 0.5 }); // Animación para mostrar contenido
                    contenidoVisible = true; // Actualizar estado
                    this.innerHTML = '<i class="bi bi-arrow-bar-up"></i>'; // Cambiar texto del botón
                }
            });

            function hideContent() {
                infoDiv.style.display = 'none'; // Ocultar completamente el contenido después de la animación
            }

            function showContent() {
                infoDiv.style.display = 'flex'; // Mostrar el contenido antes de la animación para obtener su altura
                var height = infoDiv.clientHeight; // Obtener la altura del contenido
                infoDiv.style.height = '0'; // Establecer la altura inicial en 0 antes de la animación
                infoDiv.style.overflow = 'hidden'; // Ocultar cualquier desbordamiento durante la animación
                infoDiv.offsetHeight; // Forzar una lectura del diseño para aplicar la altura inicial correctamente
                infoDiv.style.height = height + 'px'; // Establecer la altura del contenido antes de la animación
            }
        });
    </script>
</body>
</html>