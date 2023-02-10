<?php
include_once 'includes/styles.php';
?>
<div class="fast-card">
    <div class="fast-card-header">
        <?= $title ?>
    </div>
    <div class="fast-card-body">
        <table class="fast-table" id="<?= $key ?>">
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

            <?php foreach ($statistics as $statistic) { ?>
                <tr class="active">
                    <td colspan='100%'>
                        <strong><?= $statistic['key'] ?> </strong> :
                        <?= $statistic['value'] ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
