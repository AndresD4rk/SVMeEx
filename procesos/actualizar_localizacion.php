<?php
// Lee el contenido del archivo JSON
$jsonFilePath = '../rutdat.json';
$jsonContents = file_get_contents($jsonFilePath);

// Decodifica el contenido JSON en un arreglo asociativo
$locations = json_decode($jsonContents, true);
$nombre = 0;
// Crea un arreglo para almacenar las ubicaciones
$locations = array();
// Recorre cada ubicación en el arreglo
foreach ($locations as $location) {
    $nombre = ;
    $latitud = $location["latitud"];
    $longitud = $location["longitud"];
    
    // Hacer algo con las variables, por ejemplo, imprimirlas
   // Divide cada línea por comas
  $data = explode(',', $line);

  // Obtén los valores de nombre, latitud y longitud
  if (isset($data[0]) && isset($data[1])) {
    $nombre = $nombre + 1;
    $latitud = trim($location["latitud"]);
    $longitud = trim($location["longitud"]);
    // Agrega la ubicación al arreglo de ubicaciones
    $locations[] = array($nombre, $latitud, $longitud);
  }
} echo $locations;
?>