<?php
session_start();
// if (empty($_SESSION['rol'])) {
//     header("location:page-404.html");
// }
include "../includes/conexion.php";
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
    <script src="../assets/js/fetch.js"></script>
</head>
<header class="header-bg-color" id="topheader"></header>

<body>

    <main class="container-fluid">
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->

        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->


        <div class="container-fluid">
            <div class="row">
                <form class="row" action="process/newcom2.php" method="POST">
                    <div class="col-12 mt-1 mb-3">
                        <h3 class="text-center">Datos de Entrega</h3>
                        <img src="../assets/img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-height: 150px; max-width: 150px;">
                    </div>
                    <!-- Direccio entrega -->
                    <div class="col-lg-6 col-12 mx-auto">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Dirección</label>
                        <select id="dirauto" class="form-select" aria-label="Default select example" name="dira" required>
                            <option value="" selected>Elija su Dirección</option>
                            <?php
                            $sql = $conexion->query("SELECT iddir,nomdir FROM direccion
                                WHERE idusu='" . $_SESSION['idusu'] . "'");
                            while ($datos = $sql->fetch_array()) {
                                echo '<option value="' . $datos['iddir'] . '">' . $datos['nomdir'] . '</option>';
                            }
                            ?>
                        </select>
                        <a id="btnewdir" class="btn btn-outline-warning mt-2" href="DireNew.php"><b>Agregar Dirección</b></a>
                        </div>
                    <!-- Descripcion de entrega -->
                    <!-- <div class="col-lg-6 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate">Descripción dirección/entrega</label>
                        <input type="text" class="form-control" name="detent" placeholder="Ingresa la descripción del producto">
                    </div> -->
                    <!-- VALOR DEL PRODUCTO -->
                    <?php
                    $sql = $conexion->query("SELECT tolcar FROM carrito
                                WHERE idusu='" . $_SESSION['idusu'] . "' AND estado = 1");
                    if ($datos = $sql->fetch_array()) {
                    ?>
                        <div class="col-lg-6 col-12  text-end mt-2 text-end">
                            <label for="exampleInputEmail1" class="form-label text-truncate me-2">
                                <h4>Total de compra: </h4>
                                <h1>$ <?php echo number_format(doubleval( $datos['tolcar'])) ?> </h1>
                            </label>
                            <input type="text" class="form-control" name="Precio" value="<?php echo number_format(doubleval( $datos['tolcar'])) ?>" required hidden>
                        </div><?php
                            }
                                ?>



                    <div class="row mt-5">
                        <div class="col-6 text-start"><a href="main.php" class="btn btn-outline-danger"><b>Regresar</b></a></div>
                        <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-outline-success"><b>Registrarse</b></button></div>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>

</html>