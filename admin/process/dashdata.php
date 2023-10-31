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
}else if($_GET['data']==2){

$sql = $conexion->query("SELECT DATE(o.feccom) AS fecha,SUM(c.tolcar) AS ventas FROM carrito AS c
INNER JOIN compra AS o ON c.idcar=o.idcar
WHERE estado = 2
GROUP BY fecha
ORDER BY ventas DESC
LIMIT 7");
$ventas=array();
while ($datos = $sql->fetch_array()) {
// array_push($ventas, $datos['nompro'],$datos['count(canpro)']);
$ventas[] = array(
    $datos['fecha'],
    $datos['ventas'],
  );
  array_push($ventas);
}
$json = json_encode($ventas);
echo $json;
} else if ($_GET['data']==3){
  $sql = $conexion->query("SELECT caninv, mininv,nompro, (caninv-mininv) AS continv FROM inventario AS i
INNER JOIN producto AS p ON i.idpro=p.idpro
ORDER BY continv");
$ventas=array();
while ($datos = $sql->fetch_array()) {
// array_push($ventas, $datos['nompro'],$datos['count(canpro)']);
$ventas[] = array(
    $datos['caninv'],
    $datos['mininv'],
    $datos['nompro'],
  );
  array_push($ventas);
}
$json = json_encode($ventas);
echo $json;
}
?>