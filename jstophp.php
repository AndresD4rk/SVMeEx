<?php
// Obtener las variables lat y lng
$lat = $_POST['lat'];
$lng = $_POST['lng'];

// Hacer lo que necesites con las variables
// ...

// Por ejemplo, puedes crear un archivo plano con las variables
$nombreArchivo = 'localizacion_' . "Hola" . '.txt';
$contenidoArchivo = "Latitud: " . $lat . ", Longitud: " . $lng;
file_put_contents($nombreArchivo, $contenidoArchivo);

// Devolver una respuesta
echo "Las variables de localización se han recibido y procesado correctamente.";
?>
