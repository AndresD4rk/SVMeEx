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
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/fetch.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <?php
        if ($rol == 1) {
        ?>
            <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
            <div class=" container-fluid mt-3" id="dashadmin">
                <script>
                    $.ajax({
                        type: "GET",
                        url: "../admin/DashAdmin.php", // Reemplaza con la URL de tu script PHP que obtiene el carrito
                        success: function(data) {
                            // Actualizar la sección del carrito con los datos recibidos
                            $("#dashadmin").html(data);
                        }
                    });
                </script>
            </div><?php
                }
                    ?>
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->
        <?php
        if ($rol == 2) {
        ?>
            <div class="content-wrapper mt-5" id="getprod">
            <?php
        } ?>
            <?php
            if ($rol == 3) {
            ?>
                <script>
                    window.location="../employees/EntregasHabilitadas.php"
                </script>
            <?php
            }
            ?>

            </div>




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
<script src="../assets/js/reusephp.js"></script>

</html>