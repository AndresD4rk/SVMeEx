<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<div class="row mx-1">
    <div class="card col-12 col-lg-6">
        <div class="card-body">
            <!-- <h5 class="card-title">Productos Populares</h5> -->
            <div id="myDiv" class="col mx-auto"></div>
        </div>
    </div>
    <div class="card col-12 col-lg-6">
        <div class="card-body">
            <div id="myDiv2" class="col mx-auto"></div>
        </div>
    </div>
    <div class="card col-12">
        <div class="card-body">
            <div id="myDiv3" class="col col mx-auto"></div>
        </div>
    </div>
</div>
<script>
    GraphData();
    function GraphData() {
        // URL del servidor que proporciona los datos JSON
        const url = '../admin/process/dashdata.php?data=1';
        // Realiza la solicitud AJAX utilizando la función fetch
        var config = {
            responsive: true,
            displaylogo: false,
            displayModeBar: false
        }

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
                    title: "Productos Preferidos",
                    grid: {
                        rows: 1,
                        columns: 1,
                    }
                };
                Plotly.newPlot('myDiv', data2, layout, config);
            })
            .catch(error => {
                // Manejo de errores
                console.error(error);
            });

        // URL del servidor que proporciona los datos JSON
        const url2 = '../admin/process/dashdata.php?data=2';

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
                    y: cant, // Elimina los corchetes adicionales
                    x: nomp, // Elimina los corchetes adicionales
                    type: 'bar'
                }];
                var layout = {
                    title: "Total de Ventas (7 Dias)",
                    grid: {
                        rows: 1,
                        columns: 1,
                    }
                };

                Plotly.newPlot('myDiv2', data2, layout, config);
            })
            .catch(error => {
                // Manejo de errores
                console.error(error);
            });



        // URL del servidor que proporciona los datos JSON
        const url3 = '../admin/process/dashdata.php?data=3';
        // Realiza la solicitud AJAX utilizando la función fetch
        var config = {
            responsive: true,
            displaylogo: false,
            displayModeBar: false
        }

        fetch(url3)
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
                var cantmin = [];
                var cantinv = [];
                var produ = [];
                data.forEach(item => {
                    cantinv.push(parseInt(item[0]));
                    cantmin.push(parseInt(item[1]));
                    produ.push(item[2]);
                });
                var data2 = [{
                    x: produ,
                    y: cantinv,
                    name: 'Inventario',
                    type: 'bar'
                }, {
                    x: produ, // Elimina los corchetes adicionales
                    y: cantmin, // Elimina los corchetes adicionales
                    name: 'Mínimo',
                    type: 'bar'
                }];
                var layout = {
                    title: "Inventario",
                    grid: {
                        rows: 1,
                        columns: 1,
                    },
                    barmode: 'overlay'
                };
                Plotly.newPlot('myDiv3', data2, layout, config);
            })
            .catch(error => {
                // Manejo de errores
                console.error(error);
            });
    }
    setInterval(GraphData, 30000);
</script>