<?php

return [
    'modules' => [
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
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'category' => ['class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@app/messages'],
            ],
        ],
    ],
];