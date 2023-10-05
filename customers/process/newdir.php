<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            direccion (iddir,idusu,nomdir,detdir)
            VALUES ('$iddir','$idusu','$dir','$det')");
            if($insertsql){
                ?>
                <script>          
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'Dirección Registrada!',
                                text: '',
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
