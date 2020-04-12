<?php

use app\modules\hr\enums\Status;
use yii\helpers\Html;
use yii\grid\GridView;
use nullref\eav\helpers\Grid as EavGrid;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\hr\models\BenefactorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Benefactors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benefactor-index">

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?= Html::encode($this->title) ?>
        </h1>
    </div>
</div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Benefactor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => array_merge([
            ['class' => 'yii\grid\SerialColumn'],
        ],
            EavGrid::getGridColumns($searchModel),
            [
                [
                    'attribute' => 'status',
                    'filter' => Status::getList(),
                    'format' => 'hr_status',
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
