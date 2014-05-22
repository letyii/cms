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
    ],
];

