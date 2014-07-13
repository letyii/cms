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

        'eauth' => array(
            'class' => 'nodge\eauth\EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache' on production environments.
            'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
            'httpClient' => array(
                // uncomment this to use streams in safe_mode
                //'useStreamsFallback' => true,
            ),
            'services' => array( // You can change the providers and their classes.
                'facebook' => array(
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'nodge\eauth\services\FacebookOAuth2Service',
                    'clientId' => '458292227620618',
                    'clientSecret' => '9d7f855964c8f6d0b29fb7ec189d56a7',
                ),
            ),
        ),
        'i18n' => array(
            'translations' => array(
                'eauth' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ),
            ),
        ),
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
