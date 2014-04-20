<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/main.php'),
        require(__DIR__ . '/../../common/config/params.php'),
//    require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/params.php')
//    require(__DIR__ . '/params-local.php')
);

$db = require(__DIR__ . '/../../common/config/db.php');

return [
    'id' => 'app-backend',
    'vendorPath' => dirname(__DIR__) . '/../vendor',
    'basePath' => dirname(__DIR__) . '/',
    'viewPath' => dirname(__DIR__) . '/views',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'article' => [
            'class' => 'backend\modules\article\Module',
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'], // adjust this to your needs
        ],
    ],
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
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/themes/letyii'],
                'baseUrl' => '@web/backend/themes/letyii',
            ],
        ],
    ],
    'params' => $params,
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
];
