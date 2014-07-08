<?php

return [
    'modules' => [
        'cms' => [
            'class' => 'app\modules\cms\Module',
        ],
        'config' => [
            'class' => 'app\modules\config\Module',
        ],
        'member' => [
            'class' => 'app\modules\member\Module',
        ],
        'category' => [
            'class' => 'app\modules\category\Module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'article' => [
            'class' => 'app\modules\article\Module',
        ],
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'member' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'category' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'config' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'gridview' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'kvgrid' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
                'article' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
//                'gridview' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@kvgrid/messages',
//                    'forceTranslation' => true,
//                ]
            ],
        ],
    ],
];