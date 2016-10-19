<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caso".
 *
 * @property integer $id_caso
 * @property integer $id_persona_victima
 * @property integer $id_estado
 * @property string $expediente
 *
 * @property Atiende[] $atiendes
 * @property Operador[] $idEmpleadoOperadors
 * @property Persona $idPersonaVictima
 * @property Estado $idEstado
 * @property GeneradaPor[] $generadaPors
 * @property Interviene[] $intervienes
 * @property Empleado[] $idEmpleadoProfesionals
 * @property Involucra[] $involucras
 * @property Victima[] $idPersonaVictimas
 */
class Caso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona_victima', 'id_estado', 'expediente'], 'required'],
            [['id_persona_victima', 'id_estado'], 'integer'],
            [['expediente'], 'string', 'max' => 1000],
            [['id_persona_victima'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_victima' => 'id_persona']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_caso' => Yii::t('app', 'Id Caso'),
            'id_persona_victima' => Yii::t('app', 'Id Persona Victima'),
            'id_estado' => Yii::t('app', 'Id Estado'),
            'expediente' => Yii::t('app', 'Expediente'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtiendes()
    {
        return $this->hasMany(Atiende::className(), ['id_caso' => 'id_caso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleadoOperadors()
    {
        return $this->hasMany(Operador::className(), ['id_empleado_operador' => 'id_empleado_operador'])->viaTable('atiende', ['id_caso' => 'id_caso']);
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
    public function getIdEstado()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneradaPors()
    {
        return $this->hasMany(GeneradaPor::className(), ['id_persona_agresor' => 'id_caso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntervienes()
    {
        return $this->hasMany(Interviene::className(), ['id_caso' => 'id_caso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleadoProfesionals()
    {
        return $this->hasMany(Empleado::className(), ['id_empleado' => 'id_empleado_profesional'])->viaTable('interviene', ['id_caso' => 'id_caso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvolucras()
    {
        return $this->hasMany(Involucra::className(), ['id_caso' => 'id_caso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonaVictimas()
    {
        return $this->hasMany(Victima::className(), ['id_victima' => 'id_persona_victima'])->viaTable('involucra', ['id_caso' => 'id_caso']);
    }
}
