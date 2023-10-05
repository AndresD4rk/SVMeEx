<?php
session_start();
// if (empty($_SESSION['rol'])) {
//     header("location:page-404.html");
// }
include "../procesos/conexion.php";
?>


<!DOCTYPE html>
<html lang="es">

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
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/fetch.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc&callback=initMap" async defer></script>
</head>
<header class="header-bg-color" id="topheader">

</header>

<body>
    <!-- Inicio Main -->
    <main>
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->
        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->

        <div class="content-wrapper mt-1">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-xl-4 col-12">
                        <div class="progress m-2">
                            <div id="barentrega" class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <table class="table table-responsive table-hover" id="dataTable-1">
                        
                            <thead>
                            <tr class="text-center">
                                    <th scope="col" colspan="2">Lista de Compra</th>
                                </tr>
                                <tr style="text-align: center;">
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $vtotalcompra = 0;
                                $idcom = $_GET['idcom'];
                                $ident = $_GET['ident'];
                                $sql = $conexion->query("SELECT * FROM compra AS c
                        INNER JOIN carrito AS a ON a.idcar=c.idcar
                        INNER JOIN detcarrito AS d ON d.idcar=a.idcar
                        INNER JOIN producto AS p ON p.idpro=d.idpro
                        WHERE c.idcom=$idcom                  
                        ORDER BY c.feccom");
                                while ($datos = $sql->fetch_array()) {

                                    $nompro = $datos['nompro'];
                                    $canpro = $datos['canpro'];
                                    echo  "<tr style='text-align: center;''> 
                        
                        <td>$nompro</td>
                        <td>$canpro</td>                                                        
                       ";
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>



                    <div class="col-xl-8 order-xl-last order-first col-12">
                        <div id="map" style="height: 80vh;">
                        </div>
                    </div>
                </div>
            </div>




    </main>
    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script>
    function redirigirAPagina() {
        // Cambia 'nombre-de-tu-pagina.html' por la URL de la página a la que deseas redirigir.
        window.location.href = 'Compras.php';
    }
</script>

<script>
    //alert(locations);
    var map, directionsService, directionsRenderer, latitud, longitud;

    function initMap() {
        // Crear el mapa
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 0,
                lng: 0
            },
            zoom: 8
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
        //dibujarRuta();
        var locations;
        $(document).ready(function() {
            // Función para actualizar el contenido
            function actualizarContenido() {
                $.ajax({
                    url: '../employees/process/actualizar_localizacion.php?entrega=' + <?php echo number_format($ident) ?>, // Archivo PHP que actualiza la localización
                    success: function(data) {
                        if (data && data.length > 0) {
                            locations = data;
                            console.log(locations);
                            //console.log(locations[0].latrep); 
                            dibujarRuta()
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la solicitud AJAX:', error);
                    },
                    complete: function() {
                        // Vuelve a llamar a la función después de cierto tiempo
                        setTimeout(actualizarContenido, 5000); // Actualiza cada 5 segundos (ajusta el tiempo según tus necesidades)
                    }
                });
            }
            actualizarContenido();
            // Inicia la actualización inicial del contenido


            function dibujarRuta() {
                // Configurar la solicitud de ruta
                // var supermark = {lat:6.4689837,lng:-73.2631887};
                var puntoA = new google.maps.LatLng(6.4689837, -73.2631887);
                // var domi = {lat: parseFloat(locations[0].latrep),lng: parseFloat(locations[0].lonrep)};
                var puntoC = new google.maps.LatLng(parseFloat(locations[0].latrep), parseFloat(locations[0].lonrep));
                // var entrega = {lat: parseFloat(locations[0].latent),lng: parseFloat(locations[0].lonent)};
                var puntoB = new google.maps.LatLng(parseFloat(locations[0].latent), parseFloat(locations[0].lonent));
                var request = {
                    origin: {
                        lat: parseFloat(locations[0].latrep),
                        lng: parseFloat(locations[0].lonrep)
                    }, // Coordenadas del origen
                    destination: {
                        lat: parseFloat(locations[0].latent),
                        lng: parseFloat(locations[0].lonent)
                    }, // Coordenadas del destino
                    travelMode: google.maps.TravelMode.DRIVING // Modo de transporte (puedes cambiarlo según tus necesidades)
                };
                //alert(locations + "Hola")
                // Obtener la ruta utilizando el servicio de direcciones
                directionsService.route(request, function(result, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        // Mostrar la ruta en el mapa
                        directionsRenderer.setDirections(result);
                        var distancia_total = google.maps.geometry.spherical.computeDistanceBetween(puntoA, puntoB);
                        var distancia_recorrida = google.maps.geometry.spherical.computeDistanceBetween(puntoC, puntoB);
                        var fixdistancia = distancia_total - distancia_recorrida;
                        var progreso = (fixdistancia * 100) / distancia_total;
                        console.log('Progreso de entrega: ' + progreso.toFixed(2) + '%');
                        var barentrega = document.getElementById('barentrega');
                        barentrega.style.width = progreso + '%';

                    } else {
                        // Manejar el caso de error
                        window.alert('No se pudo trazar la ruta: ' + status);
                    }
                });

            }

        });

    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>

</html>