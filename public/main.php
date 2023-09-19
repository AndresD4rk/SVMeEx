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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand" rel="stylesheet">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/fetch.js"></script>
</head>
<!-- Inicio Menu TOP -->
<header class="header-bg-color" id="topheader">

</header>
<!-- Fin Menu TOP -->

<body>
    <!-- Inicio Main -->
    <main>
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->

        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->

        <div class="content-wrapper mt-5">
            <div class="container-fluid">
                <?php
                $cont = 0;
                $sql = $conexion->query("SELECT * FROM producto as p
                                        INNER JOIN categoria as c on p.idcat = c.idcat                                        
                                        INNER JOIN inventario as s on p.idpro = s.idpro");
                echo '  <div class="card-group">
                            <div class="row align-content-center justify-content-center">';
                while ($datos = $sql->fetch_array()) {
                    $idpro = $datos['idpro'];
                    $nompro = $datos['nompro'];
                    $precio = $datos['precio'];
                    $nomcat = $datos['nomcat'];
                    $cansto = $datos['caninv'];
                    $minsto = $datos['mininv'];
                    $vensto = $cansto - $minsto;
                    echo '  <div class="card col-md-4 mx-1 my-2" style="width: 18rem;">                                
                                <img class="card-img-top mx-auto mt-1 img-fluid h-50" src="../assets/img/productos/' . $idpro . '.webp" alt="Card image cap">                            
                                <div class="card-body">
                                    <p class="card-title text-center fw-semibold">' . $nompro . '</p>                                   
                                    <p class="card-text">
                                        <div class= "row">
                                            <span class="col-sm text-sm-start col-12 text-center">' . $nomcat . '</span> 
                                            <span class="col-sm text-sm-end col-12 text-center"> Cant:' . number_format($cansto) . '</span>
                                        </div>
                                    </p>                            
                                    <p class="card-text text-end" >Precio: $' . number_format($precio) . '</p>   
                                    <div class="col-12 d-flex justify-content-end align-items-end">                                    
                                        <button onclick="enviarFormularioCarrito(' . $idpro . ',' . $vensto . ')" class="btn btn-success btn-sm me-2 mb-1 fa-solid fa-cart-shopping"></button>
                                    </div>
                                </div>
                            </div>';
                }
                echo '</div></div>';
                ?>
            </div>
        </div>




    </main>
    <!-- Footer -->
    <footer class="footer-bg-color text-light text-center py-1">
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
        </div>
    </footer>
    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>
</html>