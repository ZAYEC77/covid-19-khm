<?php

namespace app\modules\hospital;

use nullref\core\interfaces\IAdminModule;
use rmrevin\yii\fontawesome\FA;
use Yii;

/**
 * hospital module definition class
 */
class Module extends \yii\base\Module implements IAdminModule
{
    const MODULE_ID = 'hospital';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\hospital\controllers';


    /**
     * @return array
     */
    public static function getAdminMenu()
    {
        return [
            'order' => 1,
            'label' => Yii::t('app', 'Hospitals'),
            'icon' => FA::_HOSPITAL_O,
            'roles' => ['hospital'],
            'items' => [
                [
                    'label' => Yii::t('app', 'Hospitals'),
                    'icon' => FA::_HOSPITAL_O,
                    'roles' => ['hospital.hospital'],
                    'url' => ['/hospital/admin/hospital'],
                ],
                [
                    'label' => Yii::t('app', 'Requirements'),
                    'url' => ['/hospital/admin/requirement'],
                    'icon' => FA::_LIST,
                    'roles' => ['hospital.requirement'],
                ],
            ],
        ];
    }
}
