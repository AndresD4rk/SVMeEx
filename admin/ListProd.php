

                    <!DOCTYPE html>
<html lang="es">
<?php include "../procesos/conexion.php"; 
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
                    <a href="AddProd.php" class="btn btn-outline-success w-100"><i class="fa-solid fa-circle-plus me-2"></i><b>AGREGAR PRODUCTO</b></a>
                </div>
                <div class="col-12">
    <table class="table table-bordered" id="dataTable-1">
                      <thead>
                        <tr style="text-align: center;">
                          <th>#</th>
                          <th>Producto</th>
                          <th>Precio</th>
                          <th>Categoria</th>
                          <th>Stock</th>
                          <th>Min Stock</th>
                          <th>Action</th>
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
                        <td>$idpro</td>
                        <td>$nompro</td>  
                        <td>$precio</td> 
                        <td>$nomcat</td> 
                        <td>$cansto</td> 
                        <td>$minsto</td>                          
                       ";
                          echo '<td>
                      <div class="row">
                        <a class="col" onclick="mostrarFormularioLP(1,'.$idpro.')">Editar</a>
                        <a class="col" href="deletebook.php?variable=' . $idpro . '">Eliminar</a>
                      </div>
                    </td>
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
</html>