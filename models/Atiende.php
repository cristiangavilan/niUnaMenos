<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atiende".
 *
 * @property integer $id_empleado_operador
 * @property integer $id_caso
 *
 * @property Operador $idEmpleadoOperador
 * @property Caso $idCaso
 */
class Atiende extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atiende';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado_operador', 'id_caso'], 'required'],
            [['id_empleado_operador', 'id_caso'], 'integer'],
            [['id_empleado_operador'], 'exist', 'skipOnError' => true, 'targetClass' => Operador::className(), 'targetAttribute' => ['id_empleado_operador' => 'id_empleado_operador']],
            [['id_caso'], 'exist', 'skipOnError' => true, 'targetClass' => Caso::className(), 'targetAttribute' => ['id_caso' => 'id_caso']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado_operador' => Yii::t('app', 'Id Empleado Operador'),
            'id_caso' => Yii::t('app', 'Id Caso'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleadoOperador()
    {
        return $this->hasOne(Operador::className(), ['id_empleado_operador' => 'id_empleado_operador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaso()
    {
        return $this->hasOne(Caso::className(), ['id_caso' => 'id_caso']);
    }
}
