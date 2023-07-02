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
    <link rel="shortcut icon" href="img/logoMER.webp" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mcss.css">
</head>

<body>


    <nav id="mynav" class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="" type="button" id="toggleButton">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </div>
    </nav>
    <div class="row float-start" id="menulat">
        
            <div class="col-6">
                <h1>Item 1</h1>
            </div>
            <div class="col-6">
                <h1>Item 2</h1>
            </div>
            <div class="col-6">
                <h1>Item 1</h1>
            </div>
            <div class="col-6">
                <h1>Item 2</h1>
            </div><div class="col-6">
                <h1>Item 1</h1>
            </div>
            <div class="col-6">
                <h1>Item 2</h1>
            </div>
        
    </div>

    <main class="d-flex align-items-center justify-content-center">

    </main>

</body>
<script>
    var toggleButton = document.getElementById('toggleButton');
var elementToToggle = document.getElementById('menulat');

toggleButton.addEventListener('click', function() {
  if (elementToToggle.style.visibility === 'hidden') {
    elementToToggle.style.visibility = 'visible';
  } else {
    elementToToggle.style.visibility = 'hidden';
  }
});


</script>
</html>