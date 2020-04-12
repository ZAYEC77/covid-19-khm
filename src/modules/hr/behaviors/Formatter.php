<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\modules\hr\behaviors;


use app\modules\hr\enums\Status;
use yii\base\Behavior;

class Formatter extends Behavior
{
    /**
     * @param $value
     * @return string
     */
    public function asHr_status($value)
    {
        return Status::getValue($value);
    }

}
