<?php
session_start();

// Obtener las variables lat y lng
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$nombreArchivo="rutdat.json";
// Verificar si las variables han cambiado
if (abs($_SESSION['lat'] - $lat) > 0.0003 || abs($_SESSION['lng'] - $lng) > 0.0003) {
  // Hacer el proceso que deseas cuando las variables han cambiado
  // ...

  // Por ejemplo, crear un array asociativo con las coordenadas
  $data = array(
    'lat' => $lat,
    'lng' => $lng
  );

  // Obtener el contenido existente del archivo (si existe)
  $existingData = array();
  if (file_exists($nombreArchivo)) {
    $existingData = json_decode(file_get_contents($nombreArchivo), true);
  }

  // Agregar las coordenadas al contenido existente
  $existingData[] = $data;

  // Guardar el contenido actualizado en el archivo
  file_put_contents($nombreArchivo, json_encode($existingData));

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
