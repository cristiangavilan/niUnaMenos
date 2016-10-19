<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_centro_asistencial".
 *
 * @property integer $id_tipo_centro_asistencial
 * @property string $nombre
 */
class TipoCentroAsistencial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_centro_asistencial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_centro_asistencial' => Yii::t('app', 'Id Tipo Centro Asistencial'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }
}
