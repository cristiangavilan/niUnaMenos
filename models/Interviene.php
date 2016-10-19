<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interviene".
 *
 * @property integer $id_caso
 * @property integer $id_empleado_profesional
 *
 * @property Empleado $idEmpleadoProfesional
 * @property Caso $idCaso
 */
class Interviene extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interviene';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_caso', 'id_empleado_profesional'], 'required'],
            [['id_caso', 'id_empleado_profesional'], 'integer'],
            [['id_empleado_profesional'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['id_empleado_profesional' => 'id_empleado']],
            [['id_caso'], 'exist', 'skipOnError' => true, 'targetClass' => Caso::className(), 'targetAttribute' => ['id_caso' => 'id_caso']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_caso' => Yii::t('app', 'Id Caso'),
            'id_empleado_profesional' => Yii::t('app', 'Id Empleado Profesional'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleadoProfesional()
    {
        return $this->hasOne(Empleado::className(), ['id_empleado' => 'id_empleado_profesional']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaso()
    {
        return $this->hasOne(Caso::className(), ['id_caso' => 'id_caso']);
    }
}
