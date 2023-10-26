<?php
session_start();
if (empty($_SESSION['rol'])) {
    header("location:page-404.html");
}
include "../includes/conexion.php";
$rol = $_SESSION['rol'];
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc" async defer></script>
    <script src="../assets/js/fetch.js"></script>
</head>
<!-- Inicio Menu TOP -->
<header class="header-bg-color" id="topheader">

</header>
<!-- Fin Menu TOP -->

<body>
    <!-- Inicio Main -->
    <main class="mb-5">
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->

        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->

        <main class="container-fluid mt-2">
            <form id="formid" action="process/newdir2.php" method="POST">
                <div class="mb-4">
                    <h2 class="text-center">Nueva Dirección</h2>
                    <img src="../assets/img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-width:150px; max-height:150px;">
                </div>
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Dirección</label>
                            <input type="text" id="lat" class="form-control" name="lat" required hidden>
                            <input type="text" id="lng" class="form-control" name="lng" required hidden> 
                            <input type="text" id="dir" class="form-control" name="direccion" placeholder="Ejemplo (Carrera 1 12 3)" required>
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Municipio</label>
                            <input type="text" id="mun" class="form-control" name="municipio" placeholder="Ingrese el Municipio" required>
                        </div>
                        <div class="col-12 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Detalle</label>
                            <input type="text" class="form-control" name="detalle" placeholder="Describa la Dirección">
                        </div>
                        <div class="col-12" id="map" style="height: 75vh;">
                        </div>
                        <!-- <div class="col-5 mb-3 mt-3">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Rol</label>
                        <select id="select-categoria" class="form-select" aria-label="Default select example" name="SelRol" required>                            
                            <option value="2">Cliente</option>
                            <option value="3">Repartidor</option>
                            <option value="4">Empleado</option>
                            <option value="1">Administrador</option>                            
                        </select>                       
                    </div>
                </div>                 -->

                        <div class="row">
                            <!-- <div class="col-6 text-start"><a onclick="history.back()" class="btn btn-outline-danger"><b>Regresar</b></a></div> -->
                            <div class="col-6 text-end   mb-2"><a  onclick="formid.submit()" class="btn btn-outline-success"><b>Registrar</b></a></div>
                        </div>


                    </div>
            </form>

        </main>




    </main>
    <!-- Footer -->
    <!-- <footer class="footer-bg-color text-light text-center py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2023 SVMeEx</p>
            </div>
            <div class="col-md-6">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Inicio</a></li>
                    <li class="list-inline-item"><a href="#">Productos</a></li>
                    <li class="list-inline-item"><a href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </div> -->
    </footer>

    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>

</html>



<script>
    const miFormulario = document.getElementById("formid");
    miFormulario.addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe
        // Realiza aquí otras acciones, como validar o procesar datos
    });

    var myLatLng;
    var flat = document.getElementById('lat');
    var flng = document.getElementById('lng');

    function showPosition(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        console.log(lat, " ", lng);
        myLatLng = {
            lat: lat,
            lng: lng
        };

    }



    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            // Aquí puedes realizar la acción que desees cuando se pulsa Enter.
            const apiKey = "AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc";
            var ddir = document.getElementById('dir');
            var dmun = document.getElementById('mun');
            var dir = ddir.value;
            var mun = dmun.value;
            var direccion = dir + ", " + mun + ", Santander, Colombia";
            console.log(direccion);
            const url = `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(direccion)}&key=${apiKey}`;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Verifica si la solicitud fue exitosa y si se encontraron resultados
                    if (data.status === "OK" && data.results.length > 0) {
                        // Obtiene las coordenadas de latitud y longitud
                        const latitud = data.results[0].geometry.location.lat;
                        const longitud = data.results[0].geometry.location.lng;

                        // Haz algo con las coordenadas (por ejemplo, imprímelas en la consola)
                        console.log("Latitud:", latitud);
                        console.log("Longitud:", longitud);
                        myLatLng = {
                            lat: latitud,
                            lng: longitud
                        };
                        flat.value = latitud;
                        flng.value = longitud;
                        initMap();
                    } else {
                        console.log("No se encontraron resultados para la dirección proporcionada.");
                    }
                })
                .catch(error => {
                    console.error("Hubo un error en la solicitud:", error);
                });
        }
    });





    function initMap() {
        console.log(myLatLng);
        if (myLatLng == undefined) {

        } else {
            //     if (navigator.geolocation) {
            //     //navigator.geolocation.watchPosition(showPosition);
            //     navigator.geolocation.watchPosition(showPosition);        
            // } else {
            //     console.log("La geolocalización no es compatible con este navegador.");
            // }  
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 18,
                center: myLatLng,
            });

            marker = new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello World!",
            });
            map.addListener('click', function(event) {
                moverMarcador(event.latLng);
            });
        }

        function moverMarcador(latLng) {
            // Mueve el marcador a la ubicación donde se hizo clic
            marker.setPosition(latLng);
            console.log(myLatLng);
            myLatLng = {
                lat: latLng.lat(),
                lng: latLng.lng()
            };
            console.log(myLatLng);
            flat.value = latLng.lat();
            flng.value = latLng.lng();
        }
        //window.initMap = initMap;
        //initMap();
    }
</script>
<script>
    // Llamar a la función initMap() una vez que la página se haya cargado
    //  window.addEventListener('load', initMap);
</script>