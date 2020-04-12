<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\models;


use app\modules\hospital\models\Hospital;
use app\modules\hospital\models\HospitalSearch as BaseHospitalSearch;
use yii\data\ActiveDataProvider;

class HospitalSearch extends BaseHospitalSearch
{
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     * @throws \yii\db\Exception
     */
    public function search($params)
    {
        $query = Hospital::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
