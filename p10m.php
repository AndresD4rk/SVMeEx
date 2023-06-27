<!DOCTYPE html>
<html>
<head>
  <title>Trazar ruta y seguimiento en Google Maps</title>
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
    var map, directionsService, directionsRenderer, latitud, longitud;

    function initMap() {
      // Crear el mapa
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16
      });

      // Crear un objeto de servicio de direcciones
      directionsService = new google.maps.DirectionsService();

      // Crear un objeto de renderizado de direcciones
      directionsRenderer = new google.maps.DirectionsRenderer({
        map: map
      });

      // Obtener la ubicación del usuario
      if (navigator.geolocation) {
        navigator.geolocation.watchPosition(function(position) {
          var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
          latitud = latLng.lat();
          longitud = latLng.lng();
          map.setCenter(latLng); // Centrar el mapa en la ubicación del usuario

          // Configurar la solicitud de ruta
          var request = {
            origin: {lat: latitud, lng: longitud}, // Coordenadas del origen
            destination: {lat: 6.4643976, lng: -73.2622745}, // Coordenadas del destino
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

        });
      } else {
        console.log("La geolocalización no es compatible con este navegador.");
      }
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc&callback=initMap" async defer></script>
</body>
</html>
