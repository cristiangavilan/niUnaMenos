<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provincia".
 *
 * @property integer $id_provincia
 * @property string $nombre
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provincia';
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
            'id_provincia' => Yii::t('app', 'Id Provincia'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }
}
