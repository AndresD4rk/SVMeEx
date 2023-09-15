function mostrartopmenu() {
    const formularioContainer = document.getElementById('ruheader');
    formularioContainer.innerHTML = ``;
    formularioContainer.innerHTML = `
    <div class="container-fluid">
        <div class="row my-auto">
            <div class="col-8 col-sm-6 col-md-4 col-lg-3 my-2">
                <button class="btn btn-outline-dark me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="fa-solid fa-bars"></span>
                </button>
                <a href="main.php"><img class="logonav" src="../img/logoME.webp" alt="" style="height:40px;"></a>
                <!-- <span class="navbar-brand">ercaexpress</span> -->
            </div>
            <div class="d-block d-md-none col-4 col-sm-6 my-2 justify-content-end align-content-center">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-dark vercarrito" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1" aria-controls="offcanvasWithBothOptions">
                        <span class="fa-solid fa-cart-shopping"></span>
                    </button>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-6 my-2 justify-content-center align-content-end">
                <div class="input-group ">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Buscar Producto">
                    <a class="input-group-text"><i class="fa-solid fa-magnifying-glass fa-fade"></i></a>
                </div>
            </div>
            <div class="d-none d-md-block col-md-3 col-lg-3 col-3 my-2 justify-content-end align-content-center">
                <div class="d-flex justify-content-end">
                    <div class="d-none d-sm-block">
                        <button class="btn btn-outline-dark vercarrito" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions1" aria-controls="offcanvasWithBothOptions">
                            <span class="fa-solid fa-cart-shopping"></span>
                        </button>
                    </div>
                    <div class="d-none d-sm-block  me-1 mb-1 ">
                        <button class="btn btn-outline-dark" type="button" onclick="redirigirAPagina()">
                            <span class="fa-solid fa-receipt"></span>
                        </button>
                    </div>
                    <div class="d-none d-sm-block  me-1 mb-1 ">
                        <button class="btn btn-outline-dark" type="button" onclick="">
                            <span class="fa-solid fa-circle-user"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>    
    `;
}

function mostrarlatmenu() {
    const formularioContainer = document.getElementById('ruoffcavasstart');
    formularioContainer.innerHTML = ``;
    formularioContainer.innerHTML = `
       
    `;
}

function redirigirAPagina() {
    // Cambia 'nombre-de-tu-pagina.html' por la URL de la página a la que deseas redirigir.
    window.location.href = 'HistoCompras.php';
}