<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direccion = $_POST['direccion'];
    $municipio = $_POST['municipio'];
    $dir = $direccion . ", " . $municipio;
    $det = $_POST['detalle'];
    $lat = doubleval($_POST['lat']);
    $lng = doubleval($_POST['lng']);
    $iddir = $_POST['id'];
    $sql = $conexion->query("UPDATE direccion 
            SET nomdir='$dir', detdir='$det',lat='$lat',lng='$lng'
            WHERE iddir=$iddir");
    if ($sql) {
?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                        title: 'Dirección Actualizada!',
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
