<option value="">Elija una Categoria</option>
<?php
include "../../includes/conexion.php";
$sql = $conexion->query("SELECT * 
            FROM categoria");
while ($datos = $sql->fetch_array()) {
    echo '<option value="' . $datos['idcat'] . '">' . $datos['nomcat'] . '</option>';
}?>
