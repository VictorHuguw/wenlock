<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
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
        ];
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
