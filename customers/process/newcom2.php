<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../assets/css/mcss.css">
<?php
include "../../includes/conexion.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo $_POST['dira']." ".$_POST['dirm'];
    // die;
    $iddir = $_POST['dira'];    
    $timestamp = time();
    $idcom = 0;
    $idusu = $_SESSION['idusu'];
    $sql = $conexion->query("SELECT MAX(idcom) FROM compra  ");
    if ($datos = $sql->fetch_array()) {
        $idcom = $datos['MAX(idcom)'];
        $idcom++;
    } else {
        $idcom = 1;
    }
    $ident = 0;
    $sqll = $conexion->query("SELECT MAX(ident) FROM entrega  ");
    if ($datosl = $sqll->fetch_array()) {
        $ident = $datosl['MAX(ident)'];
        $ident++;
    } else {
        $ident = 1;
    }
    $sqlcar = $conexion->query("SELECT idcar FROM carrito
      WHERE idusu=" . $idusu . " AND estado= 1");
    if ($datoscar = $sqlcar->fetch_array()) {
        $idcar = $datoscar['idcar'];
        $sql1 = $conexion->query("UPDATE carrito
         SET estado = 2 
         WHERE idcar=" . $idcar . "");
        if ($sql1) {
            $sql2 = $conexion->query("INSERT INTO
            compra (idcom,idcar,feccom)
            VALUES ('$idcom','$idcar',FROM_UNIXTIME($timestamp))");
            if ($sql2) {
                $sql3 = $conexion->query("SELECT * FROM direccion
                WHERE iddir=$iddir");
                if ($datosdir = $sql3->fetch_array()) {
                    $nomdir=$datosdir['nomdir'];
                    $detdir=$datosdir['detdir'];
                    $lat=doubleval($datosdir['lat']);
                    $lng=doubleval($datosdir['lng']);                    
                    $sql4 = $conexion->query("INSERT INTO
            entrega (ident,idcom,estent,dirent,detent)
            VALUES ($ident,$idcom,0,'$nomdir','$detdir')");
                if ($sql4) {
                    $jsonFile = '../../employees/process/rutdat.json';
                    $jsonData = file_get_contents($jsonFile);
                    $data = json_decode($jsonData, true);
                    $nuevaRuta = array(
                        'ident' => $ident,
                        'idrep' => -1,
                        'latrep' => 0,
                        'lonrep' => 0,
                        'latent' => $lat,
                        'lonent' => $lng
                    );
                    $data[] = $nuevaRuta;
                    $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
                    file_put_contents($jsonFile, $newJsonData);
?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            swal("Compra Exitosa!", "", "success")
                                .then((value) => {
                                    swal(`The returned value is: ${value}`);
                                    window.location = "../../public/main.php";
                                });
                        });
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            swal("Error!", "INSERT ENTREGA", "error")
                                .then((value) => {
                                    swal(`The returned value is: ${value}`);
                                    history.back();
                                });
                        });
                    </script>
                <?php
                }
                }
                
            } else {
                ?>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        swal("Error!", "INSERT COMPRA", "error")
                            .then((value) => {
                                swal(`The returned value is: ${value}`);
                                history.back();
                            });
                    });
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Error!", "UPDATE CARRITO", "error")
                        .then((value) => {
                            swal(`The returned value is: ${value}`);
                            history.back();
                        });
                });
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                swal("Error!", "", "error")
                    .then((value) => {
                        swal(`The returned value is: ${value}`);
                        history.back();
                    });
            });
        </script>
<?php
    }
}
