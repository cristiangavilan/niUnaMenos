<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "involucra".
 *
 * @property integer $id_persona_victima
 * @property integer $id_caso
 *
 * @property Victima $idPersonaVictima
 * @property Caso $idCaso
 */
class Involucra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'involucra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona_victima', 'id_caso'], 'required'],
            [['id_persona_victima', 'id_caso'], 'integer'],
            [['id_persona_victima'], 'exist', 'skipOnError' => true, 'targetClass' => Victima::className(), 'targetAttribute' => ['id_persona_victima' => 'id_victima']],
            [['id_caso'], 'exist', 'skipOnError' => true, 'targetClass' => Caso::className(), 'targetAttribute' => ['id_caso' => 'id_caso']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona_victima' => Yii::t('app', 'Id Persona Victima'),
            'id_caso' => Yii::t('app', 'Id Caso'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonaVictima()
    {
        return $this->hasOne(Victima::className(), ['id_victima' => 'id_persona_victima']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaso()
    {
        return $this->hasOne(Caso::className(), ['id_caso' => 'id_caso']);
    }
}
