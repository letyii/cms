<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container" style="margin-top:80px">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Đăng nhập</strong></h3></div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['role' => 'form'],
                ]); ?>
                <div class="form-group">
                    <?php echo $form->field($model, 'username')->textInput(['placeholder' => 'Tên truy cập'])->label('username') ?>
                </div>
                <div class="form-group">
                    <?php echo $form->field($model, 'password')->passwordInput()->label('password') ?>
                </div>
                <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
                <?php echo Html::submitButton('Đăng nhập', ['class' => 'btn btn-success btn-sm']) ?>

                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>