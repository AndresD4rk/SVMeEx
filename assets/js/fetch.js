
//SCRIPT PARA EL REGISTRO
function enviarFormularioCat() {
    // Obtener el formulario
    event.preventDefault();
    const formulario = document.getElementById('CatForm');

    // Crear un objeto FormData con los datos del formulario
    const formData = new FormData(formulario);

    // Realizar la solicitud AJAX
    $.ajax({
        url: '../admin/process/newCat.php',
        type: 'POST',
        data: formData,
        processData: false, // Evitar el procesamiento automático de datos
        contentType: false, // No establecer el tipo de contenido automáticamente
        dataType: 'json',
        success: function (data) {
            //alert(data);
            swal({
                title: data.title,
                text: data.text,
                icon: data.icon,
                buttons: data.buttons,
                timer: data.timer,
            });

            if(data.icon=='success'){                
                recargarSelect();
                
            }
            // Se recibió una respuesta exitosa del servidor
            // alert(data);
        },
        error: function (error) {
            // Ocurrió un error en la solicitud
            console.error('Error en la solicitud:', error);
            alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
        }
    });
    // Agregar un manejador de eventos al formulario para evitar la recarga de la página
    formulario.addEventListener('submit', enviarFormularioCat);    
}
function recargarSelect() {
        // Realizar una solicitud AJAX para cargar el nuevo contenido del select
        $.ajax({
            url: '../admin/process/recarcate.php', // Especifica la ruta del servidor o API para obtener las nuevas opciones
            type: 'POST', // Puedes ajustar el método según tu necesidad
            dataType: 'html', // El tipo de datos que esperas recibir (HTML en este ejemplo)
            success: function (data) {
                // Actualiza el contenido del select con las nuevas opciones
                $('#select-categoria').html(data);    
                toggleoffcanvas();                              
            
            },
            error: function (error) {
                console.error('Error en la solicitud:', error);
                alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
            }
        });
    }


