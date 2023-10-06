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
        $idpro = $_GET['prod'];
        $sql = $conexion->query("DELETE FROM producto            
            WHERE idpro=" . $idpro . "");
        if ($sql3) {
            $response = array(
                'title' => 'Producto agregado!',
                'text' => 'Al carrito',
                'icon' => 'success',
                'buttons' => false,
                'timer' => 3000,
            );
            echo json_encode($response);
        } else {
            $response = array(
                'title' => 'Error!',
                'text' => 'Al agregar producto',
                'icon' => 'error',
                'buttons' => false,
                'timer' => 3000,
            );
            echo json_encode($response);
        }
    }
}
