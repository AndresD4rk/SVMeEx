<?php
include "conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (!(empty($_POST['dira']))) {
      $dirent = $_POST['dira'];
   } else if ($_POST['dirm'] != "") {
      $dirent = $_POST['dirm'];
   } else {
      echo '<script type="text/javascript">
         alert("Error DIRRECCION");
         history.back();
         </script>';
   }
   $api_key = "xxx";
   $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($dirent) . "&key=" . $api_key;
   $response = file_get_contents($url);

   // Decodifica la respuesta JSON
   $data = json_decode($response);

   // Verifica si la solicitud fue exitosa y si se encontraron resultados
   if ($data && $data->status === "OK" && !empty($data->results)) {
      // Obtiene las coordenadas de latitud y longitud
      $latitud = $data->results[0]->geometry->location->lat;
      $longitud = $data->results[0]->geometry->location->lng;

      // Ahora tienes las coordenadas de la dirección
      echo "Latitud: $latitud, Longitud: $longitud";


      $detent = $_POST['detent'];
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
      $ident = 0;
      $sqll = $conexion->query("SELECT MAX(ident) FROM entrega  ");
      if ($datosl = $sqll->fetch_array()) {
         $ident = $datosl['MAX(ident)'];
         $ident++;
      } else {
         $ident = 1;
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
               if ($sql3) {
                  $jsonFile = 'rutdat.json';
                  $jsonData = file_get_contents($jsonFile);
                  $data = json_decode($jsonData, true);
                  $nuevaRuta = array(
                     'ident' => $ident,
                     'idrep' => -1,
                     'latrep' => 0,
                     'lonrep' => 0,
                     'latent' => floatval($latitud),
                     'lonent' => floatval($longitud)
                  ); 
                  $data[] = $nuevaRuta;              
                  $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
                  file_put_contents($jsonFile, $newJsonData);

                  echo '<script type="text/javascript">
                alert("Compra Exitosa!");
                window.location= "../pantallas/main.php";
                </script>
                ';
               } else {
                  echo "Error INSERT ENTREGA";
               }
            } else {
               echo "Error INSERT COMPRA";
            }
         } else {
            echo "Error UPDATE CARRITO";
         }
      } else {
         echo "Error";
      }
   } else {
      echo "No se encontraron resultados para la dirección proporcionada.";
   }
}
