<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alerta".
 *
 * @property integer $id_alerta
 * @property string $fecha
 * @property string $hora
 * @property string $gps_lat
 * @property string $gps_lng
 * @property integer $id_persona_victima
 * @property integer $id_tipo_alerta
 * @property integer $id_empleado_operador
 * @property string $observacion
 *
 * @property Persona $idPersonaVictima
 * @property TipoAlerta $idTipoAlerta
 * @property Operador $idEmpleadoOperador
 */
class Alerta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alerta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'hora', 'gps_lat', 'gps_lng', 'id_persona_victima', 'id_tipo_alerta'], 'required'],
            [['fecha', 'hora'], 'safe'],
            [['id_persona_victima', 'id_tipo_alerta', 'id_empleado_operador'], 'integer'],
            [['gps_lat', 'gps_lng'], 'string', 'max' => 50],
            [['observacion'], 'string', 'max' => 1000],
            [['id_persona_victima'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_victima' => 'id_persona']],
            [['id_tipo_alerta'], 'exist', 'skipOnError' => true, 'targetClass' => TipoAlerta::className(), 'targetAttribute' => ['id_tipo_alerta' => 'id_tipo_alerta']],
            [['id_empleado_operador'], 'exist', 'skipOnError' => true, 'targetClass' => Operador::className(), 'targetAttribute' => ['id_empleado_operador' => 'id_empleado_operador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_alerta' => Yii::t('app', 'Id Alerta'),
            'fecha' => Yii::t('app', 'Fecha'),
            'hora' => Yii::t('app', 'Hora'),
            'gps_lat' => Yii::t('app', 'Gps Lat'),
            'gps_lng' => Yii::t('app', 'Gps Lng'),
            'id_persona_victima' => Yii::t('app', 'Id Persona Victima'),
            'id_tipo_alerta' => Yii::t('app', 'Id Tipo Alerta'),
            'id_empleado_operador' => Yii::t('app', 'Id Empleado Operador'),
            'observacion' => Yii::t('app', 'Observacion'),
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
    public function getIdTipoAlerta()
    {
        return $this->hasOne(TipoAlerta::className(), ['id_tipo_alerta' => 'id_tipo_alerta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleadoOperador()
    {
        return $this->hasOne(Operador::className(), ['id_empleado_operador' => 'id_empleado_operador']);
    }
}
