<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\modules\admin;


use app\modules\admin\controllers\MainController;
use nullref\fulladmin\Module as BaseModule;
use Yii;

class Module extends BaseModule
{
    public $controllerNamespace = 'nullref\fulladmin\controllers';

    public $controllerMap = [
        'main' => MainController::class,
    ];

    public static function getAdminMenu()
    {
        return [
            'label' => Yii::t('admin', 'Dashboard'),
            'url' => ['/admin/main'],
            'icon' => 'dashboard',
            'order' => 0,
            'roles' => ['dashboard'],
        ];
    }
}
