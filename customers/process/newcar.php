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
      $idpro = $_GET['idprod'];
      $canpro = $_GET['canpro'];
      $precio = $_GET['precio'];
      $idusu = $_SESSION['idusu'];
      $idcar = 0;
      //Revisa si el usuario tiene un carrito creado
      $sql = $conexion->query("SELECT idcar FROM carrito 
      WHERE idusu ='" . $idusu . "'AND estado= 1");
      if ($datos = $sql->fetch_array()) {
         $idcar = $datos['idcar'];
         //Revisa si el producto esta repetido en el carrito
         $sql2 = $conexion->query("SELECT idcar,canpro FROM detcarrito 
         WHERE idcar =" . $idcar . " AND idpro=" . $idpro . "");
         if ($datos1 = $sql2->fetch_array()) {
            $newcant = $datos1["canpro"];
            $newcant = intval($newcant) + intval($canpro);
            //Actualiza la cantidad del producto
            $sql3 = $conexion->query("UPDATE detcarrito
            SET canpro=" . $newcant . "
            WHERE idcar =" . $idcar . " AND idpro=" . $idpro . "");
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
         } else {            
            //Agrega el producto al carrito
            $sql3 = $conexion->query("INSERT INTO
            detcarrito (idcar,idpro,canpro,precom)
            VALUES ($idcar,$idpro,$canpro,$precio)");
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
      } else {
         // Saca el id maximo de carrito
         $sql1 = $conexion->query("SELECT MAX(idcar) FROM carrito");
         if ($datos = $sql1->fetch_array()) {
            $idcar = $datos['MAX(idcar)'];
            $idcar++;
         } else {
            $idcar = 1;
         }
         // Crea el carrito
         $sql2 = $conexion->query("INSERT INTO
         carrito (idcar,idusu,estado)
        VALUES ($idcar,$idusu,1)");
         if ($sql2) {
            //Agrega el producto al carrito
            $sql3 = $conexion->query("INSERT INTO
         detcarrito (idcar,idpro,canpro,precom)
         VALUES ($idcar,$idpro,$canpro,$precio)");
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
                  'text' => 'Al ingresar producto',
                  'icon' => 'error',
                  'buttons' => false,
                  'timer' => 3000,
              );              
              echo json_encode($response);                
            }
         } else {
            $response = array(
               'title' => 'Error!',
               'text' => 'Al crear carrito',
               'icon' => 'error',
               'buttons' => false,
               'timer' => 3000,
           );              
           echo json_encode($response);              
         }
      }
   }
}
