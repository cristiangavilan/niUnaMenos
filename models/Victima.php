<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "victima".
 *
 * @property integer $id_victima
 * @property integer $id_estado
 * @property string $aspecto_relevante
 *
 * @property Involucra[] $involucras
 * @property Caso[] $idCasos
 * @property Persona $idVictima
 * @property Estado $idEstado
 */
class Victima extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'victima';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'aspecto_relevante'], 'required'],
            [['id_estado'], 'integer'],
            [['aspecto_relevante'], 'string', 'max' => 1000],
            [['id_victima'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_victima' => 'id_persona']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_victima' => Yii::t('app', 'Id Victima'),
            'id_estado' => Yii::t('app', 'Id Estado'),
            'aspecto_relevante' => Yii::t('app', 'Aspecto Relevante'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvolucras()
    {
        return $this->hasMany(Involucra::className(), ['id_persona_victima' => 'id_victima']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCasos()
    {
        return $this->hasMany(Caso::className(), ['id_caso' => 'id_caso'])->viaTable('involucra', ['id_persona_victima' => 'id_victima']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVictima()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_victima']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'id_estado']);
    }
}
