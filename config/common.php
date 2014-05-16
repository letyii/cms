<?php

return [
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
        ],
        'authManager' => [
            'class' => 'app\components\LetRbac',
        ],
        'i18n' => [ // Can xem lai de config tu dong
            'translations' => [
                'article' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'vi',
                    'basePath' => 'app/messages/vi/article',
                ],
            ],
        ],
    ],
];

