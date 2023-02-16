<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script>
    function geoChart(id, datasets, options = []) {
        Highcharts.mapChart(id, {
            title: {
                text: ''
            },
            legend: {
                enabled: true
            },
            mapView: {
                projection: {
                    name: 'WebMercator'
                },
                zoom: 1
            },
            series: datasets
        })
    }

    async function getMapData() {
        return await fetch('https://code.highcharts.com/mapdata/custom/world.topo.json', {cache: "force-cache"})
            .then(response => response.json());

    }
</script>