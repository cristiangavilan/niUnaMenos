<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudad".
 *
 * @property integer $id_ciudad
 * @property string $nombre
 * @property integer $id_provincia
 *
 * @property Empleado[] $empleados
 * @property Persona[] $personas
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'id_provincia'], 'required'],
            [['id_provincia'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ciudad' => Yii::t('app', 'Id Ciudad'),
            'nombre' => Yii::t('app', 'Nombre'),
            'id_provincia' => Yii::t('app', 'Id Provincia'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['id_ciudad' => 'id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['id_ciudad' => 'id_ciudad']);
    }
}
