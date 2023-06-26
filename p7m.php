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
$nombre=0;
// Crea un arreglo para almacenar las ubicaciones
$locations = array();
// Recorre cada línea del archivo
foreach ($lines as $line) {
  // Divide cada línea por comas
  $data = explode(',', $line);

  // Obtén los valores de nombre, latitud y longitud
  if (isset($data[0]) && isset($data[1])) {
  $nombre=$nombre++;
  $latitud = trim($data[0]);
  $longitud = trim($data[1]);
  }
  // Agrega la ubicación al arreglo de ubicaciones
  $locations[] = array($nombre,$latitud, $longitud);
}

// Genera el código JavaScript para el arreglo de ubicaciones
$jsLocations = json_encode($locations);

// Guarda el código JavaScript en un archivo temporal
$tempFile = tempnam(sys_get_temp_dir(), 'locations');
file_put_contents($tempFile, $jsLocations);
print_r($jsLocations);
 
?>
<script>
  // Convertir la cadena JSON en un objeto JavaScript
  var locations = JSON.parse('<?php echo $jsLocations; ?>');

  // Usar el array en JavaScript
  console.log(locations);
</script>

  <script>
    function initMap() {
      // Crear el mapa
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: {lat: 6.4735016, lng: -73.259444} // Coordenadas del centro del mapa
      });

      // Leer el archivo CSV y obtener las ubicaciones
      

      // Crear un arreglo para almacenar las coordenadas de los puntos
      var points = [];

      // Crear los marcadores y agregarlos al mapa
      for (var i = 0; i < locations.length; i++) {
        var location = locations[i];
        var latLng = new google.maps.LatLng(location[1], location[2]);
        points.push(latLng);

        var marker = new google.maps.Marker({
          position: latLng,
          map: map,
          title: location[0]
        });
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
