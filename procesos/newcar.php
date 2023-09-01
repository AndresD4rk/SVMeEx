<?php
session_start();
 include "conexion.php";
 if ($_SERVER['REQUEST_METHOD'] === 'GET') {
 if (empty($_SESSION['idusu'])) {    
    echo 'Necesita Iniciar Sesion';
}else{
        $sql = $conexion->query("INSERT INTO
        xxxx (xxx)
        VALUES ('$nomxxxcat')");
         if ($sql) {
            echo "Categoria Registrada";
         } else {
            echo "Error al Registrar Categoria";
         }         
}}?>