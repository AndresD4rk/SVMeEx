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
        $pro = $_POST['pro'];
        $car = $_POST['car'];
        $cant = $_POST['cant'];
        if ($cant == -1) {
            $sql = $conexion->query("SELECT canpro FROM detcarrito
        WHERE idcar =" . $car . " AND idpro=" . $pro . "");
            if ($datos = $sql->fetch_array()) {
                $valcant = intval($datos['canpro']) - 1;
                $sql = $conexion->query("UPDATE detcarrito SET canpro=canpro+$cant
                WHERE idcar =" . $car . " AND idpro=" . $pro . "");
                if ($valcant <= 0) {
                    $sql1 = $conexion->query("DELETE FROM detcarrito
                WHERE idcar =" . $car . " AND idpro=" . $pro . "");
                }                
            } else {
                die;
            }
        } else {
            $sql = $conexion->query("SELECT caninv FROM inventario
        WHERE idpro=" . $pro . "");
            if ($datos = $sql->fetch_array()) {
                $stock = intval($datos['caninv']);
                if ($stock >= $cant) {
                    echo $cant;
                    $sql1 = $conexion->query("UPDATE detcarrito SET canpro=(canpro+$cant)
                WHERE idcar =" . $car . " AND idpro=" . $pro . "");
                } else {
                }
            } else {
                die;
            }
        }
    }
}
