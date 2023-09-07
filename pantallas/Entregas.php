<?php
session_start();
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
    <script src="../js/fetch.js"></script>
</head>
<header class="header-bg-color">
    <div class="container-fluid">
        <div class="row mb-1"></div>
        <div class="row">
            <div class="col mb-1 ">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="main.php"><img class="logonav" src="../img/logoME.webp" alt="..." style="height:40px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="input-group ">
                    <a class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-fade"></i></a>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Buscar Producto">
                </div>
            </div>
            <div class="d-none d-lg-block col-1 ">
                <div class="d-flex justify-content-end">
                    <div class="d-none d-lg-block">
                        <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1" aria-controls="offcanvasWithBothOptions">
                            <span class="fa-solid fa-cart-shopping"></span>
                        </button>
                        <!-- <a href="" class=""></a> -->
                    </div>
                    <div class="d-none d-lg-block  me-1 mb-1 ">                        
                        <button class="btn btn-outline-dark" type="button" onclick="redirigirAPagina()">
                            <span class="fa-solid fa-receipt"></span>
                        </button>
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
                WHERE c.idusu= ".$_SESSION['idusu']." AND estado = 1");
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
            <table class="table table-bordered" id="dataTable-1">
                      <thead>
                        <tr style="text-align: center;">
                          <th>Entrega #</th>
                          <th>Fecha</th>
                          <th>Direccion</th>
                          <th>Detalles</th>
                          <th>Estado</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = $conexion->query("SELECT * FROM entrega AS e
                        INNER JOIN compra AS c ON e.idcom=c.idcom
                        ORDER BY c.feccom AND e.estent");
                        while ($datos = $sql->fetch_array()) {
                          $ident = $datos['ident'];
                          $dirent = $datos['dirent'];
                          $detent = $datos['detent'];
                          $estent = $datos['estent'];                        
                          $idcom = $datos['idcom']; 
                          $feccom = $datos['feccom'];                           
                        echo  "<tr style='text-align: center;''> 
                        <td>$ident</td>
                        <td>$feccom</td>
                        <td>$dirent</td>  
                        <td>$detent</td> 
                        <td>$estent</td>                                 
                       ";
                          echo '<td>
                      <div class="row">
                      <a class="col" href="deletebook.php?variable=' . $idcom . '">Eliminar</a>';
                            if ($estent==0){
                                echo '<a class="col" href="../pantallas/InitEntrega.php?ident=' . $ident . '">Iniciar entrega</a>';
                            }
                      echo '                        
                      </div>
                    </td>
                  </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
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

</html>