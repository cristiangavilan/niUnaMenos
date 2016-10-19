<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centro_asistencial".
 *
 * @property integer $id_centro_asistencial
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $gps_lat
 * @property string $gps_lng
 *
 * @property SeContacta[] $seContactas
 */
class CentroAsistencial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centro_asistencial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direccion', 'telefono', 'gps_lat', 'gps_lng'], 'required'],
            [['nombre', 'telefono', 'gps_lat', 'gps_lng'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_centro_asistencial' => Yii::t('app', 'Id Centro Asistencial'),
            'nombre' => Yii::t('app', 'Nombre'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'gps_lat' => Yii::t('app', 'Gps Lat'),
            'gps_lng' => Yii::t('app', 'Gps Lng'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeContactas()
    {
        return $this->hasMany(SeContacta::className(), ['id_centro_asistencial' => 'id_centro_asistencial']);
    }
}
