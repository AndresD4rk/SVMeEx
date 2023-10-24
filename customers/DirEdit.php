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
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/fetch.js"></script>
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
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->

        <main class="container-fluid mt-2">
            <?php
            $sql = $conexion->query("SELECT * FROM direccion                    
            WHERE iddir=" . $_GET['dirid'] . "
            ");
            if ($sql &&  mysqli_num_rows($sql) > 0) {    
                $datos = $sql->fetch_array();               
                $parts = explode(', ', $datos['nomdir']);
                $nomdir = $parts[0]; 
                $muni = $parts[1];      
            ?>

            <form id="formid" action="process/editdir.php" method="POST">
                <div class="mb-4">
                    <h2 class="text-center">Actualizar Dirección</h2>
                    <img src="../assets/img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-width:150px; max-height:150px;">
                </div>
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-6 mb-3 mt-3">
                            <input type="text" class="form-control" name="dirid" value="<?php echo $datos['iddir'] ?>" hidden required>
                            <label for="exampleInputEmail1" class="form-label ">Dirección</label>
                            <input type="text" class="form-control" name="direccion" value="<?php echo $nomdir?>" required>
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Municipio</label>
                            <input type="text" class="form-control" name="municipio" value="<?php echo $muni ?>" required>
                        </div>
                        <div class="col-12 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Detalle</label>
                            <input type="text" class="form-control" name="detalle" value="<?php echo $datos['detdir'] ?>">
                        </div>

                        <!-- <div class="col-5 mb-3 mt-3">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Rol</label>
                        <select id="select-categoria" class="form-select" aria-label="Default select example" name="SelRol" required>                            
                            <option value="2">Cliente</option>
                            <option value="3">Repartidor</option>
                            <option value="4">Empleado</option>
                            <option value="1">Administrador</option>                            
                        </select>                       
                    </div>
                </div>                 -->

                        <div class="row">
                            <div class="col-6 text-start"><a onclick="history.back()" class="btn btn-outline-danger"><b>Regresar</b></a></div>
                            <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-outline-success"><b>Actualizar</b></button></div>
                        </div>


                    </div>
                </div>
            </form>
            <?php }?>
        </main>




    </main>

    </footer>

    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>
</html>