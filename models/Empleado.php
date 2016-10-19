<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $id_empleado
 * @property integer $id_estado
 * @property integer $id_tipo_documento
 * @property string $numero_documento
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property integer $telefono
 * @property string $direccion
 * @property string $email
 * @property integer $id_genero
 * @property integer $id_ciudad
 *
 * @property Estado $idEstado
 * @property TipoDocumento $idTipoDocumento
 * @property Genero $idGenero
 * @property Ciudad $idCiudad
 * @property Interviene[] $intervienes
 * @property Caso[] $idCasos
 * @property Profesional $profesional
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'id_tipo_documento', 'numero_documento', 'nombre', 'apellido', 'fecha_nacimiento', 'telefono', 'direccion', 'email', 'id_genero', 'id_ciudad'], 'required'],
            [['id_estado', 'id_tipo_documento', 'telefono', 'id_genero', 'id_ciudad'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['numero_documento', 'nombre', 'apellido'], 'string', 'max' => 50],
            [['direccion', 'email'], 'string', 'max' => 100],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
            [['id_tipo_documento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDocumento::className(), 'targetAttribute' => ['id_tipo_documento' => 'id_tipo_documento']],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['id_genero' => 'id_genero']],
            [['id_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['id_ciudad' => 'id_ciudad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado' => Yii::t('app', 'Id Empleado'),
            'id_estado' => Yii::t('app', 'Id Estado'),
            'id_tipo_documento' => Yii::t('app', 'Id Tipo Documento'),
            'numero_documento' => Yii::t('app', 'Numero Documento'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'telefono' => Yii::t('app', 'Telefono'),
            'direccion' => Yii::t('app', 'Direccion'),
            'email' => Yii::t('app', 'Email'),
            'id_genero' => Yii::t('app', 'Id Genero'),
            'id_ciudad' => Yii::t('app', 'Id Ciudad'),
        ];
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
    public function getIdTipoDocumento()
    {
        return $this->hasOne(TipoDocumento::className(), ['id_tipo_documento' => 'id_tipo_documento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGenero()
    {
        return $this->hasOne(Genero::className(), ['id_genero' => 'id_genero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id_ciudad' => 'id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntervienes()
    {
        return $this->hasMany(Interviene::className(), ['id_empleado_profesional' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCasos()
    {
        return $this->hasMany(Caso::className(), ['id_caso' => 'id_caso'])->viaTable('interviene', ['id_empleado_profesional' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesional()
    {
        return $this->hasOne(Profesional::className(), ['id_empleado_profesional' => 'id_empleado']);
    }
}
