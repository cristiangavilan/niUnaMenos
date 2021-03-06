<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Operador;

/**
 * OperadorSaerch represents the model behind the search form about `app\models\Operador`.
 */
class OperadorSaerch extends Operador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado_operador'], 'integer'],
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
        $query = Operador::find();

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
            'id_empleado_operador' => $this->id_empleado_operador,
        ]);

        return $dataProvider;
    }
}
