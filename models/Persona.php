<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id_persona
 * @property integer $Id_estado
 * @property integer $id_tipo_documento
 * @property string $numero_documento
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property integer $id_genero
 * @property integer $telefono
 * @property string $direccion
 * @property string $email
 * @property integer $id_ciudad
 *
 * @property Agresor $agresor
 * @property Alerta[] $alertas
 * @property Asiste[] $asistes
 * @property Caso[] $casos
 * @property TipoDocumento $idTipoDocumento
 * @property Genero $idGenero
 * @property Ciudad $idCiudad
 * @property Estado $idEstado
 * @property SeRelaciona[] $seRelacionas
 * @property SeRelaciona[] $seRelacionas0
 * @property Victima $victima
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_estado', 'id_tipo_documento', 'numero_documento', 'nombre', 'apellido', 'id_genero', 'id_ciudad'], 'required'],
            [['Id_estado', 'id_tipo_documento', 'id_genero', 'telefono', 'id_ciudad'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['numero_documento', 'nombre', 'apellido'], 'string', 'max' => 50],
            [['direccion', 'email'], 'string', 'max' => 100],
            [['id_tipo_documento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDocumento::className(), 'targetAttribute' => ['id_tipo_documento' => 'id_tipo_documento']],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['id_genero' => 'id_genero']],
            [['id_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['id_ciudad' => 'id_ciudad']],
            [['Id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['Id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona' => Yii::t('app', 'Id Persona'),
            'Id_estado' => Yii::t('app', 'Id Estado'),
            'id_tipo_documento' => Yii::t('app', 'Id Tipo Documento'),
            'numero_documento' => Yii::t('app', 'Numero Documento'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'id_genero' => Yii::t('app', 'Id Genero'),
            'telefono' => Yii::t('app', 'Telefono'),
            'direccion' => Yii::t('app', 'Direccion'),
            'email' => Yii::t('app', 'Email'),
            'id_ciudad' => Yii::t('app', 'Id Ciudad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgresor()
    {
        return $this->hasOne(Agresor::className(), ['id_persona_agresor' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlertas()
    {
        return $this->hasMany(Alerta::className(), ['id_persona_victima' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistes()
    {
        return $this->hasMany(Asiste::className(), ['id_persona_victima' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasos()
    {
        return $this->hasMany(Caso::className(), ['id_persona_victima' => 'id_persona']);
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
    public function getIdEstado()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'Id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeRelacionas()
    {
        return $this->hasMany(SeRelaciona::className(), ['id_persona1' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeRelacionas0()
    {
        return $this->hasMany(SeRelaciona::className(), ['id_persona2' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVictima()
    {
        return $this->hasOne(Victima::className(), ['id_victima' => 'id_persona']);
    }
}
