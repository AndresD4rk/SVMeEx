<?php
// Obtener las variables latitud y longitud
$lat = $_POST['lat'];
$lng = $_POST['lng'];

// Hacer lo que necesites con las variables
// ...

// Por ejemplo, puedes crear un archivo plano con las variables
$nombreArchivo = 'localizacion_' . 'UwU' . '.txt';
$contenidoArchivo = $lat . "," . $lng."\n".
                    "6.4643976,-73.2622745";
file_put_contents($nombreArchivo, $contenidoArchivo);

// Mostrar un mensaje de éxito
echo "Las variables de localización se han recibido y procesado correctamente.";
