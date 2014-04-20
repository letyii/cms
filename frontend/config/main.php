<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

$db = require(__DIR__ . '/../../common/config/db.php');

return [
    'id' => 'app-frontend',
    'vendorPath' => dirname(__DIR__) . '/../vendor',    
    'basePath' => dirname(__DIR__) . '/',
    'viewPath' => dirname(__DIR__) . '/views',
    'bootstrap' => ['debug','log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'db' => $db,
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'enableStrictParsing' => true,
            'rules' => [
                'debug/<controller>/<action>' => 'debug/<controller>/<action>',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['1.2.3.4', '127.0.0.1', '::1']
        ]
    ],
    'params' => $params,
];
