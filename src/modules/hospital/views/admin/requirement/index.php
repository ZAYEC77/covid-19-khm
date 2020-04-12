<?php

use app\modules\hospital\models\Hospital;
use app\modules\hospital\models\Requirement;
use nullref\eav\helpers\Grid as EavGrid;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\hospital\models\RequirementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $hospital null|Hospital */

$this->title =
    $hospital === null ? Yii::t('app', 'Requirements')
        : Yii::t('app', 'Requirements of hospital') . ' ' . $hospital->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-index">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Requirement'), $hospital === null ? ['create'] : ['create', 'hospital_id' => $hospital->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => array_merge([
            ['class' => 'yii\grid\SerialColumn'],
            'name',
        ], $hospital === null ? [
            [
                'attribute' => 'hospital_id',
                'filter' => Hospital::getMap(),
                'format' => 'hospital',
            ],
        ] : [],
            EavGrid::getGridColumns($searchModel),
            [
                [
                    'attribute' => 'status',
                    'filter' => Requirement::getStatuses(),
                    'format' => 'requirement_status',
                ],
                [
                    'attribute' => 'created_at',
                    'filter' => false,
                    'format' => 'datetime',
                ],
                [
                    'attribute' => 'updated_at',
                    'filter' => false,
                    'format' => 'datetime',
                ],
                [
                    'class' => yii\grid\ActionColumn::class,
                ],
            ]),
    ]); ?>

</div>
