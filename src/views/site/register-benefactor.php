<?php

/* @var $this yii\web\View */
/* @var $model \app\modules\hr\models\Supplier */
$this->title = Yii::t('app', 'I\'m benefactor');

use nullref\cms\components\Block;
use nullref\eav\widgets\Attributes;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-register-benefactor">
    <h2><?= $this->title ?></h2>
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= Attributes::widget([
                'form' => $form,
                'model' => $model,
                'itemWrapClass' => 'col-md-12',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6">
            <?= Block::getBlock('register_benefactor') ?>
        </div>
    </div>
</div>
