<script src="  http://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
    function exports(id) {
        html2canvas(document.querySelector("#" + id)).then(canvas => {
            const imageData = canvas.toDataURL("image/png");
            downloadURI("data:" + imageData, id + ".png");
        });
    }

    function downloadURI(uri, name) {
        var link = document.createElement("a");
        link.download = name;
        link.href = uri;
        link.click();
    }
</script>