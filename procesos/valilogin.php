<?php
session_start();
include "conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['email']) and empty($_POST['pass'])) {
        echo '';
        echo '<script type="text/javascript">
    alert("Ingrese el Correo y Clave!");
    history.back();
    </script>
    ';
    } else {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $sql = $conexion->query("SELECT idusu FROM
        seguridad WHERE correo='$email' and clave='$pass'");
        $datos = $sql->fetch_array();
        if ($datos) {
            $idusu = $datos["idusu"];
            $sql1 = $conexion->query("SELECT * FROM
            usuario WHERE idusu='$idusu'");
            $datos1 = $sql1->fetch_array();
            if ($datos1) {
                $_SESSION['idusu'] = $datos["idusu"];                
                $_SESSION['nom1'] = $datos['prinom'];
                $_SESSION['nom2'] = $datos['segnom'];
                $_SESSION['ape1'] = $datos['priape'];
                $_SESSION['ape2'] = $datos['segape'];
                $_SESSION['rol'] = $datos['rol'];
                echo '<script type="text/javascript">
                alert("BIENVENIDO! ' . $_SESSION['nom1']." ".$_SESSION['ape1'] .'");
                window.location= "../pantallas/main.php";
                </script>
                ';
            } else {
                echo '<script type="text/javascript">
                alert("Ha ocurrido un problema comuniquese con administración");
                window.history.back();
                </script>
                ';
            }
        } else {
            echo '<script type="text/javascript">
                alert("Correo y/o clave incorrecta");
                window.history.back();
                </script>
                ';
        }
    }
}
