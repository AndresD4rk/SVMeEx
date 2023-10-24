<!DOCTYPE html>
<html lang="es">
<?php include "../includes/conexion.php";
$idusu = $_GET['id']
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
        <?php
        $sql = $conexion->query("SELECT * FROM usuario AS u
        INNER JOIN seguridad AS s ON s.idusu=u.idusu                    
        WHERE u.idusu=" . $idusu . "
");
        if ($sql &&  mysqli_num_rows($sql) > 0) {
            $datos = $sql->fetch_array()
        ?>
            <form id="formid" action="process/ediusu.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <h2 class="text-center">Actualizar Usuario</h2>
                    <img src="../assets/img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-width:160px; max-height:160px;">
                </div>
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-6 mb-3 mt-3">
                            <input type="hidden" class="form-control" name="id" aria-describedby="emailHelp" value="<?php echo $datos['idusu'] ?>">
                            <label for="exampleInputEmail1" class="form-label ">Primer Nombre</label>
                            <input type="text" class="form-control" name="nom1" aria-describedby="emailHelp" value="<?php echo $datos['prinom'] ?>">
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Segundo Nombre</label>
                            <input type="text" class="form-control" name="nom2" aria-describedby="emailHelp" value="<?php echo $datos['segnom'] ?>">
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Primer Apellido</label>
                            <input type="text" class="form-control" name="ape1" aria-describedby="emailHelp" value="<?php echo $datos['priape'] ?>">
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Segundo Apellido</label>
                            <input type="text" class="form-control" name="ape2" aria-describedby="emailHelp" value="<?php echo $datos['segape'] ?>">
                        </div>
                        <div class="col-7 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $datos['correo'] ?>">
                        </div>
                        <div class="col-5 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label text-truncate ">Rol</label>
                            <select id="select-categoria" class="form-select" aria-label="Default select example" name="SelRol" required>
                                <option value="2" <?php if ($datos['rol'] === "2") echo "selected"; ?>>Cliente</option>
                                <option value="3" <?php if ($datos['rol'] === "3") echo "selected"; ?>>Repartidor</option>
                                <option value="4" <?php if ($datos['rol'] === "4") echo "selected"; ?>>Empleado</option>
                                <option value="1" <?php if ($datos['rol'] === "1") echo "selected"; ?>>Administrador</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row">
                    <div class="col-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="clave" placeholder="Ingresa la contraseña">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Verifica la Contraseña</label>
                        <input type="password" class="form-control" name="clave2" placeholder="Ingresa la nuevamente contraseña">
                    </div>
                </div> -->
                    <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
                    <div class="row">
                        <div class="col-6 text-start"><a onclick="history.back()" class="btn btn-outline-danger"><b>Cancelar</b></a></div>
                        <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-outline-success"><b>Actualizar</b></button></div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </main>
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>

</html>