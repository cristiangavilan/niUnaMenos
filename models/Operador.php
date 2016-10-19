<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operador".
 *
 * @property integer $id_empleado_operador
 *
 * @property Alerta[] $alertas
 * @property Asiste[] $asistes
 * @property Atiende[] $atiendes
 * @property Caso[] $idCasos
 * @property SeContacta[] $seContactas
 */
class Operador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['id_empleado_operador'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado_operador' => Yii::t('app', 'Id Empleado Operador'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlertas()
    {
        return $this->hasMany(Alerta::className(), ['id_empleado_operador' => 'id_empleado_operador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistes()
    {
        return $this->hasMany(Asiste::className(), ['id_empleado_operador' => 'id_empleado_operador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtiendes()
    {
        return $this->hasMany(Atiende::className(), ['id_empleado_operador' => 'id_empleado_operador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCasos()
    {
        return $this->hasMany(Caso::className(), ['id_caso' => 'id_caso'])->viaTable('atiende', ['id_empleado_operador' => 'id_empleado_operador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeContactas()
    {
        return $this->hasMany(SeContacta::className(), ['id_empleado_operador' => 'id_empleado_operador']);
    }
}
