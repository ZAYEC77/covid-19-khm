<?php

namespace app\modules\hr\models;

/**
 * This is the ActiveQuery class for [[Benefactor]].
 *
 * @see Benefactor
 */
class BenefactorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Benefactor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Benefactor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
