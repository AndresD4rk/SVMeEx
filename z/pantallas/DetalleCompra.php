<?php
session_start();
// if (empty($_SESSION['rol'])) {
//     header("location:page-404.html");
// }
include "../includes/conexion.php";
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
    <link rel="shortcut icon" href="../img/logoMER.webp" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/mcss.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/fetch.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=xxx&callback=initMap" async defer></script>
</head>
<header class="header-bg-color">
    <div class="container-fluid">
        <div class="row my-auto">
            <div class="col-8 col-sm-6 col-md-4 col-lg-3 my-2">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="main.php"><img class="logonav" src="../img/logoME.webp" alt="" style="height:40px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="d-block d-md-none col-4 col-sm-6 my-2 justify-content-end align-content-center">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-dark vercarrito" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1" aria-controls="offcanvasWithBothOptions">
                        <span class="fa-solid fa-cart-shopping"></span>
                    </button>
                </div>
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
    <!-- Inicio Menu TOP -->


    <!-- Fin Menu TOP -->

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
                    <h4><?php echo $_SESSION['nom1'] . " " . $_SESSION['ape1'] ?></h4>
                </div> -->
            </div>
            <div class="offcanvas-body">
                <div class="row justify-content-center align-content-center">
                    <div class="col-12  mb-2">
                        <a href="ListUsu.php" class="btn btn-dark w-100"><i class="fa-solid fa-user me-2"></i>Usuarios</a>
                    </div>
                    <div class="col-12  mb-2">
                        <a class="btn btn-dark w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1"><i class="fa-solid fa-cart-shopping me-2"></i>Carrito</a>
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
                        <a href="../procesos/CerSes.php" class="btn btn-dark w-100"><i class="fa-solid fa-door-closed me-2"></i>Salir</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Menu LATERAL -->
        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="container mt-sm-4 mt-2">
                <!-- Inicio Card Grupo De Carrito -->
                <div class="card-group d-block">
                    <h4 class="text-center">Carrito</h4>
                    <!-- Inicio Card De Carrito -->
                    <?php
                    $sql = $conexion->query("SELECT * FROM carrito as c 
                INNER JOIN detcarrito AS d ON d.idcar = c.idcar
                INNER JOIN producto AS p ON d.idpro=p.idpro
                WHERE c.idusu= " . $_SESSION['idusu'] . " AND estado = 1");
                    if (mysqli_num_rows($sql) > 0) {
                        while ($datos = $sql->fetch_array()) { ?>
                            <div class="card">
                                <div class="row p-1">
                                    <div class="col my-auto">
                                        <img src="https://via.placeholder.com/150" class="card-img" alt="Image">
                                    </div>
                                    <div class="col my-auto">
                                        <div class="row">
                                            <div class="col-12 card-body text-center">
                                                <h5 class="card-title"><?php echo $datos['nompro'] ?></h5>
                                                <p class="card-text"><?php echo $datos['precio'] ?></p>
                                                <p class="card-text"><?php echo $datos['canpro'] ?></p>
                                                <!-- <p class="card-text">Nose</p> -->
                                            </div>
                                            <div class="col-12 d-flex justify-content-end align-items-end">
                                                <button class="btn btn-secondary btn-sm me-1 mb-1 fa-solid fa-minus"></button>
                                                <button class="btn btn-secondary btn-sm me-2 mb-1 fa-solid fa-plus"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php
                                }
                                    ?>
                        <!-- Fin Card De Carrito -->
                </div>
                <!-- Fin Card Grupo De Carrito -->
                <div class="card mt-2" style=" background: none; border:none;">
                    <div class="d-flex justify-content-end align-content-end">
                        <div class="justify-content-end align-items-end me-1">
                            <button onclick="" class="btn btn-danger float-right">Cancelar</button>
                        </div>
                        <div class="justify-content-end align-items-end">
                            <button onclick="irCompras()" class="btn btn-success  float-right">Comprar</button>
                        </div>
                    </div>
                </div><?php
                    } else {
                        ?>
                <!-- Fin Card De Carrito -->
            </div>
            <!-- Fin Card Grupo De Carrito -->
            <h5 class="mt-5">Agregar producto al carrito</h5>
        <?php
                    }
        ?>
        </div>
        </div>
        <!-- Fin Carrito -->
        <div class="content-wrapper mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-xl-6 col-12">
                        <div class="progress m-2">
                            <div id="barentrega" class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <table class="table table-bordered" id="dataTable-1">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Entrega #</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
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
                                    $idcom = $datos['idcom'];
                                    $nompro = $datos['nompro'];
                                    $canpro = $datos['canpro'];
                                    echo  "<tr style='text-align: center;''> 
                        <td>$idcom</td>
                        <td>$nompro</td>
                        <td>$canpro</td>                                                        
                       ";
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>



                    <div class="col-xl-6 order-xl-last order-first col-12">
                        <div id="map" style="height: 500px;">
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
                    url: '../procesos/actualizar_localizacion.php?entrega=' + <?php echo number_format($ident) ?>, // Archivo PHP que actualiza la localización
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
                        setTimeout(actualizarContenido, 30000); // Actualiza cada 5 segundos (ajusta el tiempo según tus necesidades)
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



</html>
