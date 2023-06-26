<!DOCTYPE html>
<head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh9upGiODKKUJAevmZsSAtKTQ4f76odc"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col" id="map" style="height: 500px;">
      Column
    </div>
    <div class="col">
      Column
     
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>

</body>


<script>
  if (navigator.geolocation) {
  navigator.geolocation.watchPosition(showPosition);
} else {
  console.log("La geolocalización no es compatible con este navegador.");
}

function showPosition(position) {
  
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  console.log(lat," ",lng);
  var cor=lat+" "+lng;
 /*  alert(cor); */

    
 
  // Aquí puedes hacer lo que necesites con las coordenadas, como actualizar el mapa en tiempo real.
  var uniqueId = Date.now().toString();
var nombreArchivo = 'localizacion_' + uniqueId + '.csv';

// Datos de localización
var localizaciones = [
  { latitud: latitud, longitud: longitud }
  // Agrega más localizaciones según tus necesidades
];

// Crear el contenido del archivo CSV
var contenidoArchivo = 'Latitud,Longitud\n';
localizaciones.forEach(function(localizacion) {
  contenidoArchivo += localizacion.latitud + ',' + localizacion.longitud + '\n';
});

// Crear un enlace de descarga del archivo
var enlaceDescarga = document.createElement('a');
enlaceDescarga.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(contenidoArchivo));
enlaceDescarga.setAttribute('download', nombreArchivo);

// Simular clic en el enlace para descargar el archivo
enlaceDescarga.style.display = 'none';
document.body.appendChild(enlaceDescarga);
enlaceDescarga.click();
document.body.removeChild(enlaceDescarga);
}

      
    </script>

    
<script>
 function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15
        });
        
        var marker = new google.maps.Marker({
          map: map
        });
        
        if (navigator.geolocation) {
          navigator.geolocation.watchPosition(function(position) {
            var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            
            marker.setPosition(latLng);
            map.setCenter(latLng);
          });
        } else {
          console.log("La geolocalización no es compatible con este navegador.");
        }
      }
      
      initMap();
</script>
<script>
  // Llamar a la función initMap() una vez que la página se haya cargado
  window.addEventListener('load', initMap);

</script>


</html>