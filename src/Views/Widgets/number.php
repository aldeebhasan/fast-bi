<?php
include_once 'includes/styles.php';
?>
<div class="fast-number-container" id="<?= $key ?>">

    <?php for ($i = 0; $i < count($labels); $i++) { ?>
        <div class="fast-card" >
            <div class="fast-card-header">
                <?= $labels[$i] ?>
                <a class="fast-icon" onclick="exports('<?= $key ?>')"> <img src="https://i.ibb.co/2qGYnBp/icons8-export-64.png"/> </a>
            </div>
            <div class="fast-card-body">

                <div class="fast-number">
                    <span class="title"> <?= $attributes[$i] ?> </span>
                </div>

            </div>

        </div>
    <?php } ?>

    <div class="fast-card-footer">
        <?= includeView(widgetPath('includes/statistics.php'), compact('statistics')); ?>
    </div>
</div>
<?php include_once 'includes/scripts.php'; ?>