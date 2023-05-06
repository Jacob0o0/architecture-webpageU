<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    <title>Espacio Urbano</title>
</head>
<body>
    <div class="nav-bar">Barra navegación
        <a href="index.php">Inicio</a>
        <a href="edificios.php">Edificios</a>
        <a href="login.php">Login</a>
    </div>

    <div class="main-image"></div>

    <div class="container">
        <h2>Información</h2>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6" style="padding: 10px 30px 40px 30px;">
                <div class="container container-imagen" style="background-image: url(assets/images/san-rafael.jpg); height: 100%">
            </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6" style="margin: 0;">
                
                <div class="container-texto">
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
                <div class="container" style="display: flex; align-items: flex-end; margin: 0; padding-right: 50px;">
                    <p class="caption-J"><em>Arq. Rosa Alejandra Guzmán Martínez</em></p>
                    <p class="caption-J"><em>Profesora de la Facultad de Estudios Superiores Acatlán, UNAM</em></p>
                    <p class="caption-J"><em>Arquitectura</em></p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h2>Container de Urbanismo</h2>
        <div class="row" style="align-items: center;">
            <?php 
                require 'backend/conexion.php';
                // Consulta para obtener los datos del edificio y su imagen
                $sql = "SELECT e.id, e.espacioUrbNom, i.imagen FROM espacioUrbano e
                INNER JOIN imagenesObras i ON e.id = i.idEspacio
                WHERE i.idSeccion = 'MN'";

                $resultado = $conexion->query($sql);

                // Iterar sobre los resultados y generar un card HTML para cada edificio
                while ($filaEspacio = $resultado->fetch_assoc()) {
                    $idEspacio = $filaEspacio['id'];
                    $nombreEspacio = $filaEspacio['espacioUrbNom'];
                    $imagenEspacio = base64_encode($filaEspacio['imagen']);

                    // Generar el card HTML con el nombre y la imagen del edificio
                    echo '<div class="col-lg-4 col-md-6 col-md-6">';
                    echo '<div class="card">';
                    echo '<img src="data:image/jpeg;base64,' . $imagenEspacio . '" class="card-img-top img-fluid" alt="' . $nombreEspacio . '">';
                    echo '<form action="edificios.php" method="post">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $nombreEspacio . '</h5>';
                    echo '<input type="hidden" name="id_edificio" value="' . $idEspacio . '">';
                    echo '<button type="submit" class="btn btn-primary">Ver detalles</button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>

    <div class="container">
        <h2>Container de Edificios</h2>
        <div class="row" style="align-items: center;">
            <?php 
                require 'backend/conexion.php';
                // Consulta para obtener los datos del edificio y su imagen
                $sql = "SELECT e.idEdificio, e.nombre, i.imagen FROM edificio e
                INNER JOIN imagenesObras i ON e.idEdificio = i.idEdificio
                WHERE i.idSeccion = 'MN'";

                $resultado = $conexion->query($sql);

                // Iterar sobre los resultados y generar un card HTML para cada edificio
                while ($filaEdif = $resultado->fetch_assoc()) {
                    $idEdif = $filaEdif['idEdificio'];
                    $nombreEdif = $filaEdif['nombre'];
                    $imagenEdif = base64_encode($filaEdif['imagen']);

                    // Generar el card HTML con el nombre y la imagen del edificio
                    echo '<div class="col-lg-4 col-md-6 col-md-6">';
                    echo '<div class="card">';
                    echo '<img src="data:image/jpeg;base64,' . $imagenEdif . '" class="card-img-top img-fluid" alt="' . $nombreEdif . '">';
                    echo '<form action="edificios.php" method="post">';
                    echo '<div class="card-body">';
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

    <div class="container">
        <h2>Container de Biografias</h2>
        <div class="row" style="align-items: center;">
            <?php 
                require 'backend/conexion.php';
                // Consulta para obtener los datos del edificio y su imagen
                $sql = "SELECT p.idPersonaje, p.nomPer, i.imagen FROM personaje p
                INNER JOIN imagenesBiografias i ON p.idPersonaje = i.idPersonaje";

                $resultado = $conexion->query($sql);

                // Iterar sobre los resultados y generar un card HTML para cada edificio
                while ($filaPersonaje = $resultado->fetch_assoc()) {
                    $idPersonaje = $filaPersonaje['idPersonaje'];
                    $nombrePersonaje = $filaPersonaje['nomPer'];
                    $imagenPersonaje = base64_encode($filaPersonaje['imagen']);

                    // Generar el card HTML con el nombre y la imagen del edificio
                    echo '<div class="col-lg-4 col-md-6 col-md-6">';
                    echo '<div class="card">';
                    echo '<img src="data:image/jpeg;base64,' . $imagenPersonaje . '" class="card-img-top img-fluid" alt="' . $nombrePersonaje . '">';
                    echo '<form action="edificios.php" method="post">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $nombrePersonaje . '</h5>';
                    echo '<input type="hidden" name="id_edificio" value="' . $idPersonaje . '">';
                    echo '<button type="submit" class="btn btn-primary">Ver detalles</button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>

    <div class="footer footer-J">
        Pie de página
    </div>
</body>
</html>