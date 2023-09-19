<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
session_start();
include "../../includes/conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (empty($_SESSION['idusu'])) {
      echo 'Necesita Iniciar Sesion';
   } else {
      $idpro = $_GET['idprod'];
      $canpro = $_GET['canpro'];
      $idusu = $_SESSION['idusu'];
      $idcar = 0;
      //Revisa si el usuario tiene un carrito creado
      $sql = $conexion->query("SELECT idcar FROM carrito 
      WHERE idusu ='" . $idusu . "'AND estado= 1");
      if ($datos = $sql->fetch_array()) {
         $idcar = $datos['idcar'];
         //Revisa si el producto esta repetido en el carrito
         $sql2 = $conexion->query("SELECT idcar,canpro FROM detcarrito 
         WHERE idcar =" . $idcar . " AND idpro=" . $idpro . "");
         if ($datos1 = $sql2->fetch_array()) {
            $newcant = $datos1["canpro"];
            $newcant = intval($newcant) + intval($canpro);
            //Actualiza la cantidad del producto
            $sql3 = $conexion->query("UPDATE detcarrito
            SET canpro=" . $newcant . "
            WHERE idcar =" . $idcar . " AND idpro=" . $idpro . "");
            if ($sql3) {
               ?>
      <script>
         document.addEventListener("DOMContentLoaded", function() {
            swal("Producto agregado", "En el carrito", "success")
         });
      </script>
      <?php
            } else {
               ?>
      <script>
         document.addEventListener("DOMContentLoaded", function() {
            swal("Error!", "Al actualizar cantidad del producto", "error")         
         });
      </script>
      <?php
            }
         } else {
            //Agrega el producto al carrito
            $sql3 = $conexion->query("INSERT INTO
            detcarrito (idcar,idpro,canpro,precom)
            VALUES ($idcar,$idpro,$canpro,-1)");
            if ($sql3) {
               ?>
      <script>
         document.addEventListener("DOMContentLoaded", function() {
            swal("Producto agregado", "Al carrito", "success")              
         });
      </script>
      <?php

            } else {
               ?>
      <script>
         document.addEventListener("DOMContentLoaded", function() {
            swal("Error", "Al ingresar producto", "error")               
         });
      </script>
      <?php

            }
         }
      } else {
         // Saca el id maximo de carrito
         $sql1 = $conexion->query("SELECT MAX(idcar) FROM carrito");
         if ($datos = $sql1->fetch_array()) {
            $idcar = $datos['MAX(idcar)'];
            $idcar++;
         } else {
            $idcar = 1;
         }
         // Crea el carrito
         $sql2 = $conexion->query("INSERT INTO
         carrito (idcar,idusu,estado)
        VALUES ($idcar,$idusu,1)");
         if ($sql2) {
            //Agrega el producto al carrito
            $sql3 = $conexion->query("INSERT INTO
         detcarrito (idcar,idpro,canpro,precom)
         VALUES ($idcar,$idpro,$canpro,-1)");
            if ($sql3) {
               echo '<script type="text/javascript">
            alert("Producto agregado al carrito");
            </script>';
            } else {
               echo '<script type="text/javascript">
            alert("Falla al ingresar producto");
            </script>';
            }
         } else {
            echo '<script type="text/javascript">
            alert("Falla al crear carrito");
            </script>';
         }
      }
   }
}
