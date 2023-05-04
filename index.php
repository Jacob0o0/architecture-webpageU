<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
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
        <div class="container-texto">
            <p>
                El siglo XIX es importante para México por  representar los primeros pasos como nación independiente y con ello, un tiempo de profundos cambios sociales, políticos y económicos. Un tiempo convulso, caracterizado por constantes luchas  y contiendas ideológicas en esa constante búsqueda por definir el rumbo del naciente país. El quehacer arquitectónico, sin duda  no escapa a todas estas transformaciones  y es el reflejo de la “cultura” de la época, con todo lo que ello significa.
            </p>

            <p>
                “Espacio arquitectónico en México”  es el resultado de la colaboración de estudiantes de la carrera de Arquitectura  en la  Facultad de Estudios Superiores Acatlán ,UNAM,  que tiene como objetivo : el conocimiento, la  difusión  y revalorización del patrimonio arquitectónico  del siglo XIX  y principios del siglo XX desarrollado en la Ciudad de México.
            </p>

            <p>
                Es un espacio formado por y para estudiantes de arquitectura, así como para profesores ,arquitectos y para todo aquel interesado en conocer las características  del espacio arquitectónico  de toda una época, bajo una premisa:  si conocemos nuestro pasado podremos valorarlo y solo así construir nuestro futuro.
            </p>
        </div>
        <div class="container" style="display: flex; align-items: flex-end; margin: 0; padding-right: 50px;">
            <p class="caption-J"><em>Arq. Rosa Alejandra Guzmán Martínez</em></p>
            <p class="caption-J"><em>Profesora de la Facultad de Estudios Superiores Acatlán. UNAM</em></p>
            <p class="caption-J"><em>Arquitectura</em></p>
        </div>
    </div>


    <div class="container">
        <h2>Container de Urbanismo</h2>
        <?php 
                require 'backend/conexion.php';
                $espacio = mysqli_query($conexion, "SELECT * FROM espacioUrbano");

                while ($filaEspacio = mysqli_fetch_assoc($espacio)) {
                    $nombreEspacio = $filaEspacio['espacioUrbNom'];
                    $periodo = $filaEspacio['periodoConstruc'];
                
                    echo"<div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>$nombreEspacio</h5>
                                <p class='card-text'>$periodo</p>
                            </div>
                        </div>";
                }
        ?>
    </div>

    <div class="container">
        <h2>Container de Edificios</h2>
        <?php 
                require 'backend/conexion.php';
                $edificio = mysqli_query($conexion, "SELECT * FROM edificio");

                while ($filaEdif = mysqli_fetch_assoc($edificio)) {
                    $nombreEdif = $filaEdif['nombre'];
                    $contextoH = $filaEdif['contextoHistorico'];
                
                    echo"<div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>$nombreEdif</h5>
                                <p class='card-text'>$contextoH</p>
                            </div>
                        </div>";
                }
            ?>
    </div>

    <div class="container">
        <h2>Container de Biografias</h2>
        <?php 
            require 'backend/conexion.php';
            $personaje = mysqli_query($conexion, "SELECT * FROM personaje");

            while ($fila = mysqli_fetch_assoc($personaje)) {
                $nombrePer = $fila['nomPer'];
                $apellido = $fila['apellido'];
                $informacion = $fila['informacion'];
            
                echo"<div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nombrePer $apellido</h5>
                            <p class='card-text'>$informacion</p>
                        </div>
                    </div>";
            }
        ?>
    </div>

    <div class="footer footer-J">
        Pie de página
    </div>
</body>
</html>