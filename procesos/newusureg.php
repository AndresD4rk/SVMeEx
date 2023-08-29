<?php
session_start();
include "conexion.php";
 
 if (empty($_POST['email'])) {    
    echo'<script type="text/javascript">
    alert("Error Informe a Soporte");
    history.back();
    </script>';
}else if($_POST["clave"] == $_POST["clave2"]){
    $email = $_POST["email"];
    $nom1 = $_POST["nom1"];
    $nom2 = $_POST["nom2"];
    $ape1 = $_POST["ape1"];
    $ape2 = $_POST["ape2"];
    $clave = $_POST["clave"];

    $sql = $conexion->query("INSERT INTO
    seguridad (email, nom1, nom2,ape1, ape2, clave , rol)
    VALUES ('$email', '$nom1', '$nom2','$ape1', '$ape2', '$clave' , 1)");
        if ($sql) {     
            $_SESSION['email'] = $email;
            $_SESSION['nom1'] = $nom1;
            $_SESSION['nom2'] = $nom2;
            $_SESSION['ape1'] = $ape1;
            $_SESSION['ape2'] = $ape2;
            $_SESSION['rol'] = 1;      
        echo'<script type="text/javascript">
        alert("REGISTRO EXITOSO, BIENVENIDO! '.$_SESSION['nom1'].'");
        window.location= "../pantallas/main.php";
        </script>';
        } else {
            echo'<script type="text/javascript">
            alert("Fallo el resgistro!");
            window.location= "../pantallas/Regis.php";
            </script>';
        }         
         

}else{
    echo'<script type="text/javascript">
    alert("Las claves no coinciden");
    history.back();
    </script>';
}

