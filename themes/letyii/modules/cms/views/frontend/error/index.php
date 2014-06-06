<?php

echo yii\bootstrap\Alert::widget([
    'options' => [
        'class' => 'alert-danger',
    ],
    'body' => "<p><strong>{$name}</strong></p><p>{$message}</p>",
]);
