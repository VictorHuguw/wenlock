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
            [['nome', 'email', 'matricula', 'tipo'], 'required', 'message' => '* Campo obrigatório'],
            [['email'], 'email', 'message' => '* Insira um email válido'],
            [['email', 'matricula'], 'unique'],
            [['nome', 'email', 'matricula', 'tipo'], 'string', 'max' => 255],
            ['nome', 'match', 'pattern' => '/^[\p{L}\s]+$/u', 'message' => '* O nome deve conter apenas letras.'],
            [['senha', 'password_repeat'], 'required', 'on' => 'create'], 
            [['senha', 'password_repeat'], 'string', 'min' => 6, 'max' => 255],
            ['senha', 'match', 'pattern' => '/^[a-zA-Z0-9]{6,}$/', 'message' => '* A senha deve conter no mínimo 6 caracteres alfanuméricos.', 'skipOnEmpty' => true], 
            ['password_repeat', 'compare', 'compareAttribute' => 'senha', 'message' => '* Senhas não conferem.', 'skipOnEmpty' => true], 
        ];
    }


    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios['create'] = ['nome', 'email', 'senha', 'password_repeat', 'matricula', 'tipo'];

        $scenarios['update'] = ['nome', 'email', 'matricula', 'tipo', 'senha', 'password_repeat'];

        return $scenarios;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($this->senha) && trim($this->senha) !== '') {
                $this->senha = Yii::$app->security->generatePasswordHash($this->senha);
            } else {
                if (!$insert) {
                    $this->senha = $this->getOldAttribute('senha');
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