function newdirect() {
    // Obtener el formulario
    const formulario = document.getElementById('DirForm');

    // Crear un objeto FormData con los datos del formulario
    const formData = new FormData(formulario);

    // Realizar la solicitud Fetch
    fetch('../procesos/newdirecc.php', {
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
            <form id="DirForm">  
                <div class="col-11 mx-auto">
                    <h2 class="text-center">Nueva Dirección</h2>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label class="form-label ">Nombre de la Familia</label>
                            <input type="text" class="form-control" name="dir" placeholder="Ingresa la Dirección">
                        </div>
                        <div class="text-end mb-2"><button class="btn btn-success" onclick="newdirect()">Registrar</button></div>
                    </div>
                </div> 
            </form>
      `;
    }

    // Mostramos el "offcanvas"
    toggleoffcanvas();
}
// Declarar la variable para almacenar la instancia del offcanvas
let myOffcanvas = null;

function initOffcanvas() {
    // Inicializar la instancia del offcanvas solo una vez
    myOffcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasTop'));
}

function toggleoffcanvas() {
    // Verificar si la instancia del offcanvas está inicializada
    if (!myOffcanvas) {
        initOffcanvas();
    }

    // Llamar al método .toggle() en la instancia existente
    myOffcanvas.toggle();
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
    offcanvas.toggle();
}


function enviarFormularioCarrito2(idprod, stock) {
    // Usar la función prompt() para solicitar la cantidad
    var cantidad = prompt("Ingrese la cantidad de producto que desea menor a " + stock + ":");
    // Comprobar si el usuario ingresó una cantidad válida
    if (cantidad !== null) {
        if (cantidad <= stock) {
            // Realizar operaciones con la cantidad ingresada
            // alert("Ha seleccionado " + cantidad + " unidades del producto.");
            // Puedes enviar la cantidad al servidor o realizar otras acciones aquí
            const url = '../customers/process/newcar.php?idprod=' + idprod + '&canpro=' + cantidad + '';
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud.');
                    }
                    return response.text();
                })
                .then(data => {
                    // Se recibió una respuesta exitosa del servidor
                    // alert(data);
                    // ...
                    alert("Producto añadido al carrito");

                })
                .catch(error => {
                    // Ocurrió un error en la solicitud
                    console.error('Error en la solicitud:', error);
                    alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
                });
        } else {
            // El usuario canceló la entrada
            alert("Se cancelo la solicitud stock no disponible.");
        }
    } else {
        // El usuario canceló la entrada
        alert("Ha cancelado la solicitud de cantidad.");
    }
}
function enviarFormularioCarrito(idprod, stock, precio) {
    swal({
        title: 'Ingrese la cantidad de producto',
        content: {
            element: 'input',
            attributes: {
                type: 'number',
                max: stock,
                placeholder: 'Cantidad'
            }
        },
        buttons: {
            confirm: 'Aceptar'
        }
    }).then((value) => {
        if (value !== null) {
            if (value != "") {
                if (value > 0) {
                    if (value <= stock) {
                        $.ajax({
                            url: '../customers/process/newcar.php',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                idprod: idprod,
                                precio: precio,
                                canpro: value
                            },
                            success: function (data) {
                                // La solicitud se completó con éxito                                                                                 
                                swal({
                                    title: data.title,
                                    text: data.text,
                                    icon: data.icon,
                                    buttons: data.buttons,
                                    timer: data.timer,
                                }).then(() => {
                                    getprod();
                                  });                                                             

                            },
                            error: function (xhr, textStatus, errorThrown) {
                                // Ocurrió un error en la solicitud
                                console.error('Error en la solicitud:', errorThrown);
                                swal({
                                    title: "Ha ocurrido un error!",
                                    text: "Por favor, inténtelo nuevamente más tarde.",
                                    icon: "error",
                                    buttons: false,
                                    timer: 3000,
                                });
                                //alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
                            }
                        });                        
                    } else {
                        swal('Operación cancelada', 'Stock no está disponible.', 'info');
                    }
                } else {
                    swal('Operación cancelada', 'Valor negativo', 'info');
                }
            } else {
                //alert("Se canceló la solicitud.");
                swal('Operación cancelada', '\n', 'info');
            }
        } else {
            swal('Operación cancelada', '\n', 'info');
            //alert("Se canceló la solicitud de cantidad.");
        }

    });
    //var cantidad = prompt("Ingrese la cantidad de producto que desea menor o igual a " + stock + ":");
}




function enviarFormularioCompra() {
    // Usar la función prompt() para solicitar la cantidad
    var cantidad = prompt("Ingrese la cantidad de producto que desea menor a " + stock + ":");
    // Comprobar si el usuario ingresó una cantidad válida
    if (cantidad !== null) {
        if (cantidad <= stock) {
            // Realizar operaciones con la cantidad ingresada
            // alert("Ha seleccionado " + cantidad + " unidades del producto.");
            // Puedes enviar la cantidad al servidor o realizar otras acciones aquí
            const url = '../customers/process/newcom.php?idprod=' + idprod + '&canpro=' + cantidad + '';
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud.');
                    }
                    return response.text();
                })
                .then(data => {
                    // Se recibió una respuesta exitosa del servidor
                    // alert(data);
                    // ...
                    alert("Producto añadido al carrito");

                })
                .catch(error => {
                    // Ocurrió un error en la solicitud
                    console.error('Error en la solicitud:', error);
                    alert('Ha ocurrido un error en la solicitud. Por favor, inténtalo nuevamente más tarde.');
                });
        } else {
            // El usuario canceló la entrada
            alert("Se cancelo la solicitud stock no disponible.");
        }
    } else {
        // El usuario canceló la entrada
        alert("Ha cancelado la solicitud de cantidad.");
    }
}

function enviarUbicacion(ident, lat, lng) {
    const url = '../employees/process/actubi.php?ident=${ident}&lat=${lat}&lng=${lng}';

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

function irCompras(vtc) {
    // Construye la URL de destino
    var urlDestino = '../customers/Compras.php';

    // Crea un formulario oculto
    var form = document.createElement('form');
    form.method = 'post';
    form.action = urlDestino;

    // Crea un elemento de entrada oculto para el valor vtc
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'vtc'; // Este es el nombre del parámetro
    input.value = vtc;   // Este es el valor que deseas enviar

    // Agrega el elemento de entrada al formulario
    form.appendChild(input);

    // Agrega el formulario al cuerpo del documento y envía la solicitud
    document.body.appendChild(form);
    form.submit();
}

//SCRIPT PARA EL REGISTRO
function goformlogin() {
    // Obtener el formulario
    const formulario = document.getElementById('formlogin');
    // Crear un objeto FormData con los datos del formulario
    const formData = new FormData(formulario);
    // Realizar la solicitud Fetch
    fetch('../public/valilogin.php', {
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
