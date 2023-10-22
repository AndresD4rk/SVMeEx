<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $ident = $_GET['id'];               
        $sql = $conexion->query("UPDATE entrega 
            SET estent=2
            WHERE ident=$ident");
            $jsonFile = 'rutdat copy.json';
            $jsonData = file_get_contents($jsonFile);
            $data = json_decode($jsonData, true);
            foreach ($data as $key => $element) {
                if ($element['ident'] === $ident) {
                    unset($data[$key]); // Elimina el elemento en la posición $key
                    break; // Termina el bucle después de encontrar el primer elemento coincidente
                }
            }  
            $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($jsonFile, $newJsonData);
            if($sql){
                ?>
                <script>          
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'Entrega Confirmada!',
                                text: ' ',
                                icon: 'success',
                                buttons: false,
                                timer: 1900,
                            })
                            .then((value) => {
                                window.location = "../EntregasHabilitadas.php";
                            });
                    });
                </script>
        <?php
            }
    
}
