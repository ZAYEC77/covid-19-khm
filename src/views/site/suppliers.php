<?php

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\SupplierSearch */
$this->title = Yii::t('app', 'List of suppliers');

use nullref\cms\components\Block;
use nullref\eav\helpers\Grid as EavGrid;
use yii\bootstrap\Html;
use yii\grid\GridView;

?>
<div class="site-suppliers">
    <h2><?= $this->title ?></h2>

    <?= Block::getBlock('suppliers') ?>

    <p>
        <?= Html::a(Yii::t('app', 'Register as a vendor'), ['register-supplier'], ['class' => 'btn btn-primary btn-lg']) ?>
        <?= Html::a(Yii::t('app', 'I\'m benefactor'), ['register-benefactor'], ['class' => 'btn btn-primary btn-lg']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => array_merge([
            ['class' => 'yii\grid\SerialColumn'],
        ], EavGrid::getGridColumns($searchModel)),
    ]); ?>
</div>
