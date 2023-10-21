<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iddir = $_POST['dirid'];
    $direccion = $_POST['direccion'];
    $municipio = $_POST['municipio'];
    $det = $_POST['detalle'];
    $dir = $direccion . ", " . $municipio . ", Santander, Colombia";
    $api_key = "AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc";
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($dir) . "&key=" . $api_key;
    $response = file_get_contents($url);
    // Decodifica la respuesta JSON
    $data = json_decode($response);
    // Verifica si la solicitud fue exitosa y si se encontraron resultados
    if ($data && $data->status === "OK" && !empty($data->results)) {        
        $sql = $conexion->query("UPDATE direccion 
            SET nomdir='$dir', detdir='$det'
            WHERE iddir=$iddir");
            if($sql){
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
    } else {
?>
        <script>          
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                        title: 'Error!',
                        text: 'No se encontraron resultados para la dirección proporcionada.',
                        icon: 'error',
                        buttons: false,
                        timer: 1900,
                    })
                    .then((value) => {
                        history.back();
                    });
            });
        </script>
<?php
    }
}
