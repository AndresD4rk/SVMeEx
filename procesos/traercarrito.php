<?php
session_start();
include "conexion.php";
?>
<!-- Inicio Card Grupo De Carrito -->
<div class="card-group d-block">
<h4 class="text-center">Carrito</h4>
<?php
$sql = $conexion->query("SELECT * FROM carrito as c 
                INNER JOIN detcarrito AS d ON d.idcar = c.idcar
                INNER JOIN producto AS p ON d.idpro=p.idpro
                WHERE c.idusu= " . $_SESSION['idusu'] . " AND estado = 1");
if (mysqli_num_rows($sql) > 0) {
    while ($datos = $sql->fetch_array()) { ?>
    
        <div class="card">
            <div class="row p-1">
                <div class="col my-auto">
                    <img src="https://via.placeholder.com/150" class="card-img" alt="Image">
                </div>
                <div class="col my-auto">
                    <div class="row">
                        <div class="col-12 card-body text-center">
                            <h5 class="card-title"><?php echo $datos['nompro'] ?></h5>
                            <p class="card-text"><?php echo $datos['precio'] ?></p>
                            <p class="card-text"><?php echo $datos['canpro'] ?></p>
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
    <!-- Fin Card Grupo De Carrito -->
    <div class="card mt-2" style=" background: none; border:none;">
        <div class="d-flex justify-content-end align-content-end">
            <div class="justify-content-end align-items-end me-1">
                <button onclick="" class="btn btn-danger float-right">Cancelar</button>
            </div>
            <div class="justify-content-end align-items-end">
                <button onclick="irCompras()" class="btn btn-success  float-right">Comprar</button>
            </div>
        </div>
    </div><?php
        } else {
            ?>
    <!-- Fin Card De Carrito -->
    </div>
    <!-- Fin Card Grupo De Carrito -->
    <h5 class="mt-5">Agregar producto al carrito</h5>
<?php
        } ?>