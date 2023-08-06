<?php
 include "conexion.php";
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 if (empty($_POST['NomFam'])) {    
    echo'Ingrese el Nombre';
}else{
    $nomfam = $_POST["NomFam"];
        $sql = $conexion->query("INSERT INTO
        familia (nomfam)
        VALUES ('$nomfam')");
         if ($sql) {
            echo "Familia Registrada";
         } else {
            echo "Error al Registrar Familia";
         }         
}}
