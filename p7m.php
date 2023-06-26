<!DOCTYPE html>
<html>
<head>
  <title>Mapa con líneas</title>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="map"></div>
  <?php

// Lee el contenido del archivo de texto
$fileContents = file_get_contents('localizacion_Hola.txt');

// Divide el contenido del archivo por saltos de línea
$lines = explode("\n", $fileContents);

// Crea un arreglo para almacenar las ubicaciones
$locations = array();

// Recorre cada línea del archivo
foreach ($lines as $line) {
  // Divide cada línea por comas
  $data = explode(',', $line);

  // Obtén los valores de nombre, latitud y longitud
  $latitud = trim($data[2]);
  $longitud = trim($data[4]);

  // Agrega la ubicación al arreglo de ubicaciones
  $locations[] = array($latitud, $longitud);
}

// Genera el código JavaScript para el arreglo de ubicaciones
$jsLocations = 'var locations = ' . json_encode($locations) . ';';

// Guarda el código JavaScript en un archivo temporal
$tempFile = tempnam(sys_get_temp_dir(), 'locations');
file_put_contents($tempFile, $jsLocations);
 print_r($jsLocations)
?>
  <script>
    function initMap() {
      // Crear el mapa
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: 40.7128, lng: -74.0060} // Coordenadas del centro del mapa
      });

      // Leer el archivo CSV y obtener las ubicaciones
      var locations = [
        ['Lugar A', 40.1234, -74.5678],
        ['Lugar B', 40.9876, -74.4321],
        ['Lugar C', 41.1876, -74.4321],
        // Agrega más ubicaciones aquí en el formato ['Nombre', latitud, longitud]
      ];

      // Crear un arreglo para almacenar las coordenadas de los puntos
      var points = [];

      // Crear los marcadores y agregarlos al mapa
      for (var i = 0; i < locations.length; i++) {
        var location = locations[i];
        var latLng = new google.maps.LatLng(location[1], location[2]);
        points.push(latLng);

        /* var marker = new google.maps.Marker({
          position: latLng,
          map: map,
          title: location[0]
        }); */
      }

      // Crear una polilínea para unir los puntos
      var polyline = new google.maps.Polyline({
        path: points,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });

      // Agregar la polilínea al mapa
      polyline.setMap(map);
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc&callback=initMap" async defer></script>
</body>
</html>
