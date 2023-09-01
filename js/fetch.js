
//SCRIPT PARA EL REGISTRO
function enviarFormularioCat() {
    // Obtener el formulario
    const formulario = document.getElementById('CatForm');

    // Crear un objeto FormData con los datos del formulario
    const formData = new FormData(formulario);

    // Realizar la solicitud Fetch
    fetch('../procesos/newCat.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud.');
            }
            return response.text();
        })
        .then(data => {
            // Se recibió una respuesta exitosa del servidor
            //alert(data);
            //

        })
        .catch(error => {
            // Ocurrió un error en la solicitud
            console.error('Error en la solicitud:', error);
            alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
        });
}


function enviarFormularioFam() {
    // Obtener el formulario
    const formulario = document.getElementById('FamForm');

    // Crear un objeto FormData con los datos del formulario
    const formData = new FormData(formulario);

    // Realizar la solicitud Fetch
    fetch('../procesos/newFam.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud.');
            }
            return response.text();
        })
        .then(data => {
            // Se recibió una respuesta exitosa del servidor
            //alert(data);
            //actualizarSelect(data);
        })
        .catch(error => {
            // Ocurrió un error en la solicitud
            console.error('Error en la solicitud:', error);
            alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
        });
}


function mostrarFormulario(formulario) {
    // Obtenemos la referencia al contenedor del formulario
    const formularioContainer = document.getElementById('formularioContainer');

    // Limpiamos el contenido actual del contenedor
    formularioContainer.innerHTML = '';

    // Creamos el contenido del formulario según el botón pulsado
    if (formulario === 1) {
        formularioContainer.innerHTML = `
        <!-- Formulario 1 -->
            <form id="CatForm">  
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Registro de Categoria</h2>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label class="form-label ">Nombre de la Categoria</label>
                            <input type="text" class="form-control" name="NomCat" placeholder="Ingresa el nombre de la categoria">
                        </div>
                        <div class="text-end mb-2"><button class="btn btn-success" onclick="enviarFormularioCat()">Registrar</button></div>
                    </div>
                </div> 
            </form>
      `;
    } else if (formulario === 2) {
        formularioContainer.innerHTML = `
        <!-- Formulario 2 -->
            <form id="FamForm">  
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Registro de Familia</h2>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label class="form-label ">Nombre de la Familia</label>
                            <input type="text" class="form-control" name="NomFam" placeholder="Ingresa el nombre de la familia">
                        </div>
                        <div class="text-end mb-2"><button class="btn btn-success" onclick="enviarFormularioFam()">Registrar</button></div>
                    </div>
                </div> 
            </form>
      `;
    } 

    // Mostramos el "offcanvas"
    const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasTop'));
    offcanvas.show();
}


function mostrarFormularioLP(formulario, idProd) {
    // Obtenemos la referencia al contenedor del formulario
    const formularioContainer = document.getElementById('formularioContainer');

    // Limpiamos el contenido actual del contenedor
    formularioContainer.innerHTML = '';

    // Creamos el contenido del formulario según el botón pulsado
    if (formulario === 1) {
        formularioContainer.innerHTML = `
        <!-- Formulario 1 -->
        <form id="EditPro">
        <div class="col-11 mx-auto">
            <h2 class="text-center">Editar de Producto</h2>
            <div class="row">
                <!-- CATEGORIA DEL PRODUCTO -->
                <div class="col-6 mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label ">Categoria</label>
                    <select class="form-select" aria-label="Default select example" name="SelCat" required>
                    <option value="">Elija una Categoria</option>
                        <?php
                        $sql = $conexion->query("SELECT * 
                        FROM categoria");
                        while ($datos = $sql->fetch_array()) {
                            echo '<option value="' . $datos['idcat'] . ';">' . $datos['nomcat'] . '</option>';
                        }
                        ?>
                    </select>
                    <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(1)">Agregar Categoria</button>
                </div>
                <!-- FAMILIA DEL PRODUCTO -->
                <div class="col-6 mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label ">Familia</label>
                    <select class="form-select" aria-label="Default select example" name="SelFam" required>
                    <option value="">Elija una Familia</option>
                        <?php
                        $sql = $conexion->query("SELECT * 
                        FROM familia");
                        while ($datos = $sql->fetch_array()) {
                            echo '<option value="' . $datos['idfam'] . ';">' . $datos['nomfam'] . '</option>';
                        }
                        ?>
                    </select>
                    <button type="button" class="btn btn-warning mt-2" onclick="mostrarFormulario(2)">Agregar Familia</button>
                </div>
                <!-- NOMBRE DEL PRODUCTO -->
                <div class="col-6 mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label ">Nombre del Producto</label>
                    <input type="text" class="form-control" name="NomPro" placeholder="Ingresa el nombre del Producto" required>
                </div>
                <!-- VALOR DEL PRODUCTO -->
                <div class="col-6 mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label ">Valor del Producto</label>
                    <input type="number" class="form-control" name="Precio" placeholder="Ingresa el valor del producto" required>
                </div>
                <!-- CANTIDAD DEL PRODUCTO -->            
                <div class="col-6 mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">Cantidad del producto</label>
                    <input type="number" class="form-control" name="CanSto"  placeholder="Ingresa el stock inicial del producto" required>
                </div>
                <!-- STOCK MINIMO DEL PRODUCTO -->
                <div class="col-6 mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">Cantidad minima del producto</label>
                    <input type="number" class="form-control" name="MinSto" placeholder="Ingresa el stock minimo del producto" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start"><button class="btn btn-warning">Regresar</button></div>
                <div class="col-6 text-end   mb-2"><button type="submit" class="btn btn-success">Registrarse</button></div>
            </div>
        </div>
    </form>
      `;
    } else if (formulario === 2) {
        formularioContainer.innerHTML = `
        <!-- Formulario 2 -->
            <form id="FamForm">  
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Registro de Familia</h2>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label class="form-label ">Nombre de la Familia</label>
                            <input type="text" class="form-control" name="NomFam" placeholder="Ingresa el nombre de la familia">
                        </div>
                        <div class="text-end mb-2"><button class="btn btn-success" onclick="enviarFormularioFam()">Registrar</button></div>
                    </div>
                </div> 
            </form>
      `;
    } 

    // Mostramos el "offcanvas"
    const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasTop'));
    offcanvas.show();
}


function enviarFormularioCarrito(idprod) {
    const url = '../procesos/newcar.php?idprod=${idprod}';

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud.');
            }
            return response.text();
        })
        .then(data => {
            // Se recibió una respuesta exitosa del servidor
            alert(data);
            // ...

        })
        .catch(error => {
            // Ocurrió un error en la solicitud
            console.error('Error en la solicitud:', error);
            alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
        });
}

function enviarUbicacion(ident,lat,lng) {
    const url = '../procesos/actubi.php?ident=${ident}&lat=${lat}&lng=${lng}';

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud.');
            }
            return response.text();
        })
        .then(data => {
            // Se recibió una respuesta exitosa del servidor
            //alert(data);
            // ...

        })
        .catch(error => {
            // Ocurrió un error en la solicitud
            console.error('Error en la solicitud:', error);
            alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
        });
}


