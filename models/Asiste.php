<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asiste".
 *
 * @property integer $id_persona_victima
 * @property integer $id_empleado_operador
 * @property string $fecha
 * @property string $hora
 * @property string $descripcion
 *
 * @property Persona $idPersonaVictima
 * @property Operador $idEmpleadoOperador
 */
class Asiste extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asiste';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona_victima', 'id_empleado_operador', 'fecha', 'hora', 'descripcion'], 'required'],
            [['id_persona_victima', 'id_empleado_operador'], 'integer'],
            [['fecha', 'hora'], 'safe'],
            [['descripcion'], 'string', 'max' => 1000],
            [['id_persona_victima'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_victima' => 'id_persona']],
            [['id_empleado_operador'], 'exist', 'skipOnError' => true, 'targetClass' => Operador::className(), 'targetAttribute' => ['id_empleado_operador' => 'id_empleado_operador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona_victima' => Yii::t('app', 'Id Persona Victima'),
            'id_empleado_operador' => Yii::t('app', 'Id Empleado Operador'),
            'fecha' => Yii::t('app', 'Fecha'),
            'hora' => Yii::t('app', 'Hora'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonaVictima()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_persona_victima']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleadoOperador()
    {
        return $this->hasOne(Operador::className(), ['id_empleado_operador' => 'id_empleado_operador']);
    }
}
