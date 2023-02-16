<?php
include_once 'includes/styles.php';
?>

<div class="fast-card" id="<?= $key ?>">
    <div class="fast-card-header">
        <?= $title ?>
        <a class="fast-icon" onclick="exports('<?= $key ?>')">
            <img src="https://i.ibb.co/2qGYnBp/icons8-export-64.png"/>
        </a>
    </div>
    <div class="fast-card-body">
        <div class="w-100">
            <div id="geo-map-<?= $key ?>"></div>
        </div>
    </div>
    <?php if (count($statistics)) { ?>
        <div class="fast-card-footer">
            <?= includeView(widgetPath('includes/statistics.php'), compact('statistics')); ?>
        </div>
    <?php } ?>
</div>
<?php include_once 'includes/scripts.php'; ?>
<?php include_once 'includes/map.php'; ?>


<script>
    (async () => {
        const attributes = <?= json_encode($attributes) ?>;
        const mapData = await getMapData();
        let data = [];
        for (const [key, value] of Object.entries(attributes)) {
            data.push({
                    data: value,
                    mapData: mapData,
                    name: key,
                    joinBy: ['iso-a2', 'code'],
                    states: {
                        hover: {
                            color: '#a4edba'
                        }
                    },
                }
            )
        }

        geoChart('geo-map-<?= $key ?>', data);
    })();
</script>