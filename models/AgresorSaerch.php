<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agresor;

/**
 * AgresorSaerch represents the model behind the search form about `app\models\Agresor`.
 */
class AgresorSaerch extends Agresor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona_agresor'], 'integer'],
            [['perfil_psicologico'], 'safe'],
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
        $query = Agresor::find();

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
            'id_persona_agresor' => $this->id_persona_agresor,
        ]);

        $query->andFilterWhere(['like', 'perfil_psicologico', $this->perfil_psicologico]);

        return $dataProvider;
    }
}
