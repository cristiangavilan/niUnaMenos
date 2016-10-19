<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generada_por".
 *
 * @property integer $id_persona_agresor
 * @property integer $id_caso
 *
 * @property Caso $idPersonaAgresor
 */
class GeneradaPor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'generada_por';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona_agresor', 'id_caso'], 'required'],
            [['id_persona_agresor', 'id_caso'], 'integer'],
            [['id_persona_agresor'], 'exist', 'skipOnError' => true, 'targetClass' => Caso::className(), 'targetAttribute' => ['id_persona_agresor' => 'id_caso']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona_agresor' => Yii::t('app', 'Id Persona Agresor'),
            'id_caso' => Yii::t('app', 'Id Caso'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonaAgresor()
    {
        return $this->hasOne(Caso::className(), ['id_caso' => 'id_persona_agresor']);
    }
}
