<?php

Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

return [
//    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
//    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
//    'components' => [
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
//    ],
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),

];
