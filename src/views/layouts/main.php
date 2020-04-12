<?php

use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FA;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => FA::i(FA::_MEDKIT)->size(FA::SIZE_2X),// . ' ' . FA::i(FA::_AMBULANCE) . ' ' . FA::i(FA::_MEDKIT),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => Yii::t('app', 'Hospitals requirements'), 'url' => ['/site/index']],
            ['label' => Yii::t('app', 'List of suppliers'), 'url' => ['/site/suppliers']],
            ['label' => Yii::t('app', 'Join the fight'), 'url' => ['/site/join']],
            ['label' => Yii::t('app', 'General information'), 'url' => ['/site/info']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <h2 class="top-title">
            <?= Yii::t('app', 'Khmelnitsky: COVID-19 Coronavirus Control Requirements') ?>
        </h2>

        <hr>

        <?php foreach (Yii::$app->session->getAllFlashes() as $type => $text): ?>
            <div class="alert alert-<?= $type ?>">
                <?php foreach ($text as $t): ?>
                    <?= $t ?>
                <?php endforeach ?>
            </div>
        <?php endforeach; ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">
            &copy; <?= Html::a('NRE', 'https://github.com/NullRefExcep/', ['target' => 'blank']) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
