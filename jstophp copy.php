<?php
session_start();

// Obtener las variables lat y lng
$lat = $_POST['lat'];
$lng = $_POST['lng'];

// Verificar si las variables han cambiado
if ($_SESSION['lat'] != $lat || $_SESSION['lng'] != $lng) {
  // Hacer el proceso que deseas cuando las variables han cambiado
  // ...

  // Por ejemplo, crear un archivo plano con las variables y mantener los datos existentes
  $nombreArchivo = 'localizacion_' . "Hola" . '.txt';
  $contenidoArchivo = $lat . "," . $lng . "\n";

  // Agregar el contenido al final del archivo
  file_put_contents($nombreArchivo, $contenidoArchivo, FILE_APPEND);

  // Actualizar las variables en la sesión
  $_SESSION['lat'] = $lat;
  $_SESSION['lng'] = $lng;

  // Devolver una respuesta
  echo "Las variables de localización se han recibido y procesado correctamente.";
} else {
  // Las variables no han cambiado
  echo "Las variables de localización no han cambiado.";
}
?>
