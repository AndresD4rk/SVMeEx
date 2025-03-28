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




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var locations;
        $(document).ready(function() {
            // Función para actualizar el contenido
            function actualizarContenido() {
                $.ajax({
                    url: 'actualizar_localizacion.php', // Archivo PHP que actualiza la localización
                    success: function(data) {
                        // Procesa los datos recibidos y actualiza la página según sea necesario
                        // Aquí puedes agregar tu lógica para actualizar el mapa u otros elementos de la página


                        // Ejemplo: Actualizar el mapa con los nuevos datos de localización
                        // Aquí deberías utilizar la biblioteca o el código específico para tu mapa
                        // para actualizar las ubicaciones con los datos recibidos en `data`
                        locations = data;
                        console.log(locations);
                        dibujarRuta()
                    },
                    complete: function() {
                        // Vuelve a llamar a la función después de cierto tiempo
                        setTimeout(actualizarContenido, 5000); // Actualiza cada 5 segundos (ajusta el tiempo según tus necesidades)
                    }
                });
            }

            // Inicia la actualización inicial del contenido
            actualizarContenido();
        });






        //alert(locations);
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
        }

        function dibujarRuta() {
            // Configurar la solicitud de ruta
            var request = {
                origin: {
                    lat: parseFloat(locations[0][1]),
                    lng: parseFloat(locations[0][2])
                }, // Coordenadas del origen
                destination: {
                    lat: parseFloat(locations[1][1]),
                    lng: parseFloat(locations[1][2])
                }, // Coordenadas del destino
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
    <script src="https://maps.googleapis.com/maps/api/js?key=xxx&callback=initMap" async defer></script>
</body>

</html>