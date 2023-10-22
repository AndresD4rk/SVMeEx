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
$fileContents = file_get_contents('localizacion_UwU.txt');

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
  $nombre=$nombre+1;
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
  
    var map, directionsService, directionsRenderer, latitud, longitud;
    function initMap() {
        
      // Crear el mapa
      map = new google.maps.Map(document.getElementById('map'), {
        // zoom: 16,
        //center: {lat: 6.4668441, lng: -73.2620121} // Coordenadas del centro del mapa
      });

      /* var marker = new google.maps.Marker({
          map: map
        }); */

      // Crear un objeto de servicio de direcciones
      directionsService = new google.maps.DirectionsService();

      // Crear un objeto de renderizado de direcciones
      directionsRenderer = new google.maps.DirectionsRenderer({
    map: map,
  });
      
      // Asociar el objeto de renderizado de direcciones con el mapa
      directionsRenderer.setMap(map);

// Configurar la solicitud de ruta
var request = {
        origin: {lat: parseFloat(locations[0][1]),lng: parseFloat(locations[0][2])}, // Coordenadas del origen
        destination: {lat: parseFloat(locations[1][1]),lng: parseFloat(locations[1][2])}, // Coordenadas del destino
        travelMode: google.maps.TravelMode.DRIVING // Modo de transporte (puedes cambiarlo según tus necesidades)
      };
      //alert(locations + "Hola")
      // Obtener la ruta utilizando el servicio de direcciones
      directionsService.route(request, function(result, status) {
        if (status === google.maps.DirectionsStatus.OK) {
          // Mostrar la ruta en el mapa
          directionsRenderer.setDirections(result);

         
        } else {
          // Manejar el caso de error
          window.alert('No se pudo trazar la ruta: ' + status);
        }
      });

          }

    
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc&callback=initMap" async defer></script>
</body>
</html>
