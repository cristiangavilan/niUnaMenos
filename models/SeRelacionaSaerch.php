<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SeRelaciona;

/**
 * SeRelacionaSaerch represents the model behind the search form about `app\models\SeRelaciona`.
 */
class SeRelacionaSaerch extends SeRelaciona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona1', 'id_vinculo', 'id_persona2'], 'integer'],
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
        $query = SeRelaciona::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_persona1' => $this->id_persona1,
            'id_vinculo' => $this->id_vinculo,
            'id_persona2' => $this->id_persona2,
        ]);

        return $dataProvider;
    }
}
