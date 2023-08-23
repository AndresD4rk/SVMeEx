<?php
// Lee el contenido del archivo de texto
$fileContents = file_get_contents('../localizacion_UwU.txt');

// Divide el contenido del archivo por saltos de línea
$lines = explode("\n", $fileContents);
$nombre = 0;
// Crea un arreglo para almacenar las ubicaciones
$locations = array();
// Recorre cada línea del archivo
foreach ($lines as $line) {
  // Divide cada línea por comas
  $data = explode(',', $line);

  // Obtén los valores de nombre, latitud y longitud
  if (isset($data[0]) && isset($data[1])) {
    $nombre = $nombre + 1;
    $latitud = trim($data[0]);
    $longitud = trim($data[1]);
    // Agrega la ubicación al arreglo de ubicaciones
    $locations[] = array($nombre, $latitud, $longitud);
  }
}

// Genera el código JavaScript para el arreglo de ubicaciones
$jsLocations = json_encode($locations);

// Devuelve los datos de localización como respuesta JSON
header('Content-Type: application/json');
echo $jsLocations;
?>
