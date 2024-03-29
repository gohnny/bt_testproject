<?php


namespace app\models;

use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
    public static function TableName()
    {
        return "user";
    }

    public function rules()
    {
        return [
            ['email', 'email'],
            [['login', 'password', 'name', 'surename', 'gender', 'email'], 'required'],
            ['login', 'string', 'min' => 4, 'max' => 30],
            ['password', 'string', 'min' => 6],
            ['name', 'match', 'pattern' => '/^([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})$/'],
            ['surename', 'match', 'pattern' => '/^([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})$/'],
            ['gender', 'default', 'value' => 'non information'],
        ];
    }

    public function setUserRegistrationForm(UserRegistrationForm $userRegistrationForm)
    {
        $createdate = new \DateTime('now');
        $this->login = $userRegistrationForm->login;
        $this->password = $userRegistrationForm->password;
        $this->name = $userRegistrationForm->name;
        $this->surename = $userRegistrationForm->surename;
        $this->gender = $userRegistrationForm->gender;
        $this->create_date = $createdate->format(\DateTime::ISO8601);
        $this->email = $userRegistrationForm->email;

    }

    public function getUserAddress()
    {
        return $this->hasMany(UserAddress::className(), ['user_id' => 'id']);
    }

    public function existEmail($email)
    {
        $count = static::find()->where(['email' => $email])->count();
        return $count > 0;
    }

    public function existLogin($login)
    {
        $count = static::find()->where(['login' => $login])->count();
        return $count > 0;
    }



}