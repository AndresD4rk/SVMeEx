<?php
session_start();
include "conexion.php";
?>
<div class="offcanvas-body">
    <div class="container-fluid mt-sm-4 mt-2">
        <!-- Inicio Card Grupo De Carrito -->
        <div class="card-group container-fluid">
            <div class="col-12 justify-content-end">
                <h3 class="text-end fw-bold">Carrito</h3>
            </div>
            <div class="row">
                <?php
                $sql = $conexion->query("SELECT * FROM carrito as c 
                INNER JOIN detcarrito AS d ON d.idcar = c.idcar
                INNER JOIN producto AS p ON d.idpro=p.idpro
                WHERE c.idusu= " . $_SESSION['idusu'] . " AND estado = 1");
                if (mysqli_num_rows($sql) > 0) {
                    while ($datos = $sql->fetch_array()) { ?>
                        <div class="card col-12">
                            <div class="row p-1">
                                <div class="col my-auto">
                                    <img class="card-img  mx-auto my-auto img-fluid" src="../assets/img/productos/<?php echo $datos['idpro'] ?>.webp" alt="Card image cap" style="max-height: 120px;">
                                </div>
                                <div class="col my-auto">
                                    <div class="row">
                                        <div class="col-12 card-body text-center">
                                            <h5 class="card-title"><?php echo $datos['nompro'] ?></h5>
                                            <p class="card-text mb-0"><?php echo "$ " . number_format($datos['precio']) . " c/u" ?></p>
                                            <p class="card-text"><?php echo "Cantidad: " . number_format($datos['canpro']) ?></p>
                                            <!-- <p class="card-text">Nose</p> -->
                                        </div>
                                        <div class="col-12 d-flex justify-content-end align-items-end">
                                            <button class="btn btn-secondary btn-sm me-1 mb-1 fa-solid fa-minus"></button>
                                            <button class="btn btn-secondary btn-sm me-2 mb-1 fa-solid fa-plus"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><?php
                            }
                                ?>
                    <!-- Fin Card De Carrito -->
            </div>
        </div>
        <!-- Fin Card Grupo De Carrito -->
        <div class="card mt-2" style=" background: none; border:none;">
            <div class="col-12 mb-2">
                <h3 class="text-end">
                    <?php
                    $vtc = 0;
                    $sqlx = $conexion->query("SELECT tolcar FROM carrito
                    WHERE idusu= " . $_SESSION['idusu'] . " AND estado = 1");
                    if ($datos = $sqlx->fetch_array()) {
                        echo "Total: $" . number_format($datos['tolcar']);
                        $vtc = $datos['tolcar'];
                    }
                    ?>

                </h3>
            </div>
            <div class="d-flex justify-content-end align-content-end">
                <div class="justify-content-end align-items-end me-1">
                    <button onclick="" class="btn btn-danger float-right">Cancelar</button>
                </div>
                <div class="justify-content-end align-items-end">

                    <button onclick="irCompras(<?php echo $vtc ?>)" class="btn btn-success  float-right">Comprar</button>
                </div>
            </div>
        </div><?php
                } else {
                ?>
        <!-- Fin Card De Carrito -->
    </div>
    <!-- Fin Card Grupo De Carrito -->
    <div class="col-12">
        <h5 class="mt-5 text-center">Agregar producto al carrito</h5>
    </div>


<?php
                } ?>
</div>
</div>