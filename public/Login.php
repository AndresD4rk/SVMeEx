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
  <script src="../assets/js/fetch.js"></script>
</head>

<body>
<main class="d-flex align-items-center justify-content-center"> 
  <div  id="loginform" > 
<form class="logo formid" id="formlogin" action="process/valilogin.php" method="POST">
<div  class="mb-4">
  <!-- <h1 class="text-center">MercaExpress</h1> -->
  <img src="../assets/img/logoME.webp" class="col-6 rounded mx-auto d-block" alt="...">
</div>
<div class="col-12 mx-auto">
  <div  class="mb-3 mt-5">
    <label class="form-label">Correo Electronico</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingresa el correo">
    <div id="emailHelp" class="form-text">Su correo electrónico está seguro con nosotros. Nunca lo compartiremos con terceros.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="pass" placeholder="Ingresa la contraseña">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <div class="row">
    <div class="col-6 text-start"><a onclick="registrar()" class="btn btn-warning">Registrarse</a></div>
    <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success2">Ingresar</button></div>
  </div>
  
  
  </div>
</form>
</div>
</main>

</body>

</html>
<script>
function registrar(){
    window.location= "Regis.php";
}
</script>

