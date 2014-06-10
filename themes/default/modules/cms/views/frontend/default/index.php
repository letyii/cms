<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Library</a></li>
    <li class="active">Data</li>
</ol>

<div class="row">
    <div class="col-lg-9">
        <?php for ($i = 0; $i < 10; $i++): ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object img-circle" width="100" height="100" src="http://s.f32.img.vnecdn.net/2014/06/10/10-6-Anh-1-Tau-chay-3825-1402399130_180x108.jpg" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="#">Trung Quốc tiếp tục dịch chuyển Hải Dương 981</a></h4>
                Giàn khoan Hải Dương 981 hạ đặt trái phép trên vùng biển Việt Nam hôm nay có dấu hiệu dịch chuyển không ổn định về hướng đông - đông nam, theo báo
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Đăng nhập</strong></h3></div>
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['role' => 'form'],
                ]);
                ?>
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

                <ul>
                    <?php for ($i = 0; $i < 10; $i++): ?>
                        <li><a href="#">Trung Quốc tiếp tục dịch chuyển Hải Dương 981</a></li>
                    <?php endfor; ?>
                </ul>
    </div>
</div>