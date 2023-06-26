<?php
// Obtener las variables lat y lng
$lat = $_POST['lat'];
$lng = $_POST['lng'];

// Hacer lo que necesites con las variables
// ...

// Por ejemplo, puedes crear un archivo plano con las variables y mantener los datos existentes
$nombreArchivo = 'localizacion_' . "Hola" . '.txt';
$contenidoArchivo = $lat . "," . $lng . "\n";

// Agregar el contenido al final del archivo
file_put_contents($nombreArchivo, $contenidoArchivo, FILE_APPEND);

// Devolver una respuesta
echo "Las variables de localización se han recibido y procesado correctamente.";
?>
