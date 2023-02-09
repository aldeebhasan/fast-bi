<style>
    <?php
    include_once assetPath('css/card.css');
    ?>
</style>

<div class="fast-card">
    <div class="fast-card-header">
        <?= $title ?>
    </div>
    <div class="fast-card-body">
        <div class="w-100">
            <canvas id="bar-chart-<?= $key ?>"></canvas>
        </div>
    </div>
    <div class="fast-card-footer">
        <div class="w-100 inline">
            <?php foreach ($statistics as $statistic) { ?>
                <div class="statistic">
                    <span class="title"> <?= $statistic['key'] ?> </span>
                    <span><?= $statistic['value'] ?></span>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php include_once 'includes/chart.php'; ?>
<script>
    (async function () {
        const attributes = <?= json_encode($attributes) ?>;
        const labels = <?= json_encode($labels) ?>;
        const options = <?= json_encode($options) ?>;
        let data = [];
        for (const [key, value] of Object.entries(attributes)) {
            data.push({label: key, data: value})
        }
        chart('bar-chart-<?= $key ?>', 'bar', labels, data, options);
    })();
</script>