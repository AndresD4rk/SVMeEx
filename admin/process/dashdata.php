<?php 
include "../../includes/conexion.php";
if($_GET['data']==1){
    $sql = $conexion->query("SELECT d.idpro,p.nompro, count(canpro)  FROM detcarrito AS d
    INNER JOIN producto AS p ON p.idpro=d.idpro
    GROUP BY idpro ORDER BY count(canpro) LIMIT 5");
    $ventas=array();
    while ($datos = $sql->fetch_array()) {
    // array_push($ventas, $datos['nompro'],$datos['count(canpro)']);
    $ventas[] = array(
        $datos['nompro'],
        $datos['count(canpro)'],
      );
      array_push($ventas);
    }
    $json = json_encode($ventas);
    echo $json;
}else{

$sql = $conexion->query("SELECT d.idpro,p.nompro, count(canpro)  FROM detcarrito AS d
INNER JOIN producto AS p ON p.idpro=d.idpro
GROUP BY idpro ORDER BY count(canpro) LIMIT 3");
$ventas=array();
while ($datos = $sql->fetch_array()) {
// array_push($ventas, $datos['nompro'],$datos['count(canpro)']);
$ventas[] = array(
    $datos['nompro'],
    $datos['count(canpro)'],
  );
  array_push($ventas);
}
$json = json_encode($ventas);
echo $json;
}
?>