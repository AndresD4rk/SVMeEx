<?php
 include "conexion.php";
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 if (empty($_POST['NomCat'])) {    
    echo'Ingrese el Nombre';
}else{
    $nomcat = $_POST["NomCat"];
        $sql = $conexion->query("INSERT INTO
        categoria (nomcat)
        VALUES ('$nomcat')");
         if ($sql) {
            echo "Categoria Registrada";
         } else {
            echo "Error al Registrar Categoria";
         }         
}}
