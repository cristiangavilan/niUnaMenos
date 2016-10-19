<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SeContacta;

/**
 * SeContactaSearch represents the model behind the search form about `app\models\SeContacta`.
 */
class SeContactaSearch extends SeContacta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado_operador', 'id_centro_asistencial'], 'integer'],
            [['fecha', 'hora', 'descripcion'], 'safe'],
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
        $query = SeContacta::find();

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
            'id_empleado_operador' => $this->id_empleado_operador,
            'id_centro_asistencial' => $this->id_centro_asistencial,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
