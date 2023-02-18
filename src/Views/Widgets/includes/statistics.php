<?php if (isset($statistics)) { ?>
    <div class="w-100 statistic-container">
        <?php foreach ($statistics as $statistic) { ?>
            <div class="statistic">
                <span class="title"> <?= $statistic['value'] ?> </span>
                <span><?= $statistic['key'] ?></span>
            </div>
        <?php } ?>

    </div>
<?php } ?>