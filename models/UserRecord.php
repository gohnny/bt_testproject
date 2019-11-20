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
        $this->login = $userRegistrationForm->login;
        $this->password = $userRegistrationForm->password;
        $this->name = $userRegistrationForm->name;
        $this->surename = $userRegistrationForm->surename;
        $this->gender = $userRegistrationForm->gender;
        $this->create_date = $userRegistrationForm->create_date;
        $this->email = $userRegistrationForm->email;

    }

}