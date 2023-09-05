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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                <img class="logonav" src="../img/logoME.webp" alt="..." style="height:40px;">
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

    <main>
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
                            <button onclick="" class="btn btn-success  float-right">Comprar</button>
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


        <div class="container-fluid">
            <div class="row">
                <form class="row" action="../procesos/newcom.php" method="POST">
                    <div class="col-12">
                        <h1 class="text-center">Confirmacion de Compra y Entrega</h1>
                        <img src="../img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-height: 170px; max-width: 170px;">
                        <h2 class="text-center">Registro de Productos</h2>
                    </div>                   
                    <!-- Direccio entrega -->
                    <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Dirección</label>
                        <select id="dirauto" class="form-select" aria-label="Default select example" name="dira" required>
                            <option value="">Elija su Dirrección</option>
                            <?php
                            $sql = $conexion->query("SELECT * 
                                FROM categoria");
                            while ($datos = $sql->fetch_array()) {
                                echo '<option value="' . $datos['idcat'] . '">' . $datos['nomcat'] . '</option>';
                            }
                            ?>
                        </select>
                        <input type="text" class="form-control" id="dirmanual" name="dirm" placeholder="Ingresa la Dirección" style="display: none;">
                        <button id="btnewdir" type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(1)">Agregar Categoria</button>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="dircambiar" checked>
                            <label class="form-check-label" for="dircambiar">Manual/Auto</label>
                        </div>
                    </div>
                    <!-- Descripcion de entrega -->
                    <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate">Descripción dirrección/entrega</label>
                        <input type="text" class="form-control" name="detent" placeholder="Ingresa la descripción del producto" required>
                    </div>
                    <!-- VALOR DEL PRODUCTO -->
                    <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Total de compra</label>
                        <input type="number" class="form-control" name="Precio" value="100000" required disabled>
                    </div>


                    <div class="row mt-5">
                        <div class="col-6 text-start"><a href="main.php" class="btn btn-warning">Regresar</a></div>
                        <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>

<script>
    // Obtiene referencias a los elementos del DOM
    var checkbox = document.getElementById('dircambiar');
    var dirauto = document.getElementById('dirauto');
    var dirmanual = document.getElementById('dirmanual');
    var btnewdir = document.getElementById('btnewdir');
    // Agrega un evento de cambio al checkbox
    checkbox.addEventListener('change', function() {
        // Muestra u oculta el input activo según el estado del checkbox
        if (checkbox.checked) {
            dirauto.style.display = 'block';
            btnewdir.style.display = 'block';
            dirmanual.style.display = 'none';
            dirmanual.value = '';            
            dirauto.required = true;
            dirmanual.required = false;                   
        } else {
            dirauto.style.display = 'none';
            btnewdir.style.display = 'none';
            dirmanual.style.display = 'block';
            dirauto.value = 0;
            dirauto.required = false;
            dirmanual.required = true;           
        }
    });
</script>

</html>