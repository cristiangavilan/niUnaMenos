<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agresor".
 *
 * @property integer $id_persona_agresor
 * @property string $perfil_psicologico
 *
 * @property Persona $idPersonaAgresor
 */
class Agresor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agresor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perfil_psicologico'], 'required'],
            [['perfil_psicologico'], 'string', 'max' => 1000],
            [['id_persona_agresor'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_agresor' => 'id_persona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona_agresor' => Yii::t('app', 'Id Persona Agresor'),
            'perfil_psicologico' => Yii::t('app', 'Perfil Psicologico'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonaAgresor()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_persona_agresor']);
    }
}
