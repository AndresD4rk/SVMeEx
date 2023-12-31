<?php
session_start();
// if (empty($_SESSION['rol'])) {
//     header("location:page-404.html");
// }
include "../includes/conexion.php";
$entrega=$_GET['ident'];
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
    <!-- Inicio Main -->
    <main>
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->
        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->
    
        <div class="content-wrapper mt-3">
            <div class="container-fluid">
            <form class="row" action="process/initentrega.php" method="POST">
                    <div class="col-12">
                        <h1 class="text-center">Asignar Entrega</h1>
                        <img src="../assets/img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-height: 120px; max-width: 120px;">                        
                    </div>                   
                    <!-- Direccio entrega -->
                    <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Repartidor</label>
                        <select id="dirauto" class="form-select" aria-label="Default select example" name="idusu" required>
                            <option value="">Elija el Repartidor    </option>
                            <?php
                            $sql = $conexion->query("SELECT * 
                                FROM usuario WHERE rol=3");
                            while ($datos = $sql->fetch_array()) {
                                $nombre=$datos['prinom']." ".$datos['segnom']." ".$datos['priape']." ".$datos['segape'];
                                echo '<option value="' . $datos['idusu'] . '">' . $nombre . '</option>';
                            }
                            ?>
                        </select>                      
                    </div>
                    <!-- Descripcion de entrega -->
                    <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate">Entrega #</label>
                        <input type="text" class="form-control" name="" value="<?php echo $entrega;?>" required disabled>
                        <input type="text" class="form-control" name="ident" value="<?php echo $entrega;?>" required hidden>
                    </div>
                    <!-- Valor total -->
                    <div class="col-lg-4 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Total de compra</label>
                        <?php 
                            $sql = $conexion->query("SELECT tolcar FROM entrega AS e
                                INNER JOIN compra AS c ON e.idcom = c.idcom
                                INNER JOIN carrito AS a ON a.idcar = c.idcar                           
                             WHERE e.ident=$entrega");
                             if ($datos = $sql->fetch_array()) {
                                $total = number_format($datos['tolcar'],2);
                                echo"<input type='text' class='form-control' name='Precio' value= '$ $total' required disabled>";
                             }
                        ?>
                        
                    </div>
                    <div class="row mt-5">
                        <div class="col-6 text-start"><a onclick="history.back()" class="btn btn-outline-danger"><b>Regresar</b></a></div>
                        <div class="col-6 text-end mb-2"><button type="submit" class="btn btn-outline-success"><b>Iniciar</b></button></div>
                    </div>
                </form>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>
</html>