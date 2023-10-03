<?php
session_start();
if (empty($_SESSION['rol'])) {
    header("location:page-404.html");
}
include "../includes/conexion.php";
$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <base href="" />
    <title>SVMeEx</title>
    <meta charset="utf-8" />
    <meta name="description" content="Supermercado Virtual MercaExpress" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="es_CO" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Supermercado Virtual MercaExpress" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="SVMeEx" />
    <link rel="shortcut icon" href="../assets/img/logoMER.webp" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/mcss.css">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/fetch.js"></script>
</head>
<!-- Inicio Menu TOP -->
<header class="header-bg-color" id="topheader">

</header>
<!-- Fin Menu TOP -->

<body>
    <!-- Inicio Main -->
    <main class="mb-5">
        <!-- Inicio Menu LATERAL -->
        <div class="offcanvas offcanvas-start menulat" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Menu LATERAL -->

        <!-- Inicio Carrito -->
        <div class="offcanvas offcanvas-end car-bg-color" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel"></div>
        <!-- Fin Carrito -->

        <div class="container-fluid mt-5">
            <?php
            $cont = 0;
            $sql = $conexion->query("SELECT u.prinom, u.segnom,u.priape,u.segape,s.correo,u.rol FROM usuario as u
                                        INNER JOIN seguridad as s on s.idusu = u.idusu
                                        WHERE u.idusu=" . $_SESSION['idusu'] . "
                                        ");
            if ($datos = $sql->fetch_array()) {
                $Nom1 = $datos['prinom'];
                $Nom2 = $datos['segnom'];
                $Ape1 = $datos['priape'];
                $Ape2 = $datos['segape'];
                $Email = $datos['correo'];
                $TipoUsu = $datos['rol'];
            ?>
                <div class="row mt-3">
                    <div class="col text-center h4 my-auto">
                        <label class="m-1"><b>Primer Nombre: </b><?php echo $Nom1; ?></label>
                        <br>
                        <label class="m-1"><b>Segundo Nombre: </b><?php echo $Nom2; ?></label>
                        <br>
                        <label class="m-1"><b>Primer Apellido: </b><?php echo $Ape1; ?></label>
                        <br>
                        <label class="m-1"><b>Segundo Apellido: </b><?php echo $Ape2; ?></label>
                        <br>
                        <label class="m-1"><b>Correo: </b><?php echo $Email; ?></label>
                    </div>
                    <div class="col text-center my-auto">
                        <img src="../assets/img/logoMER.webp" alt="">
                        <br>
                        <label class="m-2 h4"><b>Tipo de Usuario: </b><?php
                                                                        switch ($TipoUsu) {
                                                                            case 1:
                                                                                echo 'Administrador';
                                                                                break;
                                                                            case 2:
                                                                                echo 'Cliente';
                                                                                break;
                                                                            case 3:
                                                                                echo 'Repartidor';
                                                                                break;
                                                                            case 3:
                                                                                echo 'Empleado';
                                                                                break;
                                                                            default:
                                                                                echo 'no reconocido';
                                                                        }

                                                                        ?></label>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>




    </main>
    <!-- Footer -->
    <!-- <footer class="footer-bg-color text-light text-center py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2023 SVMeEx</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Inicio</a></li>
                        <li class="list-inline-item"><a href="#">Productos</a></li>
                        <li class="list-inline-item"><a href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> -->

    <!-- Fin Main -->
</body>
<script src="https://kit.fontawesome.com/70d8b545d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/reusephp.js"></script>

</html>