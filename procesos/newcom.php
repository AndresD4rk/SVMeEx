<?php
include "conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_POST['dira'] != 0) {
         $dirent = $_POST['dira'];
      } else if ($_POST['dirm'] != "") {
         $dirent = $_POST['dirm'];
      } else {
         echo '<script type="text/javascript">
         alert("Error DIRRECCION");
         history.back();
         </script>';
      }
      $detent=$_POST['detent'];
      $timestamp = time();
      $idcom = 0;
      $idusu = $_SESSION['idusu'];
      $sql = $conexion->query("SELECT MAX(idcom) FROM compra  ");
      if ($datos = $sql->fetch_array()) {
         $idcom = $datos['MAX(idcom)'];
         $idcom++;
      } else {
         $idcom = 1;
      }
      $sqlcar = $conexion->query("SELECT idcar FROM carrito
      WHERE idusu=" . $idusu . " AND estado=1");
      if ($datoscar = $sqlcar->fetch_array()) {
         $idcar = $datoscar['idcar'];
         $sql1 = $conexion->query("UPDATE carrito
         SET estado = 2 
         WHERE idcar=" . $idcar . "");
         if ($sql1) {
            $sql2 = $conexion->query("INSERT INTO
            compra (idcom,idcar,feccom)
            VALUES ('$idcom','$idcar',FROM_UNIXTIME($timestamp))");
         if ($sql2) {
            $sql3 = $conexion->query("INSERT INTO
            entrega (idcom,estent,dirent,detent)
            VALUES ('$idcom',0,'$dirent','$detent')");
            if($sql3){
               echo '<script type="text/javascript">
                alert("Compra Exitosa!");
                window.location= "../pantallas/main.php";
                </script>
                ';
            }else{
               echo "Error INSERT ENTREGA";
            }
         } else {
            echo "Error INSERT COMPRA";
         }
         }else{
            echo "Error UPDATE CARRITO";
         }
      } else {
         echo "Error";
      }
}
