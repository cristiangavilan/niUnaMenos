<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property integer $id_rol
 * @property string $nombre_usuario
 * @property string $password
 *
 * @property Rol $idRol
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const administrador = 1;
    const empleado = 2;
    const operador = 3;
    const profesional = 4;
    const usuario = 5;
    
    public $password_repeat;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rol', 'nombre_usuario', 'password'], 'required'],
            [['id_rol'], 'integer'],
            [['nombre_usuario', 'password'], 'string', 'max' => 50],
            [['id_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['id_rol' => 'id_rol']],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'id_rol' => Yii::t('app', 'Id Rol'),
            'nombre_usuario' => Yii::t('app', 'Nombre Usuario'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRol()
    {
        return $this->hasOne(Rol::className(), ['id_rol' => 'id_rol']);
    }
    
    /*********** agregar para interface *********************/
    public static function findIdentity($id){
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = NULL){
        return static::findOne(['access_token' => $token]);
    }
    public function getId(){
        return $this->id_usuario;
    }
    public function getAuthKey(){
        return $this->password;
    }
    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }
    
    /*agregar para funcionamiento*/
    public static function findByUsername($username){
        return static::findOne(['nombre_usuario' => $username]);
    }
    public function validatePassword($authKey){
        return $this->password === $authKey;
    }
    public function getUsername(){
        return $this->nombre_usuario;
    }
    public function getRol(){
        return $this->id_rol0->rol;
    }
    public static function roleInArray($arr_role){
        return in_array(Yii::$app->user->identity->id_rol, $arr_role);
    }
        /********************************/
    
    
}
