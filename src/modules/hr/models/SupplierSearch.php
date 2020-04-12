<?php

namespace app\modules\hr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hr\models\Supplier;

/**
 * SupplierSearch represents the model behind the search form about `app\modules\hr\models\Supplier`.
 */
class SupplierSearch extends Supplier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

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
        $query = Supplier::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
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

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
