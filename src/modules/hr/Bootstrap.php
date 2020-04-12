<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\modules\hr;


use app\modules\hr\behaviors\Formatter;
use yii\base\Application;
use yii\base\BaseObject;
use yii\base\BootstrapInterface;

class Bootstrap extends BaseObject implements BootstrapInterface
{
    /**
     * @param Application $app
     */
    public function bootstrap($app)
    {
        /** @var Module $module */
        if ((($module = $app->getModule(Module::MODULE_ID)) == null) || !($module instanceof Module)) {
            return;
        };

        $app->getFormatter()->attachBehavior(Module::MODULE_ID, [
            'class' => Formatter::class,
        ]);
    }
}
