<?php
session_start();
 include "conexion.php";
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 if (empty($_POST['email']) and empty($_POST['pass'])) {    
    echo'';
    echo'<script type="text/javascript">
    alert("Ingrese el Correo y Clave!");
    history.back();
    </script>
    ';
}else{
    $email = $_POST["email"];
    $pass = $_POST["pass"];
        $sql = $conexion->query("SELECT * FROM
        seguridad WHERE email='$email' and clave='$pass'");
         if ($datos = $sql->fetch_array()) {
            $_SESSION['email'] = $datos['email'];
            $_SESSION['nom1'] = $datos['nom1'];
            $_SESSION['nom2'] = $datos['nom2'];
            $_SESSION['ape1'] = $datos['ape1'];
            $_SESSION['ape2'] = $datos['ape2'];
            $_SESSION['rol'] = $datos['rol'];
            echo'<script type="text/javascript">
                alert("BIENVENIDO! '.$_SESSION['nom1'].'");
                window.location= "../pantallas/main.php";
                </script>
                ';   
         } else {
            echo "Error al Registrar Familia";
         }         
}}
