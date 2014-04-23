<?php

return [
    'modules' => [
        'category' => [
            'class' => 'app\modules\category\Module',
        ],
        'article' => [
            'class' => 'app\modules\article\Module',
        ],
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'category' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
            ],
        ],
    ],
];