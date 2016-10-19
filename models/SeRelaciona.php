<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "se_relaciona".
 *
 * @property integer $id_persona1
 * @property integer $id_vinculo
 * @property integer $id_persona2
 *
 * @property Persona $idPersona1
 * @property Persona $idPersona2
 * @property Vinculo $idVinculo
 */
class SeRelaciona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'se_relaciona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vinculo', 'id_persona2'], 'required'],
            [['id_vinculo', 'id_persona2'], 'integer'],
            [['id_persona1'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona1' => 'id_persona']],
            [['id_persona2'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona2' => 'id_persona']],
            [['id_vinculo'], 'exist', 'skipOnError' => true, 'targetClass' => Vinculo::className(), 'targetAttribute' => ['id_vinculo' => 'id_vinculo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona1' => Yii::t('app', 'Id Persona1'),
            'id_vinculo' => Yii::t('app', 'Id Vinculo'),
            'id_persona2' => Yii::t('app', 'Id Persona2'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona1()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_persona1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona2()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_persona2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVinculo()
    {
        return $this->hasOne(Vinculo::className(), ['id_vinculo' => 'id_vinculo']);
    }
}
