<?php

namespace app\modules\hr;

use nullref\core\interfaces\IAdminModule;
use rmrevin\yii\fontawesome\FA;
use Yii;

/**
 * hr module definition class
 */
class Module extends \yii\base\Module implements IAdminModule
{
    const MODULE_ID = 'hr';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\hr\controllers';

    /**
     * @return array
     */
    public static function getAdminMenu()
    {
        return [
            'order' => 1,
            'label' => Yii::t('app', 'Human resources'),
            'icon' => FA::_USERS,
            'roles' => ['hr'],
            'items' => [
                [
                    'label' => Yii::t('app', 'Doctors'),
                    'url' => ['/hr/admin/doctor'],
                    'icon' => FA::_USER_MD,
                    'roles' => ['hr.doctor'],
                ],
                [
                    'label' => Yii::t('app', 'Suppliers'),
                    'url' => ['/hr/admin/supplier'],
                    'icon' => FA::_ARCHIVE,
                    'roles' => ['hr.supplier'],
                ],
                [
                    'label' => Yii::t('app', 'Volunteers'),
                    'url' => ['/hr/admin/volunteer'],
                    'icon' => FA::_USER,
                    'roles' => ['hr.volunteer'],
                ],
                [
                    'label' => Yii::t('app', 'Benefactors'),
                    'url' => ['/hr/admin/benefactor'],
                    'icon' => FA::_DOLLAR,
                    'roles' => ['hr.benefactor'],
                ],
            ],
        ];
    }
}
