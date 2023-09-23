<?php
session_start();
include "../includes/conexion.php";
$rol = $_SESSION['rol'];
?>
<div class="container-fluid">
    <?php if ($rol == 2) { ?>
        <div class="row my-auto">
            <div class="col-8 col-sm-6 col-md-4 col-lg-3 my-2">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="../public/main.php"><img class="logonav" src="../assets/img/logoME.webp" alt="" style="height:40px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="d-block d-md-none col-4 col-sm-6 my-2 justify-content-end align-content-center">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-dark" type="button" onclick="carritocargar()" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1" aria-controls="offcanvasWithBothOptions">
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
                    <div class="d-none d-sm-block me-1 mb-1">
                        <button class="btn btn-outline-dark vercarrito" type="button" onclick="carritocargar()" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1" aria-controls="offcanvasWithBothOptions">
                            <span class="fa-solid fa-cart-shopping"></span>
                        </button>
                    </div>
                    <div class="d-none d-sm-block  me-1 mb-1 ">
                        <button class="btn btn-outline-dark" type="button" onclick="redirigirAPagina()">
                            <span class="fa-solid fa-receipt"></span>
                        </button>
                    </div>
                    <div class="d-none d-sm-block   mb-1 ">
                        <button class="btn btn-outline-dark" type="button" onclick="">
                            <span class="fa-solid fa-circle-user"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    <?php } else if ($rol == 3) { ?>
        <div class="row my-auto">
            <div class="col-8 my-2">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="../public/main.php"><img class="logonav" src="../assets/img/logoME.webp" alt="" style="height:40px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="col-4 my-2 justify-content-end align-content-center">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-dark me-1" type="button" onclick="goEntHab()">
                        <span class="fa-solid fa-truck-fast"></span>
                    </button>
                    <button class="btn btn-outline-dark" type="button" onclick="">
                        <span class="fa-solid fa-circle-user"></span>
                    </button>
                </div>
            </div>
        </div>
    <?php } else if ($rol == 1) { ?>
        <div class="row my-auto">
            <div class="col-8 my-2">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="../public/main.php"><img class="logonav" src="../assets/img/logoME.webp" alt="" style="height:40px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="col-4 my-2 justify-content-end align-content-center">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-dark me-1" type="button" onclick="goAddPro()">
                        <span class="fa-solid fa-circle-plus"></span>
                    </button>
                    <button class="btn btn-outline-dark" type="button" onclick="">
                        <span class="fa-solid fa-circle-user"></span>
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
function redirigirAPagina() {
    window.location.href = '../customers/HistoCompras.php';
}
function goEntHab(){
    window.location.href = '../employees/EntregasHabilitadas.php';
}
function goAddPro(){
    window.location.href = '../admin/AddProd.php';
}
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
