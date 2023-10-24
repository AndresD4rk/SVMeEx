<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
session_start();
// echo '<script type="text/javascript">
// alert("Error DIRRECCION");
// history.back();
// </script>';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idusu = $_POST['idusu'];
    $ident = $_POST['ident'];
    $sql = $conexion->query("INSERT INTO entregarepartidor 
    (ident,idusu)
    VALUES ($ident,$idusu)");
    if ($sql) {
        $sql1 = $conexion->query("UPDATE entrega
        SET estent = 1 
        WHERE ident=" . $ident . "");
        if ($sql1) {
?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal({
                            title: 'Asignación exitosa',
                            text: "\n",
                            icon: 'success',
                            buttons: false,
                            timer: 3000,
                        })
                        .then((value) => {
                            window.location = "../Entregas.php";
                        });
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal({
                            title: 'Asignación Fallida!',
                            text: "\n",
                            icon: 'error',
                            buttons: false,
                            timer: 3000,
                        })
                        .then((value) => {
                            window.location = "../Entregas.php";
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
                        title: 'Registro Fallido!',
                        text: "\n",
                        icon: 'error',
                        buttons: false,
                        timer: 3000,
                    })
                    .then((value) => {
                        window.location = "../Entregas.php";
                    });
            });
        </script>
<?php
    }
}
