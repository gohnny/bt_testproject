<?php


namespace app\models;

use yii\base\Model;

class UserRegistrationForm extends Model
{
    public $login;
    public $password;
    public $name;
    public $surename;
    public $gender;
    public $create_date;
    public $email;

    public function rules()
    {
        return [
            ['email', 'errorIfEmailUsed'],
            ['email', 'email'],
            [['login', 'password', 'name', 'surename', 'gender', 'email'], 'required'],
            [['login', 'password', 'name', 'surename', 'gender', 'email'], 'safe'],
            ['login', 'string', 'min' => 4, 'max' => 30],
            ['password', 'string', 'min' => 6],
            ['name', 'match', 'pattern' => '/^([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})$/'],
            ['surename', 'match', 'pattern' => '/^([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})$/'],
            ['gender', 'default', 'value' => 'non information'],

        ];
    }

    public function errorIfEmailUsed()
    {
        if (UserRecord::existEmail($this->email))
            $this->addError('email', "This E-mail already exits");
    }

    public function setUserRecord($userRecord)
    {
        $this->login = $userRecord->login;
        $this->password = $userRecord->password;
        $this->name = $userRecord->name;
        $this->surename = $userRecord->surename;
        $this->gender = $userRecord->gender;
        $this->create_date = $userRecord->create_date;
        $this->email = $userRecord->email;
    }

}