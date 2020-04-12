<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\modules\hospital\behaviors;


use app\modules\hospital\models\Hospital;
use app\modules\hospital\models\Requirement;
use Yii;
use yii\base\Behavior;

class Formatter extends Behavior
{
    /**
     * @param $id
     * @return string
     */
    public function asHospital($id)
    {
        $hospital = Hospital::findOne($id);
        if ($hospital != null) {
            return $hospital->name;
        }
        return Yii::t('app', 'N\A');
    }

    /**
     * @param $value
     * @return string
     */
    public function asRequirement_status($value)
    {
        return Requirement::getStatuses()[$value] ?? Yii::t('app', 'N\A');
    }

}
