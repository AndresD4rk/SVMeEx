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
<!-- Fin Menu TOP -->
<body>
   <!-- Inicio Menu LATERAL -->
   <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->
  
    <main class="container-fluid mt-2"> 
      <div class="row"> 
      <div class="col-12  mb-2">
                    <a href="AddUsu.php" class="btn btn-outline-success w-100"><i class="fa-solid fa-user-plus me-2"></i>AGREGAR USUARIO</a>
                </div>
          <div class="col-12">
    <table class="table table-bordered" id="dataTable-1">
                      <thead>
                        <tr style="text-align: center;">
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Rol</th>                          
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = $conexion->query("SELECT u.idusu, prinom, segnom, priape,segape,correo,rol FROM usuario as u
                        INNER JOIN seguridad as s on s.idusu = u.idusu
                        ");
                        while ($datos = $sql->fetch_array()) {
                          $idusu = $datos['idusu'];
                          $Nombre = $datos['prinom']." ".$datos['segnom']." ".$datos['priape'].' '.$datos['segape'];
                          $Email = $datos['correo'];
                          $Rol = $datos['rol'];                                              
                        echo  "<tr style='text-align: center;''> 
                        <td>$idusu</td>
                        <td>$Nombre</td>  
                        <td>$Email</td> 
                        <td>$Rol</td>                                               
                       ";
                          echo '<td>
                      <div class="row">
                        <a class="col" onclick="as(1,'.$idusu.')">Editar</a>
                        <a class="col" href="as.php?variable=' . $idusu . '">Eliminar</a>
                      </div>
                    </td>
                  </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                    </div>
                    </div>     
                    
    </main>
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>
</html>