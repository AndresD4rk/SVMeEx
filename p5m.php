<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update a feature in realtime</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVzYmFycmVyYSIsImEiOiJjbGo5ZHBsMG0wNW5lM3Bxcmd2d2lndm80In0.zxipX4Q2BqV0pW_JVPh6og';
    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/satellite-v9',
        zoom: 0
    });

    map.on('load', async () => {
        // We fetch the JSON here so that we can parse and use it separately
        // from GL JS's use in the added source.
        const response = await fetch(
            'https://docs.mapbox.com/mapbox-gl-js/assets/hike.geojson'
        );
        const data = await response.json();
        // save full coordinate list for later
        const coordinates = data.features[0].geometry.coordinates;

        // start by showing just the first coordinate
        data.features[0].geometry.coordinates = [coordinates[0]];

        // add it to the map
        map.addSource('trace', { type: 'geojson', data: data });
        map.addLayer({
            'id': 'trace',
            'type': 'line',
            'source': 'trace',
            'paint': {
                'line-color': 'yellow',
                'line-opacity': 0.75,
                'line-width': 5
            }
        });

        // setup the viewport
        map.jumpTo({ 'center': coordinates[0], 'zoom': 14 });
        map.setPitch(30);

        // on a regular basis, add more coordinates from the saved list and update the map
        let i = 0;
        const timer = setInterval(() => {
            if (i < coordinates.length) {
                data.features[0].geometry.coordinates.push(coordinates[i]);
                map.getSource('trace').setData(data);
                map.panTo(coordinates[i]);
                i++;
            } else {
                window.clearInterval(timer);
            }
        }, 10);
    });
</script>

</body>
</html>