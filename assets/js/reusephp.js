function carritocargar() {

    // Realizar una solicitud AJAX para obtener el contenido del carrito
    
    $.ajax({
        type: "GET",
        url: "../includes/traercarrito.php", // Reemplaza con la URL de tu script PHP que obtiene el carrito
        success: function(data) {
            // Actualizar la sección del carrito con los datos recibidos
            $("#offcanvasWithBothOptions1").html(data);
        }
    });
}
$.ajax({
    type: "GET",
    url: "../includes/menutop.php", // Reemplaza con la URL de tu script PHP que obtiene el carrito
    success: function(data) {
        // Actualizar la sección del carrito con los datos recibidos
        $("#topheader").html(data);
    }
});
$.ajax({
    type: "GET",
    url: "../includes/menulatizq.php", // Reemplaza con la URL de tu script PHP que obtiene el carrito
    success: function(data) {
        // Actualizar la sección del carrito con los datos recibidos
        $("#offcanvasWithBothOptions").html(data);
    }
}, );

function getprod(){
    $.ajax({
        type: "GET",
        url: "../includes/traerproductos.php", // Reemplaza con la URL de tu script PHP que obtiene el carrito
        success: function(data) {
            // Actualizar la sección del carrito con los datos recibidos
            $("#getprod").html(data);
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        }
    });
}



window.onload = function() {            
    if (window.location.pathname === "/SVMeEx/public/main.php") {        
        var urlParams = new URLSearchParams(window.location.search);
        var valor = urlParams.get("filt");
       if (!(valor === null)) {
        $.ajax({
            type: "GET",
            url: "../includes/filtprod.php?filtbusq="+valor+"", // Reemplaza con la URL de tu script PHP que obtiene el carrito
            success: function(data) {
                // Actualizar la sección del carrito con los datos recibidos
                $("#getprod").html(data);            
                window.history.replaceState({}, document.title, window.location.pathname);
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))                
            }
        });
       }else{
        getprod();
       }

    } else {
        
    } 
    window.scrollTo(0, 0);  
};


function filtroproducto(event) {
    if (event.key === "Enter") {
        var valorInput = document.getElementById("filtprod").value;        
        if (window.location.pathname === "/SVMeEx/public/main.php") {
            // Obtener el valor del input        
        $.ajax({
            type: "GET",
            url: "../includes/filtprod.php?filtbusq="+valorInput+"", // Reemplaza con la URL de tu script PHP que obtiene el carrito
            success: function(data) {
                // Actualizar la sección del carrito con los datos recibidos
                $("#getprod").html(data);
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            }
        });
        } else {
            window.location="/SVMeEx/public/main.php?filt="+valorInput+""; 
                       
        } 

    }
}
function validarInput(input) {
    // Expresión regular que no permite el carácter comilla simple (').
    var patron = /['']/g;
  
    // Valor actual del campo de entrada.
    var valor = input.value;
  
    // Verifica si el valor contiene comillas simples y las elimina.
    if (patron.test(valor)) {
      input.value = valor.replace(/['']/g, '');
    }
  }