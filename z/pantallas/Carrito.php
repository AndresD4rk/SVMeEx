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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/mcss.css">
    <script src="../js/bootstrap.js"></script>
</head>
<header class="bg-success">
    <div class="container-fluid">        
        <div class="row p-1">
            <div class="col my-auto p-1">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="main.php"><img src="../img/logoME.webp" alt="..." style="height:50px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="col-sm-12 col-lg-7 my-auto p-1">
                <div class="input-group ">
                    <a class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-fade"></i></a>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Buscar Producto">
                </div>
            </div>
            <div class="d-none d-lg-block col-2 my-auto p-1">
                <div class="d-flex justify-content-end mt-2">
                    <div class="d-none d-lg-block  me-1 mb-1 ">
                        <a href="" class="me-1">
                            <span style="color:f5f1f0;" class="fa-solid fa-cart-shopping bg"></span>
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
    <main>
        <div class="container mt-sm-4 mt-2">
            <!-- Inicio Card Grupo De Carrito -->
            <div class="card-group">
                <!-- Inicio Card De Carrito -->
                <?php
                
                ?>
                <div class="card">
                    <div class="row p-1">
                        <div class="col-sm-3 col-4 my-auto">
                            <img src="https://via.placeholder.com/150" class="card-img" alt="Image">
                        </div>
                        <div class="col-sm-9 col my-auto">
                            <div class="row">
                                <div class="col-12 card-body text-center">
                                    <h5 class="card-title">Name Product</h5>
                                    <p class="card-text">Precio</p>
                                    <p class="card-text">Cantidad</p>
                                    <p class="card-text">Nose</p>
                                </div>
                                <div class="col-12 d-flex justify-content-end align-items-end">
                                    <button class="btn btn-secondary btn-sm me-1 mb-1 fa-solid fa-minus"></button>
                                    <button class="btn btn-secondary btn-sm me-2 mb-1 fa-solid fa-plus"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Card De Carrito -->
            </div>
            <!-- Fin Card Grupo De Carrito -->
            <div class="card mt-2" style=" background: none; border:none;">
                <div class="d-flex justify-content-end align-content-end">
                    <div class="justify-content-end align-items-end me-1">
                        <button class="btn btn-danger float-right">Cancelar</button>
                    </div>
                    <div class="justify-content-end align-items-end">
                        <button class="btn btn-success  float-right">Relizar Compra</button>
                    </div>
                </div>

            </div>

        </div>


    </main>
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>


</html>