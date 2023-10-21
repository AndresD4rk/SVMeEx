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
        $iddir = $_GET['dir'];        
        $sql = $conexion->query("DELETE FROM direccion            
            WHERE iddir=$iddir");
        if ($sql) {
            $response = array(
                'title' => 'Dirección eliminada!',
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
