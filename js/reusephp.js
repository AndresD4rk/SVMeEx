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
window.onload = function() {
    window.scrollTo(0, 0);
};