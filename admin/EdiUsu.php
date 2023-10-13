
<!DOCTYPE html>
<html lang="es">
<?php 
session_start();
include "../includes/conexion.php";
$rol = $_SESSION['rol'];
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
    <!-- <link rel="stylesheet" href="./css/pcss.css"> -->    
    <script src="../assets/js/fetch.js"></script>
    <script src="../assets/js/reusehtml.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    

</head>
<header class="header-bg-color" id="topheader"></header>

<body>
    <main class="container-fluid align-items-center justify-content-center">
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->
        

<?php 
$sql = $conexion->query("SELECT * FROM producto as p
INNER JOIN inventario as i ON i.idpro=p.idpro
WHERE p.idpro =" . $_GET['producto'] . "");
    if ($datos = $sql->fetch_array()) {
        $nombre = $datos['nompro'];
        $descripcion =$datos['despro'];
        $valor=$datos['precio'];
        $cant=$datos['caninv'];
        $mincant=$datos['mininv'];
        $cate=$datos['idcat'];        
?>

        <form class="row" action="process/editprod.php" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <h1 class="text-center">MercaExpress</h1>
                <img src="../assets/img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="..." style="max-height: 170px; max-width: 170px;">
                <h2 class="text-center">Registro de Productos</h2>
            </div>
            <!-- FAMILIA DEL PRODUCTO
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Familia</label>
                            <select class="form-select" aria-label="Default select example" name="SelFam" required>
                            <option value="">Elija una Familia</option>
                                <?php
                                // $sql = $conexion->query("SELECT * 
                                // FROM familia");
                                // while ($datos = $sql->fetch_array()) {
                                //     echo '<option value="' . $datos['idfam'] . ';">' . $datos['nomfam'] . '</option>';
                                // }
                                ?>
                            </select>
                            <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(2)">Agregar Familia</button>
                        </div> -->
            <!-- NOMBRE DEL PRODUCTO -->
            <input type="number" name="Producto" value="<?php echo $_GET['producto']?>" hidden required>
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate">Nombre del Producto</label>
                <input type="text" class="form-control" name="NomPro" value="<?php echo $nombre ?>" required>
            </div>
            <!-- DESCRIPCION DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate">Descripción del producto</label>
                <input type="text" class="form-control" name="despro" value="<?php echo $descripcion ?>" required>
            </div>
            <!-- VALOR DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate ">Valor del Producto</label>
                <input type="number" class="form-control" name="Precio" value="<?php echo $valor ?>" required step="0.01">
            </div>
            <!-- IMAGEN DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate">Imagen del producto</label>
                <input type="file" class="form-control" name="pimg" accept="image/*">
            </div>
            <!-- CANTIDAD DEL PRODUCTO -->
            <div class="col">
                <label for="exampleInputEmail1" class="form-label text-truncate">Cantidad del producto</label>
                <input type="number" class="form-control" name="CanSto" value="<?php echo $cant ?>" required>
            </div>
            <!-- STOCK MINIMO DEL PRODUCTO -->
            <div class="col">
                <label for="exampleInputEmail1" class="form-label text-truncate text-truncate">Cantidad minima del producto</label>
                <input type="number" class="form-control" name="MinSto" value="<?php echo $mincant ?>" required>
            </div>
            <!-- CATEGORIA DEL PRODUCTO -->
            <div class="col-lg-4 col-12">
                <label for="exampleInputEmail1" class="form-label text-truncate ">Categoria</label>
                <select id="select-categoria" class="form-select" aria-label="Default select example" name="SelCat" required>
                    <option value="">Elija una Categoria</option>
                    <?php
                    $sql1 = $conexion->query("SELECT * 
                                FROM categoria");
                    while ($datos1 = $sql1->fetch_array()) {
                        if($datos1['idcat']==$cate){
                            echo '<option selected value="' . $datos1['idcat'] . '">' . $datos1['nomcat'] . '</option>';
                        }else{
                            echo '<option value="' . $datos1['idcat'] . '">' . $datos1['nomcat'] . '</option>';
                        }
                        
                    }
                    ?>
                </select>
                <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(1)">Agregar Categoria</button>
            </div>

            <div class="row mt-5">
                <div class="col-6 text-start"><a href="../public/main.php" class="btn btn-warning">Regresar</a></div>
                <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
            </div>

        </form>
        <?php } ?>
        <!-- CATEGORIA CALL -->
        <div class="offcanvas offcanvas-top h-50" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" class>
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="formularioContainer">
            </div>
        </div>

    </main>
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>
</html>