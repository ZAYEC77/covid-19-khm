<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/site.css',
    ];
    public $js = [
        'js/tools.js',
        'js/scripts.js',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        \rmrevin\yii\fontawesome\AssetBundle::class,
    ];
}
