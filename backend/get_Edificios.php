<?php
require 'conexion.php';

// consulta la base de datos para obtener los municipios correspondientes al estado
$edificios = mysqli_query($conexion, "SELECT * FROM edificio");

// construye una cadena de opciones HTML con los municipios obtenidos
$options = '<option value="">Seleccione una opción.</option>';
if (mysqli_num_rows($edificios) > 0) {
    while ($fila = mysqli_fetch_assoc($edificios)) {
        $options .= "<option value='" . $fila["idEdificio"] . "'>" . $fila["nombre"] . "</option>";
    }
} else {
    $options = "<option value=''>No hay edificios disponibles.</option>";
}

// devuelve la cadena de opciones HTML
echo $options;
?>