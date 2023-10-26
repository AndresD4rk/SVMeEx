<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direccion = $_POST['direccion'];
    $municipio = $_POST['municipio'];
    $dirr= $direccion.", ".$municipio;
    $det = $_POST['detalle'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $iddir = 0;
    $idusu = $_SESSION['idusu'];
    $sql = $conexion->query("SELECT MAX(iddir) FROM direccion");
    if ($datos = $sql->fetch_array()) {
        $iddir = $datos['MAX(iddir)'];
        $iddir++;
    } else {
        $iddir = 1;
    }
    $insertsql = $conexion->query("INSERT INTO
            direccion (iddir,idusu,nomdir,detdir,lat,lng)
            VALUES ('$iddir','$idusu','$dirr','$det','$lat','$lng')");
    if ($insertsql) {
?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                        title: 'Dirección Registrada!',
                        text: ' ',
                        icon: 'success',
                        buttons: false,
                        timer: 1900,
                    })
                    .then((value) => {
                        window.location = "../../public/User.php";
                    });
            });
        </script>
<?php
    }
}
