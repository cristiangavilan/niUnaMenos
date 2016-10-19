<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vinculo".
 *
 * @property integer $id_vinculo
 * @property string $nombre
 *
 * @property SeRelaciona[] $seRelacionas
 */
class Vinculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vinculo';
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
            'id_vinculo' => Yii::t('app', 'Id Vinculo'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeRelacionas()
    {
        return $this->hasMany(SeRelaciona::className(), ['id_vinculo' => 'id_vinculo']);
    }
}
