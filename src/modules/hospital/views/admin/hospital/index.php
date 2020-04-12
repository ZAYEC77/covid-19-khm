<?php

use app\modules\hospital\models\Hospital;
use app\modules\hospital\models\Requirement;
use nullref\eav\helpers\Grid as EavGrid;
use rmrevin\yii\fontawesome\FA;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\hospital\models\HospitalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Hospitals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Hospital'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => array_merge([
            ['class' => 'yii\grid\SerialColumn'],

            'name',
        ],
            EavGrid::getGridColumns($searchModel),
            [
                [
                    'attribute' => 'requirements',
                    'filter' => false,
                    'format'=>'raw',
                    'value' => function (Hospital $model) {
                        $parts = [];
                        foreach (Requirement::getStatuses() as $status => $statusLabel) {
                            $parts[] = $statusLabel . ': ' . $model->getRequirements()->andWhere(['status' => $status])->count();
                        }
                        return join('<br>', $parts);
                    }
                ],
                [
                    'class' => yii\grid\ActionColumn::class,
                    'template' => '{add-requirement}  {requirements} {view} {update} {delete}',
                    'buttons' => [
                        'add-requirement' => function ($url, Hospital $model, $key) {
                            $options = [
                                'title' => Yii::t('app', 'Create Requirement'),
                                'aria-label' => Yii::t('app', 'Create Requirement'),
                                'data-pjax' => '0',
                            ];
                            $icon = FA::i(FA::_PLUS);
                            return Html::a($icon, ['/hospital/admin/requirement/create', 'hospital_id' => $model->id], $options);
                        },
                        'requirements' => function ($url, Hospital $model, $key) {
                            $options = [
                                'title' => Yii::t('app', 'Requirements'),
                                'aria-label' => Yii::t('app', 'Requirements'),
                                'data-pjax' => '0',
                            ];
                            $icon = FA::i(FA::_LIST);
                            return Html::a($icon, ['/hospital/admin/requirement/index', 'hospital_id' => $model->id], $options);
                        }
                    ],
                ],
            ]),
    ]); ?>

</div>
