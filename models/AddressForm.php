<?php

namespace app\models;

use yii\base\Model;

class AddressForm extends Model
{
    public $postcode;
    public $country;
    public $city;
    public $street;
    public $house_number;
    public $apart_number;

    public function rules()
    {
        return [

            [['postcode', 'country', 'city', 'street', 'house_number'], 'required'],
            ['postcode', 'match', 'pattern' => '/^\d{5}$/'],
            ['country', 'match', 'pattern' => '/[A-Z]{2}/'],
            ['city', 'string', 'min' => 4, 'max' => 20],
            ['street', 'string', 'min' => 3, 'max' => 30],
            ['house_number', 'match', 'pattern' => '/[0-9]{1,3}[0-9абвгде\/]{1,4}/i'],
            ['apart_number', 'number', 'max' => 9999],
        ];
    }

}