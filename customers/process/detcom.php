<?php
session_start();
include "../../includes/conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_SESSION['idusu'])) {
        $response = array(
            'title' => 'Error!',
            'text' => 'Necesita Iniciar Sesión',
            'icon' => 'error',
            'buttons' => false,
            'timer' => 3000,
        );
        echo json_encode($response);
    } else {
        $compra = $_GET['com'];  
        $entrega = $_GET['ent'];     
        $carrito = $_GET['car'];          
        $sql1 = $conexion->query("DELETE FROM entrega            
            WHERE ident=$entrega");
        $sql2 = $conexion->query("DELETE FROM compra            
            WHERE idcom=$compra");
        $sql3 = $conexion->query("UPDATE carrito  
            SET estado=1          
            WHERE idcar=$carrito");
        $sql4 = $conexion->query("DELETE FROM detcarrito
            WHERE idcar=$carrito");
        $sql5 = $conexion->query("DELETE FROM carrito
            WHERE idcar=$carrito");                
        if ($sql1 && $sql2 && $sql3 && $sql4 && $sql5) {
            $response = array(
                'title' => 'Compra cancelada!',
                'text' => ' ',
                'icon' => 'success',
                'buttons' => false,
                'timer' => 2500,
            );
            echo json_encode($response);
        } else {
            $response = array(
                'title' => 'Error!',
                'text' => ' ',
                'icon' => 'error',
                'buttons' => false,
                'timer' => 2500,
            );
            echo json_encode($response);
        }
    }
}
