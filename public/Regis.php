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
  <link rel="stylesheet" href="../assets/css/pcss.css">
</head>
<body>
<main class="d-flex align-items-center justify-content-center"> 
  <div id="loginform"> 
<form id="formid" action="../public/process/newusureg.php" method="POST" enctype="multipart/form-data">
<div  class="mb-4">
  <h1 class="text-center">MercaExpress</h1>
  <img src="../img/logoMER.png" class="col-2 rounded mx-auto d-block" alt="...">
</div>
<div class="col-11 mx-auto">
<h2 class="text-center">Registro de Usuario</h2>
<div class="row">
<div  class="col-6 mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label ">Primer Nombre</label>
    <input type="text" class="form-control" name="nom1" aria-describedby="emailHelp" placeholder="Ingresa tu primer nombre">
  </div>
  <div  class="col-6 mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label ">Segundo Nombre</label>
    <input type="text" class="form-control" name="nom2" aria-describedby="emailHelp" placeholder="Ingresa tu segundo nombre">
  </div>
  <div  class="col-6 mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label ">Primer Apellido</label>
    <input type="text" class="form-control" name="ape1" aria-describedby="emailHelp" placeholder="Ingresa tu primer apellido">
  </div>
  <div  class="col-6 mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label ">Segundo Apellido</label>
    <input type="text" class="form-control" name="ape2" aria-describedby="emailHelp" placeholder="Ingresa tu segundo apellido">
  </div>
</div>
  <div  class="col-12 mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingresa el correo">
    <div id="emailHelp" class="form-text">Su correo electrónico está seguro con nosotros. Nunca lo compartiremos con terceros.</div>
  </div>
  <div class="row">
  <div class="col-6 mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="clave" placeholder="Ingresa la contraseña">
  </div>
  <div class="col-6 mb-3">
    <label for="exampleInputPassword1" class="form-label">Verifica la Contraseña</label>
    <input type="password" class="form-control" name="clave2" placeholder="Ingresa la nuevamente contraseña">
  </div>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <div class="row">
    <div class="col-6 text-start"><a onclick="irlogin()" class="btn btn-warning">Regresar</a></div>
    <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
  </div>
  
  
  </div>
  </div>
</form>
</div>
</main>

</body>

</html>

<script>
function irlogin(){
    window.location= "Login.php";
}
</script>


