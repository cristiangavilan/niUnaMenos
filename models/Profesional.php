<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesional".
 *
 * @property integer $id_empleado_profesional
 * @property string $profesion
 * @property integer $id_grupo_asistencia
 *
 * @property Empleado $idEmpleadoProfesional
 * @property GrupoDeAsistencia $idGrupoAsistencia
 */
class Profesional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado_profesional', 'profesion', 'id_grupo_asistencia'], 'required'],
            [['id_empleado_profesional', 'id_grupo_asistencia'], 'integer'],
            [['profesion'], 'string', 'max' => 100],
            [['id_empleado_profesional'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['id_empleado_profesional' => 'id_empleado']],
            [['id_grupo_asistencia'], 'exist', 'skipOnError' => true, 'targetClass' => GrupoDeAsistencia::className(), 'targetAttribute' => ['id_grupo_asistencia' => 'id_grupo_de_asistencia']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado_profesional' => Yii::t('app', 'Id Empleado Profesional'),
            'profesion' => Yii::t('app', 'Profesion'),
            'id_grupo_asistencia' => Yii::t('app', 'Id Grupo Asistencia'),
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
    public function getIdGrupoAsistencia()
    {
        return $this->hasOne(GrupoDeAsistencia::className(), ['id_grupo_de_asistencia' => 'id_grupo_asistencia']);
    }
}
