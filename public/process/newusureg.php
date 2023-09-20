<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="../../assets/css/swal.css">
<?php
session_start();
$idusu = 0;
include "../../includes/conexion.php";

if (empty($_POST['email'])) {
    ?>
    <script>                    
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                        title: 'Error email no disponible',  
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
        VALUES ($idusu,'$nom1','$nom2','$ape1','$ape2', 2)");
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
            $_SESSION['rol'] = 2;
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
        } else {
            ?>
            <script>                    
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'Fallo registro',
                                text: '\n',
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
                                title: 'Ha ocurrido un problema!',
                                text: 'Comuniquese con administración',
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
                                title: 'Claves Diferentes',
                                text: 'Ingrese la misma clave',
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
