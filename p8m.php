<!DOCTYPE html>
<html>
<head>
  <title>Trazar ruta en Google Maps</title>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="map"></div>
  <script>
    function initMap() {
      // Crear el mapa
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: 6.4668441, lng: -73.2620121} // Coordenadas del centro del mapa
      });

      // Coordenadas de origen y destino
      var origen = {lat: 6.4668441, lng: -73.2620121}; // Coordenadas del origen
      var destino = {lat: 6.4643976, lng: -73.2622745}; // Coordenadas del destino

      // Crear un objeto de servicio de direcciones
      var directionsService = new google.maps.DirectionsService();

      // Crear un objeto de renderizado de direcciones
      var directionsRenderer = new google.maps.DirectionsRenderer();

      // Asociar el objeto de renderizado de direcciones con el mapa
      directionsRenderer.setMap(map);

      // Configurar la solicitud de ruta
      var request = {
        origin: origen,
        destination: destino,
        travelMode: google.maps.TravelMode.DRIVING // Modo de transporte (puedes cambiarlo según tus necesidades)
      };

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
