<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo_de_asistencia".
 *
 * @property integer $id_grupo_de_asistencia
 * @property string $nombre
 *
 * @property Profesional[] $profesionals
 */
class GrupoDeAsistencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo_de_asistencia';
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
            'id_grupo_de_asistencia' => Yii::t('app', 'Id Grupo De Asistencia'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesionals()
    {
        return $this->hasMany(Profesional::className(), ['id_grupo_asistencia' => 'id_grupo_de_asistencia']);
    }
}
