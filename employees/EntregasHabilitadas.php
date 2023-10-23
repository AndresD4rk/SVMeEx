<?php
session_start();
// if (empty($_SESSION['rol'])) {
//     header("location:page-404.html");
// }
include "../includes/conexion.php";
$idusu = $_SESSION['idusu'];
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

    <div class="content-wrapper mt-5">
      <div class="container-fluid">
        <table class="table table-responsive table-hover" id="dataTable-1">
          <thead>
            <tr style="text-align: center;">
              <th scope="col">Entrega #</th>
              <th scope="col">Fecha</th>
              <th scope="col">Direccion</th>
              <th scope="col">Detalles</th>
              <th scope="col">Estado</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = $conexion->query("SELECT * FROM entrega AS e
                        INNER JOIN compra AS c ON e.idcom=c.idcom
                        INNER JOIN entregarepartidor AS n ON e.ident=n.ident
                        WHERE n.idusu=$idusu AND e.estent=1
                        ORDER BY c.feccom AND e.estent");
            while ($datos = $sql->fetch_array()) {
              $ident = $datos['ident'];
              $dirent = $datos['dirent'];
              $detent = $datos['detent'];
              $estent = $datos['estent'];
              $idcom = $datos['idcom'];
              $feccom = $datos['feccom'];
              echo  "<tr style='text-align: center;''> 
                        <th>$ident</th>
                        <td>$feccom</td>
                        <td>$dirent</td>  
                        <td>$detent</td> 
                        <td>$estent</td>                                 
                       ";
              echo '<td>                      
                      
                <a class="btn btn-success m-1" href="SegRep.php?ident=' . $ident . '&dir='.urlencode($dirent).'">Iniciar entrega</a>                                             
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>

</html>