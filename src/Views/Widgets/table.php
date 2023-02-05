<style>
    <?php
    include_once assetPath('css/table.css');
    include_once assetPath('css/card.css');
    ?>
</style>
<div class="fast-card">
    <div class="fast-card-header">
        Table
    </div>
    <div class="fast-card-body">
        <table class="fast-table" id="<?= $id ?>">
            <?php $headerCount = isset($headers) ? count($headers) : 0;
            if ($headerCount > 0) { ?>
                <thead>
                <tr>
                    <?php for ($i = 0; $i < $headerCount; $i++) { ?>
                        <th> <?= $headers[$i] ?></th>
                    <?php } ?>

                    <?= ($headerCount < $maxColumnCount)
                        ? "<th colspan='" . ($maxColumnCount - $headerCount + 1) . "'></th>"
                        : ""
                    ?>
                </tr>
                </thead>
            <?php } ?>
            <tbody>
            <?php foreach ($rows as $key => $row) { ?>
                <tr>
                <?php $colCount = count($row); ?>
                <?php if ($colCount == 1) { ?>
                    <td class="active" colspan='<?= $maxColumnCount ?>'> <?= $row[0] ?></td>
                <?php } else {
                    for ($i = 0; $i < $colCount; $i++) { ?>
                        <td> <?= $row[$i] ?></td>
                    <?php } ?>
                    <?= ($colCount < $maxColumnCount)
                    ? "<td colspan='" . ($maxColumnCount - $colCount + 1) . "'></td>"
                    : ""
                    ?>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>
</div>
