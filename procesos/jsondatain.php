<?php
 include "conexion.php";
//  session_start();
//  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//  if (empty($_GET['idusu'])) {    
//     echo 'ERROR';
// }else{
       // Obtener las variables latitud y longitud
       $ident = $_POST['ident'];
       $lat = $_POST['lat'];
       $lng = $_POST['lng'];
       $idrep = $_POST['idrep'];
    //    $ident =0;
    //    $lat = 7.477705955505371;
    //    $lng = -73.25914764404297;
       
       // Cargar la estructura JSON desde el archivo externo
       $jsonFile = 'rutdat.json';
       $jsonData = file_get_contents($jsonFile);
       
       // Decodificar el JSON en un array asociativo
       $data = json_decode($jsonData, true);
       
       // Buscar el objeto con idrep igual a "x"
       foreach ($data as &$item) {
           if ($item['ident'] == $ident) {
                    $item['idrep'] =  intval($idrep);
                    $item['latrep'] =  floatval($lat);        
                    $item['lonrep'] =  floatval($lng);                            
           }
       }
       // Convertir el array actualizado en una cadena JSON
       $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
       // Guardar la nueva cadena JSON en el archivo externo
       file_put_contents($jsonFile, $newJsonData);
       // Mostrar la nueva cadena JSON como respuesta
    //    header('Content-Type: application/json'); // Establecer el encabezado como JSON
    //    echo $newJsonData;
