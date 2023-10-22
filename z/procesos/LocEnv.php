<?php // Obtener las variables latitud y longitud
$lat = $_POST['lat'];
$lng = $_POST['lng'];

// Crear un array asociativo con las variables de localización
$localizacion = array(
    "latitud" => $lat,
    "longitud" => $lng
);

// Convertir el array en formato JSON
$contenidoJSON = json_encode($localizacion);

// Crear un nombre de archivo único
$nombreArchivo = 'localizacion_' . 'UwU' . '.json';

// Escribir el contenido JSON en el archivo
file_put_contents($nombreArchivo, $contenidoJSON);

// Mostrar un mensaje de éxito
echo "Las variables de localización se han recibido y procesado correctamente.";
?>