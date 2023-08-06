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
            <form id="formid" action="#Procesos/newusureg.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <h1 class="text-center">MercaExpress</h1>
                    <img src="../img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="...">
                </div>
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Registro de Productos</h2>
                    <div class="row">
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Categoria</label>
                            <select class="form-select" aria-label="Default select example" id="SelCat">
                            <option selected>Elija una Categoria</option>
                                <?php
                                $sql = $conexion->query("SELECT * 
                                FROM categoria");
                                while ($datos = $sql->fetch_array()) {
                                    echo '<option value="' . $datos['idcat'] . ';">' . $datos['nomcat'] . '</option>';
                                }
                                ?>
                            </select>
                            <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(1)">Agregar Categoria</button>
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Familia</label>
                            <select class="form-select" aria-label="Default select example" id="SelFam">
                            <option selected>Elija una Familia</option>
                                <?php
                                $sql = $conexion->query("SELECT * 
                                FROM familia");
                                while ($datos = $sql->fetch_array()) {
                                    echo '<option value="' . $datos['idfam'] . ';">' . $datos['nomfam'] . '</option>';
                                }
                                ?>
                            </select>
                            <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(2)">Agregar Familia</button>
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Nombre del Producto</label>
                            <input type="text" class="form-control" id="PriNom" aria-describedby="emailHelp" placeholder="Ingresa el nombre del Producto">
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label ">Valor del Producto</label>
                            <input type="number" class="form-control" id="SegNom" placeholder="Ingresa el valor del producto">
                        </div>

                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad del producto</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el stock inicial del producto">
                        </div>
                        <div class="col-6 mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad minima del producto</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el stock minimo del producto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-start"><button type="submit" class="btn btn-warning">Regresar</button></div>
                        <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
                    </div>


                </div>
            </form>



            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="formularioContainer">



                </div>
            </div>
        </div>


    </main>
    <script>
        function mostrarFormulario(formulario) {
            // Obtenemos la referencia al contenedor del formulario
            const formularioContainer = document.getElementById('formularioContainer');

            // Limpiamos el contenido actual del contenedor
            formularioContainer.innerHTML = '';

            // Creamos el contenido del formulario según el botón pulsado
            if (formulario === 1) {
                formularioContainer.innerHTML = `
        <!-- Formulario 1 -->
            <form id="CatForm">  
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Registro de Categoria</h2>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label class="form-label ">Nombre de la Categoria</label>
                            <input type="text" class="form-control" name="NomCat" placeholder="Ingresa el nombre de la categoria">
                        </div>
                        <div class="text-end mb-2"><button class="btn btn-success" onclick="enviarFormularioCat()">Registrar</button></div>
                    </div>
                </div> 
            </form>
      `;
            } else if (formulario === 2) {
                formularioContainer.innerHTML = `
        <!-- Formulario 2 -->
            <form id="FamForm">  
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Registro de Familia</h2>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label class="form-label ">Nombre de la Familia</label>
                            <input type="text" class="form-control" name="NomFam" placeholder="Ingresa el nombre de la familia">
                        </div>
                        <div class="text-end mb-2"><button class="btn btn-success" onclick="enviarFormularioFam()">Registrar</button></div>
                    </div>
                </div> 
            </form>
      `;
            }

            // Mostramos el "offcanvas"
            const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasTop'));
            offcanvas.show();
        }
    </script>

    



</body>

</html>