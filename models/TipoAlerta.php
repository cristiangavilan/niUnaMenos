<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_alerta".
 *
 * @property integer $id_tipo_alerta
 * @property string $nombre
 *
 * @property Alerta[] $alertas
 */
class TipoAlerta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_alerta';
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
            'id_tipo_alerta' => Yii::t('app', 'Id Tipo Alerta'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlertas()
    {
        return $this->hasMany(Alerta::className(), ['id_tipo_alerta' => 'id_tipo_alerta']);
    }
}
