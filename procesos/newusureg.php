<?php
session_start();
$idusu = 0;
include "conexion.php";

if (empty($_POST['email'])) {
    echo '<script type="text/javascript">
    alert("Error Informe a Soporte");
    history.back();
    </script>';
} else if ($_POST["clave"] == $_POST["clave2"]) {
    $email = $_POST["email"];
    $clave = $_POST["clave"];
    $nom1 = $_POST["nom1"];
    $nom2 = $_POST["nom2"];
    $ape1 = $_POST["ape1"];
    $ape2 = $_POST["ape2"];
    $sql = $conexion->query("SELECT MAX(idusu) FROM usuario");
    $datos = $sql->fetch_array();
    if ($datos) {
        $idusu = $datos["MAX(idusu)"];
        $idusu++;
    } else {
        $idusu++;
    }

    $sql1 = $conexion->query("INSERT INTO
        usuario (idusu,prinom,segnom,priape,segape,rol)
        VALUES ($idusu,'$nom1','$nom2','$ape1','$ape2', 1)");
    if ($sql1) {
        $sql2 = $conexion->query("INSERT INTO
        seguridad (correo, clave, idusu)
        VALUES ('$email','$clave',$idusu)");
        if ($sql2) {
            $_SESSION['idusu'] = $idusu;
            $_SESSION['nom1'] = $nom1;
            $_SESSION['nom2'] = $nom2;
            $_SESSION['ape1'] = $ape1;
            $_SESSION['ape2'] = $ape2;
            $_SESSION['rol'] = 1;
            echo '<script type="text/javascript">
            alert("BIENVENIDO! ' . $_SESSION['nom1'] . " " . $_SESSION['ape1'] . '");
            window.location= "../pantallas/main.php";
            </script>
            ';
        } else {
            echo '<script type="text/javascript">
            alert("Fallo el resgistro!");
            window.location= "../pantallas/Regis.php";
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
    alert("Ha ocurrido un problema comuniquese con administración");
    history.back();
    </script>';
    }
} else {
    echo '<script type="text/javascript">
    alert("Las claves no coinciden");
    history.back();
    </script>';
}
