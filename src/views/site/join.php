<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Join the fight');

use nullref\cms\components\Block;
use yii\bootstrap\Html;

?>
<div class="site-join">
    <h2><?= $this->title ?></h2>

    <?= Block::getBlock('join_fight') ?>

    <p>
        <?= Html::a(Yii::t('app', 'I want to be a reserve doctor'), ['register-doctor'], ['class' => 'btn btn-primary btn-lg']) ?>
        <?= Html::a(Yii::t('app', 'I want to be a volunteer'), ['register-volunteer'], ['class' => 'btn btn-primary btn-lg']) ?>
    </p>
</div>
