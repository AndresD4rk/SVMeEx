<?php
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
    <link rel="shortcut icon" href="../img/logoMER.webp" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mcss.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/fetch.js"></script>
</head>
<header class="bg-success">
        <div class="container-fluid">
        <div class="row mb-1"></div>
            <div class="row">
                <div class="col mb-1 ">
                    <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <span class="fa-solid fa-bars"></span>
                    </button>
                    <img src="../img/logoMER.webp" alt="..." style="height:40px;">
                    <span class="navbar-brand">ercaexpress</span>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="input-group ">
                        <a class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-fade"></i></a>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Buscar Producto">
                    </div>
                </div>
                <div class="d-none d-lg-block col-1 ">
                    <div class="d-flex justify-content-end mt-2">
                    <div class="d-none d-lg-block  me-1 mb-1 ">
                        <a href="" class="">
                            <span class="fa-solid fa-cart-shopping"></span>
                        </a>
                    </div>
                    <div class="d-none d-lg-block  me-1 mb-1 ">
                        <a href="" class="">
                            <span class="fa-solid fa-cart-shopping"></span>
                        </a>
                    </div>
                    <div class="d-none d-lg-block  me-1 mb-1 ">
                        <a href="" class="">
                            <span class="fa-solid fa-cart-shopping"></span>
                        </a>
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
            <div class="offcanvas-header">
                <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
                <div><img src="../img/logoMER.webp" alt="..." style="height:55px;">
                    <a class="navbar-brand mx-auto" style="font-size: 20px;">-----Menu-----</a>
                </div>
            </div>
            <div class="offcanvas-body">
                <p>Try scrolling the rest of the page to see this option in action.</p>
                <div class="col">
                    <div style="background-color:whitesmoke;">
                        <div class="card-body">
                            <h5 class="card-title">Productos</h5>
                            <a href="ListProd.php" class="card-text">Ver productos existentes</A>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="background-color:whitesmoke;">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                            <a href="ListUsu.php" class="card-text">Ver Usuarios existentes</A>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="background-color:whitesmoke;">
                        <div class="card-body">
                            <h5 class="card-title">Seguimiento de Pedido</h5>
                            <a href="SegPed.php" class="card-text">Ver Seguimiento de Pedidos</A>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div style="background-color:whitesmoke;">
                        <div class="card-body">
                            <h5 class="card-title">Salir</h5>
                            <a href="../procesos/CerSes.php" class="card-text">Ver Seguimiento de Pedidos</A>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="content-wrapper mt-5">
            <div class="container-fluid">
                <?php
                $cont = 0;
                $sql = $conexion->query("SELECT * FROM producto as p
                                        INNER JOIN categoria as c on p.idcat = c.idcat
                                        INNER JOIN familia as f on p.idfam = f.idfam
                                        INNER JOIN stock as s on p.idsto = s.idsto");
                echo '  <div class="card-group">
                        <div class="row align-content-center justify-content-center">';
                while ($datos = $sql->fetch_array()) {
                    $idpro = $datos['idpro'];
                    $nompro = $datos['nompro'];
                    $precio = $datos['precio'];
                    $nomcat = $datos['nomcat'];
                    $nomfam = $datos['nomfam'];
                    $cansto = $datos['cansto'];
                    $minsto = $datos['minsto'];                 
                        echo    '<div class="card col-md-4 mx-1 my-2" style="width: 18rem;">
                                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                                <div class="card-body">
                                <p class="card-title">' . $nompro . '</p>
                                <p class="card-text" >$ ' . number_format($precio) . '</p>      
                                <p class="card-text text-end"> ' . number_format($cansto) . '</p>                            
                                <div class="col-12 d-flex justify-content-end align-items-end">                                    
                                <button onclick="enviarFormularioCarrito('.$idpro.')" class="btn btn-success btn-sm me-2 mb-1 fa-solid fa-cart-shopping"></button>
                                </div>
                                </div></div>';                    
                }
                echo '</div></div>';
                ?>


            </div>
        </div>

        


    </main>
    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>


</html>

<!-- Fin Menu LATERAL -->
<!-- <div class="container-fluid ">
            <div class="row mx-auto">
                <div id="bgimgrespon" class="col-8 mx-auto" style="background-image: url(img/ibg1.png); height:80px;">
                    <h1 class="text-center">Aquí Van Anuncios XD</h1>
                </div>
                <div class="col-4 mx-auto" style="background-color:aqua;">
                    <h1>A</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
            <div class="col-2">
            <div class="card">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
            <div class="row col-10">
                <div class="card ">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card" id="carprod">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card ">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card ">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card ">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card ">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card ">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card ">
                    <img src="../img/producto.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tinks Thats is a Product</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>


            </div>
            </div>


            <p>

            </p> -->