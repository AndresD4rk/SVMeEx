<!DOCTYPE html>
<html lang="es">
<?php include "../includes/conexion.php";
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
  <link rel="shortcut icon" href="../assets/img/logoMER.webp" />
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/mcss.css">
  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/fetch.js"></script>
</head>
<!-- Inicio Menu TOP -->
<header class="header-bg-color" id="topheader">

</header>

<body>
  <!-- Inicio Menu LATERAL -->
  <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
  <!-- Fin Menu LATERAL -->
  <main class="container-fluid mt-2">
    <div class="row">
      <div class="col-12  mb-2">
        <a href="AddProd.php" class="btn btn-outline-success w-100"><i class="fa-solid fa-circle-plus me-2"></i><b>Agregar Producto</b></a>
      </div>
      <div class="col-12">
        <table class="table table-responsive table-hover" id="dataTable-1">
          <thead>
            <tr style="text-align: center;">
              <th scope="col">#</th>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Categoria</th>
              <th scope="col">Stock</th>
              <th scope="col">Min Stock</th>
              <th scope="col">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = $conexion->query("SELECT * FROM producto as p
                        INNER JOIN categoria as c on p.idcat = c.idcat                                        
                        INNER JOIN inventario as s on p.idpro = s.idpro");
            while ($datos = $sql->fetch_array()) {
              $idpro = $datos['idpro'];
              $nompro = $datos['nompro'];
              $precio = $datos['precio'];
              $nomcat = $datos['nomcat'];
              $cansto = $datos['caninv'];
              $minsto = $datos['mininv'];
              echo  "<tr style='text-align: center;''> 
                        <th scope='col'>$idpro</th>
                        <td>$nompro</td>  
                        <td>$ " . number_format($precio, 2) . "</td> 
                        <td>$nomcat</td> 
                        <td>" . number_format($cansto) . "</td> 
                        <td>" . number_format($minsto) . "</td>                          
                       "; ?>
              <td>
                <a class="btn btn-outline-danger m-1" onclick="eliminar(<?php echo $idpro ?>)"><b>Eliminar</b></a>
                <a class="btn btn-outline-warning m-1" href="EdiProd.php?producto=<?php echo $idpro ?>"><b>Editar</b></a>
              </td>
            <?php
              echo '
                  </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
  </main>
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>
<script>
  function eliminar(prod) {
    swal({
        title: "¿Esta Seguro?",
        text: "Una vez eliminado, no se podra recuperar!",
        icon: "warning",
        buttons: true,
        buttons: {
          cancel: "Cancelar",
          danger: "Eliminar",
        },
        dangerMode: true,
      })
      .then((value) => {                
        if (value=="danger"){                          
        $.ajax({
          url: 'process/detprod.php',
          type: 'GET',
          dataType: 'json',
          data: {
            prod: prod
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
              text: "",
              icon: "error",
              buttons: false,
              timer: 3000,
            }).then(()=> {
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