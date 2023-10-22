
<!DOCTYPE html>
<html lang="es">
<?php 
session_start();
include "../procesos/conexion.php";
$rol = $_SESSION['rol'];
?>
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
    <!-- <link rel="stylesheet" href="./css/pcss.css"> -->    
    <script src="../js/fetch.js"></script>
    <script src="../js/reusehtml.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>

</head>
<header class="header-bg-color" id="ruheader">
    <script>
        mostrartopmenu()
    </script>
</header>

<body>
    <main class="container-fluid align-items-center justify-content-center">
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
                    <?php if ($rol == 1) { ?>
                        <div class="col-12  mb-2">
                            <a href="ListUsu.php" class="btn btn-dark w-100"><i class="fa-solid fa-user me-2"></i>Usuarios</a>
                        </div>
                        <div class="col-12  mb-2">
                            <a href="Entregas.php" class="btn btn-dark w-100"><i class="fa-solid fa-truck-fast me-2"></i>Entregas</a>
                        </div>
                        <div class="col-12  mb-2">
                            <a href="AddProd.php" class="btn btn-dark w-100"><i class="fa-solid fa-barcode me-2"></i>Agregar Producto</a>
                        </div>
                    <?php } ?>
                    <?php if ($rol == 2) { ?>
                        <div class="col-12  mb-2">
                            <a class="btn btn-dark w-100 vercarrito" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1"><i class="fa-solid fa-cart-shopping me-2"></i>Carrito</a>
                        </div>
                        <div class="col-12  mb-2">
                            <a href="SegEnt.php" class="btn btn-dark w-100"><i class="fa-solid fa-magnifying-glass-location me-2"></i>Seguir entrega</a>
                        </div>
                        <div class="col-12  mb-2">
                            <a href="HistoCompras.php" class="btn btn-dark w-100"><i class="fa-solid fa-clock-rotate-left me-2"></i></i>Historial de Compras</a>
                        </div>
                    <?php } ?>
                    <?php if ($rol == 3) { ?>
                        <div class="col-12  mb-2">
                            <a href="EntregasHabilitadas.php" class="btn btn-dark w-100"><i class="fa-solid fa-barcode me-2"></i>Entregas Disponibles</a>
                        </div>
                    <?php } ?>
                    <div class="col-12  mb-2">
                        <a href="../procesos/CerSes.php" class="btn btn-dark w-100"><i class="fa-solid fa-door-closed me-2"></i>Salir</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Menu LATERAL -->
        
        <form class="row" action="../procesos/newprod.php" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <h1 class="text-center">MercaExpress</h1>
                <img src="../img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-height: 170px; max-width: 170px;">
                <h2 class="text-center">Registro de Productos</h2>
            </div>
            <!-- FAMILIA DEL PRODUCTO
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Familia</label>
                            <select class="form-select" aria-label="Default select example" name="SelFam" required>
                            <option value="">Elija una Familia</option>
                                <?php
                                // $sql = $conexion->query("SELECT * 
                                // FROM familia");
                                // while ($datos = $sql->fetch_array()) {
                                //     echo '<option value="' . $datos['idfam'] . ';">' . $datos['nomfam'] . '</option>';
                                // }
                                ?>
                            </select>
                            <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(2)">Agregar Familia</button>
                        </div> -->
            <!-- NOMBRE DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate">Nombre del Producto</label>
                <input type="text" class="form-control" name="NomPro" placeholder="Ingresa el nombre del Producto" required>
            </div>
            <!-- DESCRIPCION DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate">Descripción del producto</label>
                <input type="text" class="form-control" name="despro" placeholder="Ingresa la descripción del producto" required>
            </div>
            <!-- VALOR DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate ">Valor del Producto</label>
                <input type="number" class="form-control" name="Precio" placeholder="Ingresa el valor del producto" required>
            </div>
            <!-- IMAGEN DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate">Imagen del producto</label>
                <input type="file" class="form-control" name="pimg" accept="image/*" required>
            </div>
            <!-- CANTIDAD DEL PRODUCTO -->
            <div class="col">
                <label for="exampleInputEmail1" class="form-label text-truncate">Cantidad del producto</label>
                <input type="number" class="form-control" name="CanSto" placeholder="Ingresa el stock inicial del producto" required>
            </div>
            <!-- STOCK MINIMO DEL PRODUCTO -->
            <div class="col">
                <label for="exampleInputEmail1" class="form-label text-truncate text-truncate">Cantidad minima del producto</label>
                <input type="number" class="form-control" name="MinSto" placeholder="Ingresa el stock minimo del producto" required>
            </div>
            <!-- CATEGORIA DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate ">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="SelCat" required>
                    <option value="">Elija una Categoria</option>
                    <?php
                    $sql = $conexion->query("SELECT * 
                                FROM categoria");
                    while ($datos = $sql->fetch_array()) {
                        echo '<option value="' . $datos['idcat'] . '">' . $datos['nomcat'] . '</option>';
                    }
                    ?>
                </select>
                <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(1)">Agregar Categoria</button>
            </div>

            <div class="row mt-5">
                <div class="col-6 text-start"><a href="main.php" class="btn btn-warning">Regresar</a></div>
                <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
            </div>

        </form>
        <div class="offcanvas offcanvas-top h-50" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" class>
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="formularioContainer">
            </div>
        </div>

    </main>
</body>


</html>