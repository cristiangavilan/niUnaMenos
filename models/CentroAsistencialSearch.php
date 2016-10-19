<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CentroAsistencial;

/**
 * CentroAsistencialSearch represents the model behind the search form about `app\models\CentroAsistencial`.
 */
class CentroAsistencialSearch extends CentroAsistencial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_centro_asistencial'], 'integer'],
            [['nombre', 'direccion', 'telefono', 'gps_lat', 'gps_lng'], 'safe'],
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
        $query = CentroAsistencial::find();

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
            'id_centro_asistencial' => $this->id_centro_asistencial,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'gps_lat', $this->gps_lat])
            ->andFilterWhere(['like', 'gps_lng', $this->gps_lng]);

        return $dataProvider;
    }
}
