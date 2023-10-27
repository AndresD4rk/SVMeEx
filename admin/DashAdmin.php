<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<div id="myDiv"></div>
<div id="myDiv2"></div>
<div id="myDiv3"></div>
<script>
    // URL del servidor que proporciona los datos JSON
    const url = 'process/dashdata.php?data=1';
    // Realiza la solicitud AJAX utilizando la función fetch
    fetch(url)
        .then(response => {
            // Verifica si la solicitud fue exitosa (código de estado 200)
            if (response.status === 200) {
                // Convierte la respuesta a JSON
                return response.json();
            } else {
                // En caso de error, muestra un mensaje de error
                throw new Error('Error en la solicitud AJAX');
            }
        })
        .then(data => {
            // Aquí puedes trabajar con los datos JSON
            console.log(data);
            var cant = [];
            var nomp = [];
            data.forEach(item => {
                cant.push(parseInt(item[1]));
                nomp.push(item[0]);
            });
            console.log(cant);
            console.log(nomp);

            var data2 = [{
                values: cant, // Elimina los corchetes adicionales
                labels: nomp, // Elimina los corchetes adicionales
                type: 'pie'
            }];

            var layout = {
                height: 400,
                width: 500
            };

            Plotly.newPlot('myDiv', data2, layout);
        })
        .catch(error => {
            // Manejo de errores
            console.error(error);
        });

// URL del servidor que proporciona los datos JSON
const url2 = 'process/dashdata.php?data=2';

// Realiza la solicitud AJAX utilizando la función fetch
fetch(url2)
    .then(response => {
        // Verifica si la solicitud fue exitosa (código de estado 200)
        if (response.status === 200) {
            // Convierte la respuesta a JSON
            return response.json();
        } else {
            // En caso de error, muestra un mensaje de error
            throw new Error('Error en la solicitud AJAX');
        }
    })
    .then(data => {
        // Aquí puedes trabajar con los datos JSON
        console.log(data);
        var cant = [];
        var nomp = [];
        data.forEach(item => {
            cant.push(parseInt(item[1]));
            nomp.push(item[0]);
        });
        console.log(cant);
        console.log(nomp);

        var data2 = [{
            values: cant, // Elimina los corchetes adicionales
            labels: nomp, // Elimina los corchetes adicionales
            type: 'pie'
        }];

        var layout = {
            height: 400,
            width: 500
        };

        Plotly.newPlot('myDiv2', data2, layout);
    })
    .catch(error => {
        // Manejo de errores
        console.error(error);
    });
    
</script>