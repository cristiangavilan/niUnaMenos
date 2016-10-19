<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "se_contacta".
 *
 * @property integer $id_empleado_operador
 * @property integer $id_centro_asistencial
 * @property string $fecha
 * @property string $hora
 * @property string $descripcion
 *
 * @property Operador $idEmpleadoOperador
 * @property CentroAsistencial $idCentroAsistencial
 */
class SeContacta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'se_contacta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado_operador', 'id_centro_asistencial', 'fecha', 'hora', 'descripcion'], 'required'],
            [['id_empleado_operador', 'id_centro_asistencial'], 'integer'],
            [['fecha', 'hora'], 'safe'],
            [['descripcion'], 'string', 'max' => 1000],
            [['id_empleado_operador'], 'exist', 'skipOnError' => true, 'targetClass' => Operador::className(), 'targetAttribute' => ['id_empleado_operador' => 'id_empleado_operador']],
            [['id_centro_asistencial'], 'exist', 'skipOnError' => true, 'targetClass' => CentroAsistencial::className(), 'targetAttribute' => ['id_centro_asistencial' => 'id_centro_asistencial']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado_operador' => Yii::t('app', 'Id Empleado Operador'),
            'id_centro_asistencial' => Yii::t('app', 'Id Centro Asistencial'),
            'fecha' => Yii::t('app', 'Fecha'),
            'hora' => Yii::t('app', 'Hora'),
            'descripcion' => Yii::t('app', 'Descripcion'),
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
    public function getIdCentroAsistencial()
    {
        return $this->hasOne(CentroAsistencial::className(), ['id_centro_asistencial' => 'id_centro_asistencial']);
    }
}
