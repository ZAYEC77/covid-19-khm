<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\models;


use app\modules\hr\enums\Status;
use app\modules\hr\models\Supplier;
use app\modules\hr\models\SupplierSearch as BaseSupplierSearch;
use yii\data\ActiveDataProvider;

class SupplierSearch extends BaseSupplierSearch
{
    public function search($params)
    {
        $query = Supplier::find()->andWhere(['status'=>Status::PUBLIC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // EAV filtering block
        foreach ($this->eav->getAttributes() as $key => $value) {
            $valueModel = $this->eav->getAttributeModel($key)->createValue();

            $valueModel->setScenario('search');
            $valueModel->load(['value' => $value], '');
            if ($valueModel->validate(['value'])) {
                $valueModel->patchEntityQuery($query, self::tableName());
            }
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }

}
