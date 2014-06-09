<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'vi',
    'bootstrap' => ['log'],
    'defaultRoute' => 'cms/backend/default',
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\member\models\LetUser',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'cms/backend/error',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
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
        'urlManager' => [
            'showScriptName' => TRUE,
        ],

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/letyii/views',
                    '@app/modules' => '@app/themes/letyii/modules',
                    '@app/widgets' => '@app/themes/letyii/widgets',
                ],
                'basePath' => '@app/themes/letyii',
                'baseUrl' => '@web/themes/letyii',
            ],
        ],
    ],
];


// Merge data config
$configs = array_replace_recursive(
    require(__DIR__ . '/common.php'),
    require(__DIR__ . '/modules.php'),
    require(__DIR__ . '/db.php'),
    require(__DIR__ . '/params.php'),
    $config,
    require(__DIR__ . '/local.php')
);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $configs['bootstrap'][] = 'debug';
    $configs['modules']['debug'] = 'yii\debug\Module';
    $configs['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],
        'generators' => [ //here
            'letyiimodel' => [ //name generator
                'class' => 'letyii\gii\generators\letyiimodel\Generator', //class generator
//                'templates' => [ //setting for out templates
//                    'default' => '@app\vendor\letyii\yii2-gii\generators\letyiimodel\default', //name template => path to template
//                ]
            ]
        ],
    ];
}

return $configs;
