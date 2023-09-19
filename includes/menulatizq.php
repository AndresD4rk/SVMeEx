<?php
session_start();
include "../includes/conexion.php";
$rol = $_SESSION['rol'];
?>
    <div class="offcanvas-header justify-content-center align-content-center mb-1  mb-md-2">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
        <div class="">
            <img class="logonav" src="../assets/img/logoMER.webp" alt="..." style="height:55px;">
            <a class="navbar-brand mx-auto align-text-top" style="font-size: 30px; color:#24262d;">enu</a>
        </div>
    </div>
    <div class="offcanvas-body">
        <div class="row justify-content-center align-content-center">
            <?php if ($rol == 1) { ?>
                <div class="col-12  mb-2">
                    <a href="../admin/ListUsu.php" class="btn btn-dark w-100"><i class="fa-solid fa-user me-2"></i>Usuarios</a>
                </div>
                <div class="col-12  mb-2">
                    <a href="../admin/Entregas.php" class="btn btn-dark w-100"><i class="fa-solid fa-truck-fast me-2"></i>Entregas</a>
                </div>
                <div class="col-12  mb-2">
                    <a href="../admin/AddProd.php" class="btn btn-dark w-100"><i class="fa-solid fa-circle-plus me-2"></i>Agregar Producto</a>
                </div>
            <?php } ?>
            <?php if ($rol == 2) { ?>
                <div class="col-12  mb-2">
                    <a class="btn btn-dark w-100" onclick="carritocargar()" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1"><i class="fa-solid fa-cart-shopping me-2"></i>Carrito</a>
                </div>
                <div class="col-12  mb-2">
                    <a href="../customers/SegEnt.php" class="btn btn-dark w-100"><i class="fa-solid fa-magnifying-glass-location me-2"></i>Seguir entrega</a>
                </div>
                <div class="col-12  mb-2">
                    <a href="../customers/HistoCompras.php" class="btn btn-dark w-100"><i class="fa-solid fa-clock-rotate-left me-2"></i></i>Historial de Compras</a>
                </div>
            <?php } ?>
            <?php if ($rol == 3) { ?>
                <div class="col-12  mb-2">
                    <a href="../employees/EntregasHabilitadas.php" class="btn btn-dark w-100"><i class="fa-solid fa-barcode me-2"></i>Entregas Disponibles</a>
                </div>
            <?php } ?>
            <div class="col-12  mb-2">
                <a href="../includes/CerSes.php" class="btn btn-dark w-100"><i class="fa-solid fa-door-closed me-2"></i>Salir</a>
            </div>
        </div>
    </div>