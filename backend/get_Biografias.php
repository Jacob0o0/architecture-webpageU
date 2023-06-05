<?php
require 'conexion.php';

// consulta la base de datos para obtener los municipios correspondientes al estado
$biografias = mysqli_query($conexion, "SELECT * FROM personaje");

// construye una cadena de opciones HTML con los municipios obtenidos
$options = '<option value="">Seleccione una opción.</option>';
if (mysqli_num_rows($biografias) > 0) {
    while ($fila = mysqli_fetch_assoc($biografias)) {
        $options .= "<option value='" . $fila["idPersonaje"] . "'>" . $fila["nomPer"]. " " . $fila["apellido"] . "</option>";
    }
} else {
    $options = "<option value=''>No hay edificios disponibles.</option>";
}

// devuelve la cadena de opciones HTML
echo $options;
?>