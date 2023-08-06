

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
    <link rel="shortcut icon" href="../img/logoMER.webp" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- <link rel="stylesheet" href="./css/pcss.css"> -->
    <script src="../js/bootstrap.js"></script>
    <script src="../js/fetch.js"></script>
</head>
<body>
    <main class="d-flex align-items-center justify-content-center">
    <table class="table table-bordered" id="dataTable-1">
                      <thead>
                        <tr style="text-align: center;">
                          <th>#</th>
                          <th>Producto</th>
                          <th>Precio</th>
                          <th>Categoria</th>
                          <th>Familia</th>
                          <th>Stock</th>
                          <th>Min Stock</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = $conexion->query("SELECT * FROM producto as p
                        INNER JOIN categoria as c on p.idcat = c.idcat
                        INNER JOIN familia as f on p.idfam = f.idfam
                        INNER JOIN stock as s on p.idsto = s.idsto");
                        while ($datos = $sql->fetch_array()) {
                          $idpro = $datos['idpro'];
                          $nompro = $datos['nompro'];
                          $precio = $datos['precio'];
                          $nomcat = $datos['nomcat'];
                          $nomfam = $datos['nomfam'];
                          $cansto = $datos['cansto'];        
                          $minsto = $datos['minsto'];                       
                        echo  "<tr style='text-align: center;''> 
                        <td>$idpro</td>
                        <td>$nompro</td>  
                        <td>$precio</td> 
                        <td>$nomcat</td> 
                        <td>$nomfam</td>  
                        <td>$cansto</td> 
                        <td>$minsto</td>                          
                       ";
                          echo '<td>
                      <div class="row">
                        <a class="col" href="editbook.php?variable=' . $idpro . '">Editar</a>
                        <a class="col" href="deletebook.php?variable=' . $idpro . '">Eliminar</a>
                      </div>
                    </td>
                  </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
    </main>
</body>

</html>