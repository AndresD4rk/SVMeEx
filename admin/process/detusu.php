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
        $usu = $_GET['usu'];
        $sql = $conexion->query("DELETE FROM carrito            
            WHERE idusu=$usu AND estado = 1"); 
        $sql = $conexion->query("DELETE FROM direccion            
            WHERE idusu=$usu"); 
        $sql = $conexion->query("DELETE FROM seguridad            
            WHERE idusu=$usu");          
        $sql = $conexion->query("DELETE FROM seguridad            
            WHERE idusu=$usu"); 
        $sql = $conexion->query("DELETE FROM usuario            
            WHERE idusu=$usu");                   
        if ($sql) {
            $response = array(
                'title' => 'Usuario eliminado!',
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
