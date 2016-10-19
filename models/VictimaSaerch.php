<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Victima;

/**
 * VictimaSaerch represents the model behind the search form about `app\models\Victima`.
 */
class VictimaSaerch extends Victima
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_victima', 'id_estado'], 'integer'],
            [['aspecto_relevante'], 'safe'],
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
        $query = Victima::find();

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
            'id_victima' => $this->id_victima,
            'id_estado' => $this->id_estado,
        ]);

        $query->andFilterWhere(['like', 'aspecto_relevante', $this->aspecto_relevante]);

        return $dataProvider;
    }
}
