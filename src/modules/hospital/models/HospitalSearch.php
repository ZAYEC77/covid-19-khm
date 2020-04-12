<?php

namespace app\modules\hospital\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hospital\models\Hospital;

/**
 * HospitalSearch represents the model behind the search form about `app\modules\hospital\models\Hospital`.
 */
class HospitalSearch extends Hospital
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['identifier', 'name'], 'safe'],
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
        $query = Hospital::find();

        // add conditions that should always apply here

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
        ]);

        $query->andFilterWhere(['like', 'identifier', $this->identifier])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
