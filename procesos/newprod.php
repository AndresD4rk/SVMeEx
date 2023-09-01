<?php
include "conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nompro = $_POST["NomPro"];
    $precio = doubleval($_POST["Precio"]);
    $despro = $_POST["despro"];
    $idcat = $_POST["SelCat"];
    $caninv = $_POST["CanSto"];
    $mininv = $_POST["MinSto"];
    $idpro = null;
    $sql = $conexion->query("SELECT MAX(idpro) FROM producto");
    if ($datos = $sql->fetch_array()) {
        $idpro = $datos['MAX(idpro)'];
        $idpro++;
    } else {
        $idpro = 1;
    }
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
}
