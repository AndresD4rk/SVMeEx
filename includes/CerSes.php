<?php
session_start();
session_destroy();
header("location:../public/Login.php");
include "../includes/conexion.php";
mysqli_close($conexion)
?>