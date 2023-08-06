<?php
include "conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nompro = $_POST["NomPro"];
    $precio = $_POST["Precio"];
    $idcat = $_POST["SelCat"];
    $idfam = $_POST["SelFam"];
    $cansto = $_POST["CanSto"];
    $minsto = $_POST["MinSto"];
    $idsto =null;
    $sql = $conexion->query("SELECT MAX(idsto) FROM stock");
    if ($datos = $sql->fetch_array()) {
        $idsto = $datos['MAX(idsto)'];
        $idsto++;
    } else {
        $idsto = 1;
    }
    if ($idsto != null) {
        $sql2 = $conexion->query("INSERT INTO
        stock (idsto, cansto, minsto)
        VALUES ('$idsto','$cansto','$minsto')");
        if ($sql2) {
            $sql3 = $conexion->query("INSERT INTO
        producto (nompro, precio, idcat, idfam, idsto)
        VALUES ('$nompro','$precio','$idcat','$idfam','$idsto')");
        if ($sql3) {
            echo '<script type="text/javascript">
            alert("Producto Ingresado");
            window.location= "../pantallas/ListProd.php";
            </script>';

        } else {
            echo "Error al Registrar Producto";
        }
        } else {
            echo "Error al Registrar Stock";
        }
        
    }
}
