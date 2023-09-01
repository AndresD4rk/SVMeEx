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
        <div id="loginform">
            <form id="formid" action="../procesos/newprod.php" method="POST">
                <div class="mb-4">
                    <h1 class="text-center">MercaExpress</h1>
                    <img src="../img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="...">
                </div>
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Registro de Productos</h2>
                    <div class="row">                        
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
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Nombre del Producto</label>
                            <input type="text" class="form-control" name="NomPro" placeholder="Ingresa el nombre del Producto" required>
                        </div>
                        <!-- DESCRIPCION DEL PRODUCTO -->
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label">Descripción del producto</label>
                            <input type="text" class="form-control" name="despro" placeholder="Ingresa la descripción del producto" required>
                        </div>                                            
                        <!-- VALOR DEL PRODUCTO -->
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Valor del Producto</label>
                            <input type="number" class="form-control" name="Precio" placeholder="Ingresa el valor del producto" required>
                        </div>
                        <!-- CATEGORIA DEL PRODUCTO -->
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Categoria</label>
                            <select class="form-select" aria-label="Default select example" name="SelCat" required>
                            <option value="">Elija una Categoria</option>
                                <?php
                                $sql = $conexion->query("SELECT * 
                                FROM categoria");
                                while ($datos = $sql->fetch_array()) {
                                    echo '<option value="' . $datos['idcat'] . '">' . $datos['nomcat'] . '</option>';
                                }
                                ?>
                            </select>
                            <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(1)">Agregar Categoria</button>
                        </div>    
                        <!-- CANTIDAD DEL PRODUCTO -->            
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad del producto</label>
                            <input type="number" class="form-control" name="CanSto"  placeholder="Ingresa el stock inicial del producto" required>
                        </div>
                        <!-- STOCK MINIMO DEL PRODUCTO -->
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad minima del producto</label>
                            <input type="number" class="form-control" name="MinSto" placeholder="Ingresa el stock minimo del producto" required>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-6 text-start"><a href="main.php" class="btn btn-warning">Regresar</a></div>
                        <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
                    </div>
                </div>
            </form>
            <div class="offcanvas offcanvas-top h-50" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" class>                
            <div class="offcanvas-header">                    
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="formularioContainer">
                </div>
            </div>
        </div>
    </main>
</body>

</html>