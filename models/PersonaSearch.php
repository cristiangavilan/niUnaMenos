<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona', 'Id_estado', 'id_tipo_documento', 'id_genero', 'telefono', 'id_ciudad'], 'integer'],
            [['numero_documento', 'nombre', 'apellido', 'fecha_nacimiento', 'direccion', 'email'], 'safe'],
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
        $query = Persona::find();

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
            'id_persona' => $this->id_persona,
            'Id_estado' => $this->Id_estado,
            'id_tipo_documento' => $this->id_tipo_documento,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'id_genero' => $this->id_genero,
            'telefono' => $this->telefono,
            'id_ciudad' => $this->id_ciudad,
        ]);

        $query->andFilterWhere(['like', 'numero_documento', $this->numero_documento])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
