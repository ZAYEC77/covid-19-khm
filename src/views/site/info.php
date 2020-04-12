<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'General information');

use nullref\cms\components\Block;

?>
<div class="site-join">
    <h2><?= $this->title ?></h2>

    <?= Block::getBlock('general_info') ?>

</div>
