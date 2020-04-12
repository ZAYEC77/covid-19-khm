<?php
/** @var $this \yii\web\View */

use app\modules\hospital\models\Hospital;
use app\modules\hr\models\Doctor;
use app\modules\hr\models\Supplier;
use yii\helpers\Url;

$hr = [
    [
        'url' => ['/hr/admin/doctor'],
        'icon' => 'fa-user-md',
        'title' => Yii::t('app', 'Doctors'),
        'count' => Doctor::find()->count(),
    ],
    [
        'url' => ['/hr/admin/volunteer'],
        'icon' => 'fa-user',
        'title' => Yii::t('app', 'Volunteers'),
        'count' => 10,
    ],
    [
        'url' => ['/hr/admin/benefactor'],
        'icon' => 'fa-dollar',
        'title' => Yii::t('app', 'Benefactors'),
        'count' => 8,
    ],
    [
        'url' => ['/hr/admin/supplier'],
        'icon' => 'fa-archive',
        'title' => Yii::t('app', 'Suppliers'),
        'count' => Supplier::find()->count(),
    ],
];

$hrCount = array_sum(array_column($hr, 'count'));
?>

<div class="admin-index">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= Yii::t('admin', 'Dashboard') ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<div class="row">


    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-hospital-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h1><?= Hospital::find()->count() ?></h1>
                    </div>
                </div>
            </div>
            <a href="<?= Url::to(['/hospital/admin/hospital']) ?>">
                <div class="panel-footer">
                    <span class="pull-left"><?= Yii::t('app', 'Hospitals') ?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-medkit fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h1><?= Hospital::find()->count() ?></h1>
                    </div>
                </div>
            </div>
            <a href="<?= Url::to(['/hospital/admin/requirement']) ?>">
                <div class="panel-footer">
                    <span class="pull-left"><?= Yii::t('app', 'Requirements') ?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h1><?= $hrCount ?></h1>
                    </div>
                </div>
            </div>
            <?php foreach ($hr as $item): ?>
                <a href="<?= Url::to($item['url']) ?>">
                    <div class="panel-footer">
                    <span class="pull-left">
                        <span class="fa-stack">
                          <i class="fa fa-stack-2x"></i>
                          <i class="fa <?= $item['icon'] ?> fa-stack-2x"></i>
                        </span>
                        <?= $item['title'] ?> (<?= $item['count'] ?>)</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>
