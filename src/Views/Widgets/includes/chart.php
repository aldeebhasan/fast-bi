<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
<script>
    function chart(id, type, labels, datasets, options) {
        new Chart(
            document.getElementById(id),
            {
                type: type,
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: options
            }
        );
    }
</script>