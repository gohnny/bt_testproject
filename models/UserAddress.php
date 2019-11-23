<?php


namespace app\models;

use app\models\UserRegistrationForm;
use yii\db\ActiveRecord;

class UserAddress extends ActiveRecord
{
    public static function TableName()
    {
        return "address";
    }

    public function rules()
    {
        return [

            [['postcode', 'country', 'city', 'street', 'house_number'], 'required'],
            ['postcode', 'match', 'pattern' => '/^\d{5}$/'],
            ['country', 'match', 'pattern' => '/[A-Z]{2}/'],
            ['city', 'string', 'min' => 4, 'max' => 20],
            ['street', 'string', 'min' => 3, 'max' => 30],
            ['house_number', 'match', 'pattern' => '/\d+[а-яА-Яa-zA-Z]?$/'],
            ['apart_number', 'number', 'max' => 9999],
        ];
    }

    public function setUserAddress(AddressForm $addressForm, $userRecord)
    {
        $this->postcode = $addressForm->postcode;
        $this->country = $addressForm->country;
        $this->user_id = $userRecord->id;
        $this->city = $addressForm->city;
        $this->street = $addressForm->street;
        $this->house_number = $addressForm->house_number;
        $this->apart_number = $addressForm->apart_number;
    }

    public function addUserAddress($addressForm, $userRecord)
    {
        $this->postcode = $addressForm->postcode;
        $this->country = $addressForm->country;
        $this->user_id = $userRecord->id;
        $this->city = $addressForm->city;
        $this->street = $addressForm->street;
        $this->house_number = $addressForm->house_number;
        $this->apart_number = $addressForm->apart_number;
    }

    public function getUsernumber()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'user_id']);
    }

}