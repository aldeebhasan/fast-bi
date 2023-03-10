<?php
include_once 'includes/styles.php';
?>
    <div class="fast-card" id="<?= $key ?>">

        <div class="fast-card-header">
            <?= $title ?>
            <a class="fast-icon" onclick="exports('<?= $key ?>')"> <img
                        src="https://i.ibb.co/2qGYnBp/icons8-export-64.png"/> </a>
        </div>
        <div class="fast-card-body fast-number-container">
            <?php for ($i = 0; $i < count($labels); $i++) { ?>

                <div class="fast-number">
                    <span class="title"> <?= $attributes[$i] ?> </span>
                    <span class="value"><?= $labels[$i] ?></span>
                </div>
            <?php } ?>
        </div>

        <?php if (count($statistics)) { ?>
            <div class="fast-card-footer">
                <?= includeView(widgetPath('includes/statistics.php'), compact('statistics')); ?>
            </div>
        <?php } ?>
    </div>


<?php include_once 'includes/scripts.php'; ?>