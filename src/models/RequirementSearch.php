<?php

namespace app\models;

use app\modules\hospital\models\Requirement;
use app\modules\hospital\models\RequirementSearch as BaseRequirementSearch;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RequirementSearch represents the model behind the search form about `app\modules\hospital\models\Requirement`.
 */
class RequirementSearch extends BaseRequirementSearch
{
    public function search($params)
    {
        $query = Requirement::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'hospital_id' => $this->hospital_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

}
