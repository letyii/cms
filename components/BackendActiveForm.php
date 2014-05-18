<?php

namespace app\components;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

class BackendActiveForm extends ActiveForm {
    public $fieldConfig = [
        'template' => "{label}\n<div class='col-lg-10'>{input}\n{hint}\n{error}</div>",
        'horizontalCssClasses' => [
            'label' => 'col-lg-2',
        ],
    ];
}
