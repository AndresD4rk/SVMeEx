
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