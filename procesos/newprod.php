<?php
include "conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idpro = null;
    $sql = $conexion->query("SELECT MAX(idpro) FROM producto");
    if ($datos = $sql->fetch_array()) {
        $idpro = $datos['MAX(idpro)'];
        $idpro++;
    } else {
        $idpro = 1;
    }
    $carpeta_destino = '../img/productos/'; // Cambia 'ruta_de_tu_carpeta_especifica/' por la ruta de la carpeta donde deseas guardar el archivo.
    $file = $_FILES["pimg"]["name"]; // Nombre original del archivo cargado
    $url_temp = $_FILES["pimg"]["tmp_name"]; // Ruta temporal del archivo cargado

// Verificar si el archivo se ha subido correctamente y no está vacío
if (is_uploaded_file($url_temp) && !empty($file)) {
    // Mover el archivo a la carpeta de destino
    $url_destino = $carpeta_destino . $idpro;
    
    if (move_uploaded_file($url_temp, $url_destino)) {
        echo "El archivo se ha guardado correctamente en la carpeta especificada.";
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
                echo '<script type="text/javascript">
                alert("Producto Ingresado");
                window.location= "../pantallas/ListProd.php";
                </script>';
            } else {
                echo "Error al registrar el inventario del producto";
                echo '<script type="text/javascript">
                alert("Producto Ingresado");
                window.location= "../pantallas/ListProd.php";
                </script>';
            }
        } else {
            echo "Error al registrar el producto";
        }
    } else {
        echo "Hubo un error al guardar el archivo.";
    }
} else {
    echo "No se ha seleccionado un archivo válido para cargar.";
}
    

    
}
