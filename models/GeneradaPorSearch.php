<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GeneradaPor;

/**
 * GeneradaPorSearch represents the model behind the search form about `app\models\GeneradaPor`.
 */
class GeneradaPorSearch extends GeneradaPor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona_agresor', 'id_caso'], 'integer'],
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
     */
    public function search($params)
    {
        $query = GeneradaPor::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_persona_agresor' => $this->id_persona_agresor,
            'id_caso' => $this->id_caso,
        ]);

        return $dataProvider;
    }
}
