<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
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
} else {
    $email = $_POST["email"];    
    $nom1 = $_POST["nom1"];
    $nom2 = $_POST["nom2"];
    $ape1 = $_POST["ape1"];
    $ape2 = $_POST["ape2"];
    $rol = $_POST["SelRol"];
    $idusu=$_POST["id"];

    $sql1 = $conexion->query("UPDATE usuario
        SET prinom='$nom1', segnom='$nom2', priape='$ape1', segape='$ape2', rol=$rol
        WHERE idusu=$idusu");
    if ($sql1) {
        $sql2 = $conexion->query("UPDATE seguridad 
        SET correo='$email'
        WHERE idusu=$idusu");
        if ($sql2) {           
            ?>
                <script>                    
                    document.addEventListener("DOMContentLoaded", function() {
                        swal({
                                title: 'Usuario Actualizad@!',
                                text: '<?php echo $nom1 . " " . $ape1 ?>',
                                icon: 'success',
                                buttons: false,
                                timer: 1600,
                            })
                            .then((value) => {
                                window.location = "../ListUsu.php";
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
                                text: 'Comuníquese con administración',
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
}
