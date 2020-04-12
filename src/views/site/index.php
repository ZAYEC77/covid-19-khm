<?php

use app\modules\hospital\models\Hospital;
use app\modules\hospital\models\Requirement;
use nullref\cms\components\Block;
use nullref\eav\helpers\Grid as EavGrid;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\hospital\models\HospitalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $hospital null|Hospital */

$this->title =
    $hospital === null ? Yii::t('app', 'Hospitals requirements')
        : Yii::t('app', 'Requirements of hospital') . ': ' . $hospital->name;
?>
<div class="site-index">
    <h2><?= $this->title ?></h2>

    <?= Block::getBlock('hospital_needs') ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => array_merge([
            ['class' => 'yii\grid\SerialColumn'],
            'name',
        ], $hospital === null ? [
            [
                'attribute' => 'hospital_id',
                'filter'=>false,
                'format' => 'raw',
                'value' => function (Requirement $requirement) {
                    return Html::a($requirement->hospital->name, ['site/index', 'hospital_id' => $requirement->hospital_id]);
                }
            ],
        ] : [],
            EavGrid::getGridColumns($searchModel),
            [
                [
                    'attribute' => 'status',
                    'filter' => Requirement::getStatuses(),
                    'format' => 'requirement_status',
                ],
//                [
//                    'attribute' => 'created_at',
//                    'filter' => false,
//                    'format' => 'datetime',
//                ],
//                [
//                    'attribute' => 'updated_at',
//                    'filter' => false,
//                    'format' => 'datetime',
//                ],
            ]),
    ]); ?>
</div>
