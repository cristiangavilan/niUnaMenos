<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alerta;

/**
 * AlertaSearch represents the model behind the search form about `app\models\Alerta`.
 */
class AlertaSearch extends Alerta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alerta', 'id_persona_victima', 'id_tipo_alerta', 'id_empleado_operador'], 'integer'],
            [['fecha', 'hora', 'gps_lat', 'gps_lng', 'observacion'], 'safe'],
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
        $query = Alerta::find();

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
            'id_alerta' => $this->id_alerta,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'id_persona_victima' => $this->id_persona_victima,
            'id_tipo_alerta' => $this->id_tipo_alerta,
            'id_empleado_operador' => $this->id_empleado_operador,
        ]);

        $query->andFilterWhere(['like', 'gps_lat', $this->gps_lat])
            ->andFilterWhere(['like', 'gps_lng', $this->gps_lng])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
