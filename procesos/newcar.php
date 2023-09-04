<?php
session_start();
include "conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (empty($_SESSION['idusu'])) {
      echo 'Necesita Iniciar Sesion';
   } else {
      $idusu = $_SESSION['idusu'];
      //Revisa si el usuario tiene un carrito creado
      $sql = $conexion->query("SELECT idcar FROM carrito 
      WHERE idusu ='" . $idusu . "' AND estado= 1");
      $datos=$sql->fetch_row();
      if ($datos) {         
         $idcar=$datos['idcar'];
         //Agrega el producto al carrito
         $sql2 = $conexion->query("INSERT INTO
         detcarrito (idcar,idpro,canpro,precom)
         VALUES ($idcar,$idpro,$canpro,-1)");
            if ($sql2) {
            } else {
               echo '<script type="text/javascript">
            alert("Falla al ingresar producto");
            </script>';
            }
      } else {
         $idcar = 0;
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
         VALUES ($idcar,$idpro,$canpro,-1)");
            if ($sql3) {
            } else {
               echo '<script type="text/javascript">
            alert("Falla al ingresar producto");
            </script>';
            }
         } else {
            echo '<script type="text/javascript">
            alert("Falla al crear carrito");
            </script>';
         }
      }
   }
}
