<?php
session_start();
// if (empty($_SESSION['rol'])) {
//     header("location:page-404.html");
// }
include "../procesos/conexion.php";
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

    <main class="container-fluid">        
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->

        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->
        

        <div class="container-fluid">
            <div class="row">
                <form class="row" action="process/newcom.php" method="POST">
                    <div class="col-12 mb-3">                    
                        <h3 class="text-center">Confirmación de Compra y Entrega</h3>
                        <img src="../assets/img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-height: 150px; max-width: 150px;">
                        <h4 class="text-center">Datos de Entrega</h4>
                    </div>                   
                    <!-- Direccio entrega -->
                    <div class="col-lg-6 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate ">Dirección</label>
                        <select id="dirauto" class="form-select" aria-label="Default select example" name="dira" required>
                            <option value="" selected>Elija su Dirrección</option>
                            <?php
                            $sql = $conexion->query("SELECT * 
                                FROM categoria");
                            while ($datos = $sql->fetch_array()) {
                                echo '<option value="' . $datos['idcat'] . '">' . $datos['nomcat'] . '</option>';
                            }
                            ?>
                        </select>
                        <input type="text" class="form-control" id="dirmanual" name="dirm" placeholder="Ingresa la Dirección (Dirección, Municipio)" style="display: none;">
                        <button id="btnewdir" type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(2)">Agregar Dirección</button>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="dircambiar" checked>
                            <label class="form-check-label" for="dircambiar">Manual/Auto</label>
                        </div>
                    </div>
                    <!-- Descripcion de entrega -->
                    <div class="col-lg-6 col-12">
                        <label for="exampleInputEmail1" class="form-label text-truncate">Descripción dirrección/entrega</label>
                        <input type="text" class="form-control" name="detent" placeholder="Ingresa la descripción del producto" required>
                    </div>
                    <!-- VALOR DEL PRODUCTO -->
                    <div class="col-12 text-end mt-2">                        
                        <label for="exampleInputEmail1" class="form-label text-truncate me-2"><h4>Total de compra: </h4><h1>$ <?php echo number_format($_POST['vtc']) ?> </h1> </label>
                        <input type="text" class="form-control" name="Precio" value="<?php echo number_format($_POST['vtc']) ?>" required hidden>
                    </div>


                    <div class="row mt-5">
                        <div class="col-6 text-start"><a href="main.php" class="btn btn-warning">Regresar</a></div>
                        <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>

<script>
    // Obtiene referencias a los elementos del DOM
    var checkbox = document.getElementById('dircambiar');
    var dirauto = document.getElementById('dirauto');
    var dirmanual = document.getElementById('dirmanual');
    var btnewdir = document.getElementById('btnewdir');
    // Agrega un evento de cambio al checkbox
    checkbox.addEventListener('change', function() {
        // Muestra u oculta el input activo según el estado del checkbox
        if (checkbox.checked) {
            dirauto.style.display = 'block';
            btnewdir.style.display = 'block';
            dirmanual.style.display = 'none';
            dirmanual.value = '';            
            dirauto.required = true;
            dirmanual.required = false;                   
        } else {
            dirauto.style.display = 'none';
            btnewdir.style.display = 'none';
            dirmanual.style.display = 'block';
            dirauto.value = 0;
            dirauto.required = false;
            dirmanual.required = true;           
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>
</html>