<?php
include_once 'includes/styles.php';
?>
    <div class="fast-card" id="<?= $key ?>">
        <div class="fast-card-header">
            <?= $title ?>
            <a class="fast-icon" onclick="exports('<?= $key ?>')"> <img src="https://i.ibb.co/2qGYnBp/icons8-export-64.png"/> </a>
        </div>
        <div class="fast-card-body">
            <table class="fast-table">
                <thead>
                <tr>
                    <?php foreach ($labels as $col) { ?>
                        <th> <?= $col ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($attributes as $key => $row) { ?>
                    <tr>
                        <?php foreach ($row as $col) { ?>
                            <td> <?= $col ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
        <div class="fast-card-footer">
            <?= includeView(widgetPath('includes/statistics.php'), compact('statistics')); ?>
        </div>
    </div>
<?php include_once 'includes/scripts.php'; ?>