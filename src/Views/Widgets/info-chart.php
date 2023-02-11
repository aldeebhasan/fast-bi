<?php
include_once 'includes/styles.php';
?>

<div class="fast-card" id="<?= $key ?>">
    <div class="fast-card-header">
        <?= $title ?>
        <a class="fast-icon" onclick="exports('<?= $key ?>')"> <img src="https://i.ibb.co/2qGYnBp/icons8-export-64.png"/> </a>
    </div>
    <div class="fast-card-body">
        <div class="w-100">
            <canvas id="chart-<?= $key ?>"></canvas>
        </div>
    </div>
    <div class="fast-card-footer">
        <div class="w-100 inline">
            <?php foreach ($statistics as $statistic) { ?>
                <div class="statistic">
                    <span class="title"> <?= $statistic['value'] ?> </span>
                    <span><?= $statistic['key'] ?></span>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php include_once 'includes/scripts.php'; ?>
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
        chart('chart-<?= $key ?>', '<?= $type ?>', labels, data, options);
    })();
</script>