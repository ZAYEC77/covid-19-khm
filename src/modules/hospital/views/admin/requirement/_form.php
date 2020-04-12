<?php

use app\modules\hospital\models\Hospital;
use app\modules\hospital\models\Requirement;
use nullref\eav\widgets\Attributes;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hospital\models\Requirement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-form">

    <?php $form = ActiveForm::begin([
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->errorSummary($model) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'hospital_id')->dropDownList(Hospital::getMap()) ?>

            <?= $form->field($model, 'status')->dropDownList(Requirement::getStatuses()) ?>
        </div>
        <div class="col-md-6">
            <?= Attributes::widget([
                'form' => $form,
                'model' => $model,
                'itemWrapClass' => 'col-md-12',
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
