<?php
namespace app\components;

use yii\helpers\Html;

class ActiveForm extends \yii\bootstrap\ActiveForm {
    public $fieldConfig = [
        'template' => "{label}\n<div class='col-lg-10'>{input}\n{hint}\n{error}</div>",
        'horizontalCssClasses' => [
            'label' => 'col-lg-2',
        ],
    ];
}
