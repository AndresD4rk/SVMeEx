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
        }
    });
}




window.onload = function() {
    window.scrollTo(0, 0);
    getprod();
};


function filtroproducto(event) {
    if (event.key === "Enter") {
        // Obtener el valor del input
        var valorInput = document.getElementById("filtprod").value;        
        $.ajax({
            type: "GET",
            url: "../includes/filtprod.php?filtbusq="+valorInput+"", // Reemplaza con la URL de tu script PHP que obtiene el carrito
            success: function(data) {
                // Actualizar la sección del carrito con los datos recibidos
                $("#getprod").html(data);
            }
        });
        
    }
}