<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\modules\admin\components;


use nullref\fulladmin\modules\user\models\User;
use nullref\rbac\interfaces\UserProviderInterface;
use yii\base\Component;

class UserProvider extends Component implements UserProviderInterface
{
    /**
     * @return array|User[]|\yii\db\ActiveRecord[]
     */
    public function getUsers()
    {
        return User::find()->select(['id', 'username', 'email'])->asArray()->all();
    }
}
