<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<!-- Content starts -->
<div class="container">
    <div class="page-content page-posts">

        <h4>Tạo danh mục</h4>
        <div class="row">

            <div class="col-md-12">
                <!-- Make post Widget -->
                <div class="widget">

                    <!-- Widget head -->
                    <div class="widget-head">
                        <h5><i class="fa fa-desktop"></i> Thông tin </h5>	
                    </div>

                    <!-- Widget body -->
                    <div class="widget-body">
                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                        
                        
<!--                        <label>Tiêu đề</label>
                        <input type="text" class="form-control col-lg-8" placeholder="Enter Title">
                        <div class="clearfix"></div>

                        <label>Nhóm danh mục</label>
                        <input type="text" class="form-control col-lg-8" placeholder="Enter Title">
                        <div class="clearfix"></div>

                        <label>Danh mục cha</label>
                        <input type="text" class="form-control col-lg-8" placeholder="Enter Title">
                        <div class="clearfix"></div>-->
                    </div>

                    <!-- Widget foot -->
                    <div class="widget-foot">
                        <div class="pull-left">Word Count : 253</div>
                        <div class="pull-right">
                            <!-- Buttons -->
                            <button class="btn btn-default btn-xs">Save Draft</button> 
                            <button class="btn btn-info btn-xs" type="submit">Publish</button>
                            <button class="btn btn-danger btn-xs">Trash</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<!-- Content ends -->				
