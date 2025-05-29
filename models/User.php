<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $password_repeat;
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['nome', 'email', 'senha', 'matricula', 'tipo'], 'required','message' => '* Campo obrigatório'],
            [['email'], 'email'],
            [['email', 'matricula'], 'unique'],
            [['nome', 'email', 'matricula', 'tipo'], 'string', 'max' => 255],

            
            [['senha', 'password_repeat'], 'required', 'on' => 'create'], // Ambas obrigatórias SOMENTE na criação
            [['senha', 'password_repeat'], 'string', 'min' => 6, 'max' => 255], // Exemplo de comprimento

            // Esta é a regra CRUCIAL para comparar as duas senhas
            ['password_repeat', 'compare', 'compareAttribute' => 'senha', 'message' => "Senhas não conferem."],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert || $this->isAttributeChanged('senha')) {
                if (!empty($this->senha)) {
                    $this->senha = Yii::$app->security->generatePasswordHash($this->senha);
                }
            }
            return true; 
        }
        return false; 
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {}

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey() {}

    public function validateAuthKey($authKey) {}

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->senha);
    }

    public function setPassword($password)
    {
        $this->senha = \Yii::$app->security->generatePasswordHash($password);
    }
}
