<?php
session_start();
include "conexion.php";
// if($_SESSION['rol']!=2 && $_GET['filtbusq']!=""){
// die;
// }
?>
<div class="container-fluid">
    <?php
    $cont = 0;
    $sql = $conexion->query("SELECT * FROM producto AS p
                INNER JOIN categoria AS c ON p.idcat = c.idcat
                INNER JOIN inventario AS s ON p.idpro = s.idpro
                WHERE p.nompro LIKE CONCAT('%', '" . $_GET['filtbusq'] . "', '%')
                OR c.nomcat LIKE CONCAT('%', '" . $_GET['filtbusq'] . "', '%')");
    echo '  <div class="card-group">
                            <div class="row align-content-center justify-content-center">';
    if ($sql->num_rows === 0) {
        // No se encontraron resultados
        echo "<h2>No se encontraron resultados.</h2>";
        echo '</div></div>';
        die;
    }
    while ($datos = $sql->fetch_array()) {
        $idpro = $datos['idpro'];
        $nompro = $datos['nompro'];
        $precio = $datos['precio'];
        $nomcat = $datos['nomcat'];
        $descripcion = $datos['despro']; 
        $cansto = $datos['caninv'];        
        echo '  <div class="card col-md-4 mx-1 my-2" style="width: 18rem;">                                
        <img data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="'.$descripcion.'" class="card-img-top mx-auto mt-1 img-fluid h-50" src="../assets/img/productos/' . $idpro . '.webp" alt="Card image cap">                            
                                <div class="card-body">
                                    <p class="card-title text-center fw-semibold">' . $nompro . '</p>                                   
                                    <p class="card-text">
                                        <div class= "row">
                                            <span class="col-sm text-sm-start col-12 text-center">' . $nomcat . '</span> 
                                            <span class="col-sm text-sm-end col-12 text-center"> Cant: ' . number_format($cansto) . '</span>
                                        </div>
                                    </p>                            
                                    <p class="card-text text-end" >Precio: $' . number_format($precio,2) . '</p>   
                                    <div class="col-12 d-flex justify-content-end align-items-end">                                    
                                        <button onclick="enviarFormularioCarrito(' . $idpro . ',' . $cansto . ', ' . $precio .  ')" class="btn btn-outline-success btn-sm me-2 mb-1 fa-solid fa-cart-shopping"></button>
                                    </div>
                                </div>
                            </div>';
    }
    echo '</div></div>';
    ?>
</div>