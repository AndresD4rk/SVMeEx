<?php
session_start();
include "../../includes/conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $car = $_POST['car'];
        $sql = $conexion->query("DELETE FROM detcarrito
            WHERE idcar=$car");
            if($sql){
                $sql = $conexion->query("DELETE FROM carrito
                WHERE idcar=$car");
                if($sql){
                    $response = array(
                        'title' => 'Carrito cancelado!',
                        'text' => ' ',
                        'icon' => 'success',
                        'buttons' => false,
                        'timer' => 2200,
                    );
                    echo json_encode($response);
                }
            }
        
    }
}
