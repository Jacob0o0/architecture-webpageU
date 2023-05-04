<?php
require 'conexion.php';

// consulta la base de datos para obtener los municipios correspondientes al estado
$espacios = mysqli_query($conexion, "SELECT * FROM espacioUrbano");

// construye una cadena de opciones HTML con los municipios obtenidos
$options = '<option value="">Seleccione una opción.</option>';
if (mysqli_num_rows($espacios) > 0) {
    while ($fila = mysqli_fetch_assoc($espacios)) {
        $options .= "<option value='" . $fila["id"] . "'>" . $fila["espacioUrbNom"] . "</option>";
    }
} else {
    $options = "<option value=''>No hay edificios disponibles.</option>";
}

// devuelve la cadena de opciones HTML
echo $options;
?>