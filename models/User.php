<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $fio
 * @property string $password
 * @property string $phone
 * @property string $email
 * @property int $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password_confirmation;
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'email', 'fio', 'phone', 'password', 'password_confirmation'], 'required'],
            ['email', 'email'],
            ['login', 'validateLogin'],
            [['phone'], 'string'],
            ['phone', 'match', 'pattern' => '/^[+](7)[(](\d{3})[)][-](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Номер телефона должен быть в формате +7(XXX)-XXX-XX-XX'],
            ['password_confirmation', 'compare', 'compareAttribute' => 'password'],
            [['role'], 'integer'],
            [['login', 'email', 'fio', 'phone', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'fio' => 'ФИО',
            'password' => 'Пароль',
            'password_confirmation' => 'Повторите пароль',
            'phone' => 'Номер телефона',
            'email' => 'Почта',
            'role' => 'Role',
        ];
    }
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
    static public function findByUsername($username)
    {
        return self::find()->where(['login'=>$username])->one();
    }
    public function validateLogin($attr)
    {
        $user = self::find()->where(['login' => $this->login])->one();
        if ($user !== null) {
            $this->addError($attr, 'Такой логин уже занят.');
        }
    }
    public function beforeSave($insert)
    {
        $this->password = md5($this->password);
    }
}
