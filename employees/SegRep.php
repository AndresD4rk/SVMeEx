<?php
session_start();
if (empty($_SESSION['idusu'])) {
    echo '<script type="text/javascript">
  alert("Necesita iniciar sesión");
  history.back();
  </script>';
}
if (!(isset($_GET['ident']))) {
    echo '<script type="text/javascript">
    alert("No se registran entrega");
    history.back();
    </script>';
}
$ident = $_GET['ident'];
include "../includes/conexion.php";
?>
<!DOCTYPE html>

<head>
    <base href="" />
    <title>SVMeEx</title>
    <meta charset="utf-8" />
    <meta name="description" content="Supermercado Virtual MercaExpress" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="es_CO" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Supermercado Virtual MercaExpress" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="SVMeEx" />
    <link rel="shortcut icon" href="../assets/img/logoMER.webp" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/mcss.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand" rel="stylesheet">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/fetch.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc&callback=initMap" async defer></script>
    <script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>
<header class="header-bg-color" id="topheader"></header>

<body>
    <!-- Inicio Main -->
    <main>
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->

        <section>
            <div class="container-fluid text-center shadow">
                <div class="row">
                    <div class="col-12 h5 m-2">Dirección de entrega: <?php echo urldecode($_GET['dir']) ?></div>
                    <div class="col" id="map" style="height: 75vh;">
                    </div>
                </div>
            </div>
            <div class="row my-3 justify-content-between ">
                <div class="col ms-3">
                    <a class="btn btn-outline-danger" href="EntregasHabilitadas.php"><b>Regresar</b></a>
                </div>
                <div class="col me-3 text-end">
                    <a class="btn btn-outline-success" href="process/confent.php?id=<?php echo $ident ?>"><b>Confirmar entrega</b></a>
                </div>
            </div>

        </section>


    </main>

</body>
<script>
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else {
        console.log("La geolocalización no es compatible con este navegador.");
    }

    function showPosition(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        // var ident=0;
        console.log(lat, " ", lng);
        var cor = lat + " " + lng;
        //enviarUbicacion(0,lat,lng);
        /*  alert(cor); */
        // Crear un objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();
        // Definir la función de manejo de la respuesta
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Recibir la respuesta del servidor
                var respuesta = xhr.responseText;
                console.log(respuesta);
            }
        };
        // Configurar la petición
        xhr.open("POST", "process/actubi.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        // Convertir las variables en una cadena de consulta
        var data = "lat=" + lat + "&lng=" + lng + "&ident=" +
            <?php echo $ident; ?> + "&idrep=" + <?php echo $_SESSION['idusu']; ?>;
        // Enviar la petición
        xhr.send(data);
    }
</script>


<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15
        });

        var directionsService = new google.maps.DirectionsService(); // Servicio para calcular rutas
        var directionsRenderer = new google.maps.DirectionsRenderer({
            map: map
        }); // Renderizador de rutas

        var marker = new google.maps.Marker({
            map: map
        });

        if (navigator.geolocation) {
            var watchId = navigator.geolocation.watchPosition(function(position) {
              
            navigator.geolocation.getCurrentPosition(function(position) {
                var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                // marker.setPosition(latLng);
                // map.setCenter(latLng);
                var locations;
                // Aquí debes especificar la ubicación de destino a la que deseas obtener la ruta.
                $.ajax({
                    url: 'process/actualizar_localizacion.php?entrega=' + <?php echo number_format($ident) ?>, // Archivo PHP que actualiza la localización
                    success: function(data) {
                        if (data && data.length > 0) {
                            locations = data;
                            console.log(locations);
                            //console.log(locations[0].latrep); 
                            // dibujarRuta()
                  
                
                var request = {
                    origin: latLng,
                    destination: {
                        lat: parseFloat(locations[0].latent),
                        lng: parseFloat(locations[0].lonent)
                    },
                    travelMode: 'DRIVING' // Puedes cambiar el modo de viaje según tus necesidades: 'DRIVING', 'WALKING', 'TRANSIT', etc.
                };

                directionsService.route(request, function(result, status) {
                    if (status == 'OK') {
                        directionsRenderer.setDirections(result);
                    } else {
                        console.error('Error al calcular la ruta: ' + status);
                    }
                });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la solicitud AJAX:', error);
                    },
                    complete: function() {
                     
                        // Vuelve a llamar a la función después de cierto tiempo
                        // setTimeout(actualizarContenido, 30000); // Actualiza cada 5 segundos (ajusta el tiempo según tus necesidades)
                    }
                });
            
                // var destinoLatLng = new google.maps.LatLng(parseFloat(locations[0].latent), parseFloat(locations[0].lonent)); // Reemplaza destinoLat y destinoLng con las coordenadas del destino
            });
            });
        } else {
            console.log("La geolocalización no es compatible con este navegador.");
        }
    }
    //initMap();
</script>
<script>
    // Llamar a la función initMap() una vez que la página se haya cargado
    window.addEventListener('load', initMap);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>

</html>