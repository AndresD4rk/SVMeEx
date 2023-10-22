<?php
include "conexion.php";
session_start();
// echo '<script type="text/javascript">
// alert("Error DIRRECCION");
// history.back();
// </script>';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idusu = $_POST['idusu'];
    $ident = $_POST['ident'];    
    $sql = $conexion->query("INSERT INTO entregarepartidor 
    (ident,idusu)
    VALUES ($ident,$idusu)");
    if ($sql) {
        $sql1 = $conexion->query("UPDATE entrega
        SET estent = 1 
        WHERE ident=" . $ident . "");
        if($sql1){
            echo '<script type="text/javascript">
                alert("Registro Exitoso!");
                window.location= "../pantallas/Entregas.php";
                </script>
                ';
        }else{
            echo '<script type="text/javascript">
                alert("Registro Fallido! Update");
                window.location= "../pantallas/Entregas.php";
                </script>
                ';
        }
    } else {
        echo '<script type="text/javascript">
                alert("Registro Fallido! Insert");
                window.location= "../pantallas/Entregas.php";
                </script>
                ';
    }
}
