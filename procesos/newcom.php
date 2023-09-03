<?php
 include "conexion.php";
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 if (empty($_POST['NomCat'])) {    
    echo'Ingrese el Nombre';
}else{
    $timestamp = time();
    $nomcat = $_POST["NomCat"];
        $sql = $conexion->query("INSERT INTO
         compra (idcar,feccom)
        VALUES ('$idcar',$timestamp)");
         if ($sql) {
            echo "Categoria Registrada";
         } else {
            echo "Error al Registrar Categoria";
         }         
}}?>
