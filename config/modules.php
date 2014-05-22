<?php

return [
    'modules' => [
        'cms' => [
            'class' => 'app\modules\cms\Module',
        ],
        'category' => [
            'class' => 'app\modules\category\Module',
        ],
        'article' => [
            'class' => 'app\modules\article\Module',
        ],
        'member' => [
            'class' => 'app\modules\member\Module',
        ],
        'config' => [
            'class' => 'app\modules\config\Module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'category' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'article' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'gridview' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'kvgrid' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
//                'gridview' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@kvgrid/messages',
//                    'forceTranslation' => true,
//                ]
            ],
        ],
    ],
];