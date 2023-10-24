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
    <div class="row">
    <div class="col text-start ms-4 my-auto">
    <a id="fechcomp"></a>
    </div>
    <div class="col text-end m-1">      
      <a class="btn btn-outline-danger" href="HistoCompras.php"><b>Regresar</b></a>
    </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <table class="table table-responsive table-hover mb-0 max-heigh-100 text-center align-middle" id="dataTable-1">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $vtotalcompra = 0;
              $idcom = $_GET['idcom'];
              $sql = $conexion->query("SELECT * FROM compra AS c
                        INNER JOIN carrito AS a ON a.idcar=c.idcar
                        INNER JOIN detcarrito AS d ON d.idcar=a.idcar
                        INNER JOIN producto AS p ON p.idpro=d.idpro
                        WHERE c.idcom=$idcom                  
                        ORDER BY c.feccom");
              $VCompra;
              $fecha;
              while ($datos = $sql->fetch_array()) {
                $ident = $datos['idcom'];
                $nompro = $datos['nompro'];
                $canpro = number_format($datos['canpro']);
                $precio = number_format($datos['precom']);
                $stotal = number_format($datos['canpro'] * $datos['precom']);
                $fecha = $datos['feccom'];
                $VCompra = $datos['tolcar'];
                if ($VCompra == 0) {
                  $VCompra = -777;
                }
                echo  "<tr>                         
                        <td>$nompro</td>
                        <td>$canpro</td>    
                        <td>$ $precio</td> 
                        <td>$ $stotal</td>                                                       
                        </tr>";
              }

              $timestamp = strtotime($fecha);
              $fecha_formateada = date('d/m/Y H:i:s', $timestamp);
              

              ?>
              <script>
                var afecha = document.getElementById("fechcomp");
                afecha.innerHTML = "<b>Fecha de compra: </b><?php echo $fecha_formateada?>";
              </script>
              <tr class="fs-4">
                <td></td>
                <th colspan="2" class='text-end'>Total de compra:</th>
                <td colspan="" class='text-center'><b><i>$</i> <?php echo number_format($VCompra) ?></b></td>
                </td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>



</html>