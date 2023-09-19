<?php
// Ruta del archivo JSON
$jsonFilePath = 'rutdat.json';
$ident = $_GET['entrega'];

// Lee el contenido del archivo JSON
$jsonContents = file_get_contents($jsonFilePath);

// Decodifica el contenido JSON en un arreglo asociativo
$locations = json_decode($jsonContents, true);

// Verificar si la decodificación fue exitosa
if ($locations === null) {
    // Error al decodificar JSON
    // Maneja el error apropiadamente aquí
    die("Error al decodificar el archivo JSON.");
}
$filteredLocations = array_filter($locations, function ($location) use ($ident) {
  return isset($location["ident"]) && $location["ident"] == $ident;
});
// Recorre cada ubicación en el arreglo
// foreach ($filteredLocations as $location) {
//     // Obtener los valores de nombre, latitud y longitud si están definidos
//     if (isset($location["ident"])) {
//       $ident1= $location["ident"];
//       if ( $ident == $ident1) {
//         $idrep = isset($location["idrep"]) ? trim($location["idrep"]) : '';
//         $latrep = isset($location["latrep"]) ? trim($location["latrep"]) : '';
//         $lonrep = isset($location["lonrep"]) ? trim($location["lonrep"]) : '';
//         $latent = isset($location["latent"]) ? trim($location["latent"]) : '';
//         $lonent = isset($location["lonent"]) ? trim($location["lonent"]) : '';
//         // Actualizar los valores en el arreglo
//         $location["idrep"] = $idrep;
//         $location["latrep"] = $latrep;
//         $location["lonrep"] = $lonrep;
//         $location["latent"] = $latent;
//         $location["lonent"] = $lonent;
//       }
//       else{
        
//       }
//     }else{
//       $Ms=json_encode("vacio");
//       echo $Ms;
//     }
    
// }

// Convertir el arreglo de ubicaciones a JSON
// $jsonLocations = json_encode($locations);
$jsonLocations = json_encode(array_values($filteredLocations));
// Configurar las cabeceras HTTP para indicar que la respuesta es JSON
header('Content-Type: application/json');

// Enviar la respuesta JSON al cliente
echo $jsonLocations;
