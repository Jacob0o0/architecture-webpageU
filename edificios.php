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
    
    <title>Edificios</title>
</head>
<body>
    <div class="nav-bar">barra de navegación
        <a href="index.php">Inicio</a>
        <a href="edificios.php">Edificios</a>
    </div>
    <div class="main-image">
        <div class="">
            <h1>Imagen del edificio</h1>
            <?php 
                $idEdificio = $_POST['id_edificio'];
                echo $idEdificio;
            ?>
            <h2>Nombre del edificio</h2>
        </div>
    </div>

    <div class="container">
        <div class="container-section">
            <h2>Género y tipología de edificio <br></h2>
            <h3>Uso actual <br></h3>
            <h4>Año o periodo de construcción <br></h4>
            <div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-section">
            <h2>Arquitecto o ingeniero que lo diseñó</h2>
            <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="card-title">Foto</div>
            </div>
            <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="card-title">Edificio</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-section">
            <h2>Ubicación</h2>
        </div>
    </div>

    <div class="container">
        <div class="container-section">
            <h2>Contexto Histórico</h2>
        </div>
    </div>

    <div class="container">
        <h2>Descripción del espacio arquitectónico</h2>

        <div class="container-section">
            <h3>Concepto</h3>
            <h3>Plantas Arquitectónicas</h3>
            <h3>Fachadas y ornamentos</h3>
        </div>

    </div>

    <div class="container">
        <h2>Corriente estilística</h2>
    </div>

    <div class="container">
        <h2>Materiales y sistemas constructivos empleados</h2>
    </div>

    <div class="container">
        <h2>Contexto urbano: Situación y emplazamiento</h2>
    </div>

    <div class="container">
        <h2>Transformaciones del espacio: Remodelaciones y/o adecuaciones</h2>
    </div>

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>