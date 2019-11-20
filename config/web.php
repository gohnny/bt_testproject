<?php

return [
    'id' => 'bintime test project',
    'language' => 'en',
    'basePath' => realpath(__DIR__ . '/../'),
    'bootstrap' => ['debug', 'gii'],
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'php:d.m.Y H:i',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'EUR',
        ],
        'request' => [
            'cookieValidationKey' => 'super secret code 12123151465446542'
        ],

        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
        'debug' => ['class' => 'yii\debug\Module'],
        'gii' => ['class' => 'yii\gii\Module']
    ]
];

