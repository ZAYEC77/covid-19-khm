<?php

use nullref\eav\helpers\DetailViewAttributes;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\hospital\models\Requirement */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requirements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-view">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>

    <p>
        <?= Html::a(Yii::t('app', 'All requirements'), ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Requirements of hospital'), ['index', 'hospital_id' => $model->hospital_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => array_merge([
            'id',
            'name',
            'hospital_id:hospital',
            'status:requirement_status',
        ], DetailViewAttributes::get($model->eav),
            [
                'created_at:datetime',
                'updated_at:datetime',
            ]
        ),
    ]) ?>

</div>
