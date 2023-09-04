<?php
include "conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (empty($_POST['NomCat'])) {
      echo 'Ingrese el Nombre';
   } else {
      $timestamp = time();
      $idcom = 0;
      $presql = $conexion->query("SELECT MAX(idcom) FROM carrito  ");
      if ($datos = $presql->fetch_array()) {
         $idcom = $datos['MAX(idcom)'];
         $idcom++;
      } else {
         $idcom = 1;
      }
      $sql = $conexion->query("UPDATE carrito
      SET estado = 2 WHERE idcar=1;");
      if ($sql) {
      }
      $sql = $conexion->query("INSERT INTO
         compra (idcom,idcar,feccom)
        VALUES ('$idcom','$idcar',$timestamp)");
      if ($sql) {
         $sql = $conexion->query("INSERT INTO
         entrega (idcom,estent,dirent,detent)
        VALUES ('$idcom',0,'$dirent','$detent')");
      } else {
      }
   }
}
