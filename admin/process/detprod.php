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
        $sql = $conexion->query("DELETE FROM inventario            
            WHERE idpro=$idpro");
        $sqliddetcar = $conexion->query("SELECT iddetcar FROM detcarrito AS d
        INNER JOIN carrito AS c ON c.idcar=d.idcar
        WHERE c.estado=1 AND d.idpro=$idpro");
        while ($datos = $sqliddetcar->fetch_array()){
            $sql = $conexion->query("DELETE FROM detcarrito
            WHERE iddetcar = ".$datos['iddetcar']."");
        }        
        $sql = $conexion->query("DELETE FROM producto            
            WHERE idpro=$idpro");
        if ($sql) {
            $response = array(
                'title' => 'Producto eliminado!',
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
