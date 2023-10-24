<!DOCTYPE html>
<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idpro = null;
    $sql = $conexion->query("SELECT MAX(idpro) FROM producto");
    if ($datos = $sql->fetch_array()) {
        $idpro = $datos['MAX(idpro)'];
        $idpro++;
    } else {
        $idpro = 1;
    }
    $carpeta_destino = 'assets/img/productos/'; // Cambia 'ruta_de_tu_carpeta_especifica/' por la ruta de la carpeta donde deseas guardar el archivo.
    $file = $_FILES["pimg"]["name"]; // Nombre original del archivo cargado
    $url_temp = $_FILES["pimg"]["tmp_name"]; // Ruta temporal del archivo cargado
    $url_insert = dirname(__FILE__) . "";
    $url_insert = str_replace(array("admin\process"), "assets\img/productos/", $url_insert);
    //echo "$url_temp $url_insert";
    $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png", "webp");
    if (!in_array($file_extension, $allowed_extensions)) {
        // echo "Solo se permiten archivos con las siguientes extensiones: " . implode(", ", $allowed_extensions);
?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                swal("Solo se permiten archivos con las siguientes extensiones:", "<?php echo implode(", ", $allowed_extensions); ?>", "warning")
                    .then((value) => {
                        swal(`The returned value is: ${value}`);
                        history.back();
                    });
            });
        </script>
        <?php


    }
    // Verificar si el archivo se ha subido correctamente y no está vacío
    if (!file_exists($url_insert)) {
        mkdir($url_insert, 0777, true);
    };

    if (is_uploaded_file($url_temp) && !empty($file)) {
        // Mover el archivo a la carpeta de destino
        $url_destino = $url_insert . $idpro . ".webp";

        if (move_uploaded_file($url_temp, $url_destino)) {
            //echo "El archivo se ha guardado correctamente en la carpeta especificada.";
            $nompro = $_POST["NomPro"];
            $precio = doubleval($_POST["Precio"]);
            $despro = $_POST["despro"];
            $idcat = $_POST["SelCat"];
            $caninv = $_POST["CanSto"];
            $mininv = $_POST["MinSto"];

            $sql2 = $conexion->query("INSERT INTO
            producto (idpro,nompro,despro,precio,idcat)
            VALUES ($idpro,'$nompro','$despro',$precio,$idcat)");
            if ($sql2) {
                $sql3 = $conexion->query("INSERT INTO
            inventario (caninv, mininv, idpro)
            VALUES ($caninv,$mininv,$idpro)");
                if ($sql3) {
                ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            swal("Producto Ingresado", "", "success")
                                .then((value) => {
                                    swal(`The returned value is: ${value}`);
                                    window.location = "../ListProd.php";
                                });
                        });
                    </script>
                <?php
                    //     echo '<script type="text/javascript">
                    // alert("Producto Ingresado");
                    // window.location= "../pantallas/ListProd.php";
                    // </script>';
                } else { ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            swal("Error al ingresar producto", "", "error")
                                .then((value) => {
                                    swal(`The returned value is: ${value}`);
                                    window.location = "../ListProd.php";
                                });
                        });
                    </script>
                <?php }
            } else {
                ?>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        swal("Error al registrar el producto", "", "error")
                            .then((value) => {
                                swal(`The returned value is: ${value}`);
                                window.location = "../ListProd.php";
                            });
                    });
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Hubo un error al guardar el archivo", "", "error")
                        .then((value) => {
                            swal(`The returned value is: ${value}`);
                            window.location = "../ListProd.php";
                        });
                });
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                swal("No se ha seleccionado un archivo válido para cargar.", "", "error")
                    .then((value) => {
                        swal(`The returned value is: ${value}`);
                        window.location = "../ListProd.php";
                    });
            });
        </script>
<?php
    }
}
?>

</html>