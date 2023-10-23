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
    <!-- Inicio Main -->
    <main>
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->
        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <h4>Compras</h4>
                </div>
                <div class="col-12">
                    <table class="table table-responsive table-hover" id="dataTable-1">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Detalles</th>                                
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idusu = $_SESSION['idusu'];
                            $sql = $conexion->query("SELECT * FROM compra AS c
                        INNER JOIN carrito AS a ON a.idcar=c.idcar
                        INNER JOIN entrega AS e ON e.idcom=c.idcom
                        WHERE a.idusu=$idusu AND a.estado =2                 
                        ORDER BY c.feccom");
                            while ($datos = $sql->fetch_array()) {
                                $numcompra = $datos['idcom'];
                                $nument = $datos['ident'];
                                $fecha = $datos['feccom'];
                                $direccion = $datos['dirent'];
                                $detalle = $datos['detent'];                                                              
                                echo  "<tr style='text-align: center;''> 
                        <th>$numcompra</th>
                        <td>$fecha</td>
                        <td>$direccion</td>  
                        <td>$detalle</td>                                                         
                       ";
                                echo '<td>                                   
                      <a class="btn btn-success" href="HisCom.php?idcom=' . $numcompra . '&ident=' . $nument . '">Ver</a>';                               
                                echo '                        
                 
                    </td>
                  </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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