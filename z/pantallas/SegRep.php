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
    <link rel="shortcut icon" href="../img/logoMER.webp" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/mcss.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/fetch.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=xxx&callback=initMap" async defer></script>
    <script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>
<!-- Inicio Menu TOP -->
<header class="header-bg-color">
    <div class="container-fluid">
        <div class="row my-auto">
            <div class="col-12 col-sm-12 col-md-4 col-lg-3 my-2">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="main.php"><img class="logonav" src="../img/logoME.webp" alt="" style="height:40px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="col-sm-12 col-md-5 col-lg-6 my-2 justify-content-center align-content-end">
                <div class="input-group ">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Buscar Producto">
                    <a class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-fade"></i></a>
                </div>
            </div>
            <div class="d-none d-md-block col-md-3 col-lg-3 col-3 my-2 justify-content-end align-content-center">
                <div class="d-flex justify-content-end">
                    <div class="d-none d-sm-block">
                        <button class="btn btn-outline-dark vercarrito" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1" aria-controls="offcanvasWithBothOptions">
                            <span class="fa-solid fa-cart-shopping"></span>
                        </button>
                        <!-- <a href="" class=""></a> -->
                    </div>
                    <div class="d-none d-sm-block  me-1 mb-1 ">
                        <button class="btn btn-outline-dark" type="button" onclick="redirigirAPagina()">
                            <span class="fa-solid fa-receipt"></span>
                        </button>
                    </div>
                    <div class="d-none d-sm-block  me-1 mb-1 ">
                        <button class="btn btn-outline-dark" type="button" onclick="">
                            <span class="fa-solid fa-circle-user"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>

<body>
    <!-- Inicio Main -->
    <main>
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header justify-content-center align-content-center mb-1  mb-md-2">
                <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
                <div class="">
                    <img class="logonav" src="../img/logoMER.webp" alt="..." style="height:55px;">
                    <a class="navbar-brand mx-auto align-text-top" style="font-size: 30px; color:#24262d;">enu</a>
                </div>
                <!-- <div>
                    <h4><?php //echo $_SESSION['nom1'] . " " . $_SESSION['ape1'] 
                        ?></h4>
                </div> -->
            </div>
            <div class="offcanvas-body">
                <div class="row justify-content-center align-content-center">
                    <div class="col-12  mb-2">
                        <a href="ListUsu.php" class="btn btn-dark w-100"><i class="fa-solid fa-user me-2"></i>Usuarios</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a class="btn btn-dark w-100 vercarrito" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1"><i class="fa-solid fa-cart-shopping me-2"></i>Carrito</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a href="Entregas.php" class="btn btn-dark w-100"><i class="fa-solid fa-truck-fast me-2"></i>Entregas</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a href="SegEnt.php" class="btn btn-dark w-100"><i class="fa-solid fa-magnifying-glass-location me-2"></i>Seguir entrega</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a href="HistoCompras.php" class="btn btn-dark w-100"><i class="fa-solid fa-clock-rotate-left me-2"></i></i>Historial de Compras</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a href="AddProd.php" class="btn btn-dark w-100"><i class="fa-solid fa-barcode me-2"></i>Agregar Producto</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a href="EntregasHabilitadas.php" class="btn btn-dark w-100"><i class="fa-solid fa-barcode me-2"></i>Entregas Disponibles</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a href="../procesos/CerSes.php" class="btn btn-dark w-100"><i class="fa-solid fa-door-closed me-2"></i>Salir</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Menu LATERAL -->
        <section>
            <div class="container-fluid text-center shadow">
                <div class="row">
                    <div class="col" id="map" style="height: 75vh;">
                    </div>
                </div>
            </div>
            <div class="row my-3 justify-content-between ">
                <div class="col ms-3">
                    <a class="btn btn-danger" href="#">Regresar entrega</a>
                </div>
                <div class="col me-3 text-end">
                    <a class="btn btn-success" href="#">Confirmar entrega</a>
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
        xhr.open("POST", "../procesos/actubi.php", true);
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
                    url: '../procesos/actualizar_localizacion.php?entrega=' + <?php echo number_format($ident) ?>, // Archivo PHP que actualiza la localización
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

    initMap();
</script>
<script>
    // Llamar a la función initMap() una vez que la página se haya cargado
    window.addEventListener('load', initMap);
</script>


</html>