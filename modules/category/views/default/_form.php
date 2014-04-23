<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\category\models\letCategory $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="let-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'root')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'lft')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'rgt')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
