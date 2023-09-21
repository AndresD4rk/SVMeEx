<?php
 include "../../includes/conexion.php";
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 if (empty($_POST['NomCat'])) {    
   $response = array(
      'title' => 'Ingrese la Categoria!',
      'text' => ' ',
      'icon' => 'warning',
      'buttons' => false,
      'timer' => 3000,
  );              
  echo json_encode($response);   
}else{
    $nomcat = $_POST["NomCat"];
        $sql = $conexion->query("INSERT INTO
        categoria (nomcat)
        VALUES ('$nomcat')");
         if ($sql) {
            $response = array(
               'title' => 'Categoria Registrada!',
               'text' => ' ',
               'icon' => 'success',
               'buttons' => false,
               'timer' => 3000,
           );              
           echo json_encode($response);                  
         } else {
            echo "Error al Registrar Categoria";
         }         
}}?>
