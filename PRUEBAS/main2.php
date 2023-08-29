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
    <link rel="stylesheet" href="css/mcss2.css">
</head>

<body>
    <!-- Inicio Menu TOP -->
    <nav id="mynav" class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <button class="" type="button" id="toggleButton1">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </div>
    </nav>
    <!-- Fin Menu TOP -->

    <!-- Inicio Main -->
    <main>
        <!-- Inicio Menu LATERAL -->
        <div class="float-start" id="menulat">
            <div class="row col-12">
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
                </div>
                <div class="col-6">
                    <h1>Item 1</h1>
                </div>
                <div class="col-6">
                    <h1>Item 2</h1>
                </div>
            </div>

        </div>
        <!-- Fin Menu LATERAL -->

        <div class="row col-12 mx-auto">
            <div class="col-10" style="background-color: red;">
                <h1>A</h1>
            </div>
            <div class="col-2" style="background-color:aqua;">
                <h1>A</h1>
            </div>
        </div>
    </main>
    <!-- Fin Main -->
</body>
<script>
    var toggleButton = document.getElementById('toggleButton1');
    var elementToToggle = document.getElementById('menulat');
    elementToToggle.style.visibility = 'hidden';
    elementToToggle.style.height = '0vw';
    toggleButton.addEventListener('click', function() {

        if (elementToToggle.style.visibility === 'hidden') {

            elementToToggle.style.visibility = 'visible';
            if (window.innerWidth >= 767) {
                elementToToggle.style.height = 'fit-content';
            } else {
                elementToToggle.style.height = 'fit-content';
            }
        } else {
            elementToToggle.style.height = '0vw';

            setTimeout(function() {
                elementToToggle.style.visibility = 'hidden';
            }, 500);
        }
    });
</script>

</html>