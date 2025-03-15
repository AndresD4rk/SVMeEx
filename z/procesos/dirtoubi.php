<?php
// Dirección que deseas convertir en ubicación
$direccion = "Carrera 15 12 32, Socorro, Santander, Colombia";

// Llave de API de Google Maps
$api_key = "xxx";

// Construye la URL de la solicitud
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($direccion) . "&key=" . $api_key;

// Realiza la solicitud a la API de Google Maps
$response = file_get_contents($url);

// Decodifica la respuesta JSON
$data = json_decode($response);

// Verifica si la solicitud fue exitosa y si se encontraron resultados
if ($data && $data->status === "OK" && !empty($data->results)) {
    // Obtiene las coordenadas de latitud y longitud
    $latitud = $data->results[0]->geometry->location->lat;
    $longitud = $data->results[0]->geometry->location->lng;

    // Ahora tienes las coordenadas de la dirección
    echo "Latitud: $latitud, Longitud: $longitud";
} else {
    echo "No se encontraron resultados para la dirección proporcionada.";
}
?>