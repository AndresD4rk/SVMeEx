<!DOCTYPE html>
<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="../../assets/css/swal.css">
<link rel="stylesheet" href="../assets/css/pcss.css">
<body>
<?php
session_start();
include "../../includes/conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['email']) and empty($_POST['pass'])) {
        echo '';
        ?>
            <script>                    
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'Ingrese el Correo y/o Clave!',  
                                text: "\n",                              
                                icon: 'warning',
                                buttons: false,
                                timer: 3000,
                            })
                            .then((value) => {
                                window.history.back();
                            });
                    });
                </script><?php        
    } else {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $sql = $conexion->query("SELECT idusu FROM
        seguridad WHERE correo='$email' and clave='$pass'");
        $datos = $sql->fetch_array();
        if ($datos) {
            $idusu = $datos["idusu"];
            $sql1 = $conexion->query("SELECT * FROM
            usuario WHERE idusu=$idusu");
            $datos1 = $sql1->fetch_array();
            if ($datos1) {
                $_SESSION['idusu'] = $datos1["idusu"];
                $_SESSION['nom1'] = $datos1['prinom'];
                $_SESSION['nom2'] = $datos1['segnom'];
                $_SESSION['ape1'] = $datos1['priape'];
                $_SESSION['ape2'] = $datos1['segape'];
                $_SESSION['rol'] = $datos1['rol'];
?>
                <script>                    
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'BIENVENIDO!',
                                text: '<?php echo $_SESSION['nom1'] . " " . $_SESSION['ape1'] ?>',
                                icon: '../../assets/img/logoMER.webp',
                                buttons: false,
                                timer: 1900,
                            })
                            .then((value) => {
                                window.location = "../main.php";
                            });
                    });
                </script>

<?php
            } else {?>
            <script>                    
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'Ha ocurrido un problema!',
                                text: 'comuniquese con administración',
                                icon: 'error',                                                                          
                                buttons: false,
                                timer: 1900,
                            })
                            .then((value) => {
                                window.history.back();
                            });
                    });
                </script><?php                
            }
        } else {
            ?>
            <script>                    
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'Correo y/o clave incorrecta!',
                                text: 'Ingrese nuevamente',
                                icon: 'warning',
                                buttons: false,
                                timer: 3000,
                            })
                            .then((value) => {
                                window.history.back();
                            });
                    });
                </script><?php             
        }
    }
}


?>
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>

</html>