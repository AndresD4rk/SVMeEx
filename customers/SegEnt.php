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

    <div class="content-wrapper mt-3">
      <div class="container-fluid">
      <div class="col-12 text-center my-2">
                    <h3><b>Seguimiento de Entregas</b></h3>
                </div>
        <table class="table table-responsive table-hover" id="dataTable-1">
          <thead>
            <tr style="text-align: center;">
              <th scope="col">#</th>
              <th scope="col">Fecha</th>
              <th scope="col">Dirección</th>
              <th scope="col">Detalles</th>
              <th scope="col">Estado</th>
              <th scope="col">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $idusu = $_SESSION['idusu'];
            $sql = $conexion->query("SELECT * FROM compra AS c
                        INNER JOIN carrito AS a ON a.idcar=c.idcar
                        INNER JOIN entrega AS e ON e.idcom=c.idcom
                        WHERE a.idusu=$idusu AND e.estent !=2                
                        ORDER BY c.feccom");
            while ($datos = $sql->fetch_array()) {
              $ident = $datos['ident'];
              $idcar = $datos['idcar'];
              $dirent = $datos['dirent'];
              $detent = $datos['detent'];
              $estent = $datos['estent'];
              $detallent= "...";
              if($estent==0){
                $detallent="En espera";
              }else if ($estent==1){
                $detallent="En reparto";
              }
              $idcom = $datos['idcom'];
              $feccom = $datos['feccom'];
              echo  "<tr style='text-align: center;''> 
                        <th>$ident</th>
                        <td>$feccom</td>
                        <td>$dirent</td>  
                        <td>$detent</td> 
                        <td>$detallent</td>";
              echo '<td>';
              if ($estent == 0) {
                echo '<a class="col btn btn-outline-danger" onclick="eliminar(' . $idcom . ',' . $ident . ',' . $idcar . ')"><b>Cancelar</b></a>';
              } else if ($estent == 1) {
                echo '<a class="col btn btn-outline-success" href="DetalleCompra.php?idcom=' . $idcom . '&ident=' . $ident . '"><b>Ver</b></a>';
              }
              echo '                        
                      
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
<script>
  function eliminar(com, ent, car) {
    swal({
        title: "¿Esta Seguro?",
        text: "Una vez eliminado, no se podrá recuperar!",
        icon: "warning",
        buttons: true,
        buttons: {
          cancel: "Cancelar",
          danger: "Eliminar",
        },
        dangerMode: true,
      })
      .then((value) => {
        if (value == "danger") {
          $.ajax({
            url: '../customers/process/detcom.php',
            type: 'GET',
            dataType: 'json',
            data: {
              com: com,
              ent: ent,
              car: car
            },
            success: function(data) {
              // La solicitud se completó con éxito                                                                                 
              swal({
                title: data.title,
                text: data.text,
                icon: data.icon,
                buttons: data.buttons,
                timer: data.timer,
              }).then(() => {
                location.reload();
              });

            },
            error: function(xhr, textStatus, errorThrown) {
              // Ocurrió un error en la solicitud
              console.error('Error en la solicitud:', errorThrown);
              swal({
                title: "Ha ocurrido un error!",
                text: " ",
                icon: "error",
                buttons: false,
                timer: 3000,
              }).then(() => {
                location.reload();
              });
              //alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
            }
          });
        }

      });

  }
</script>

</html>