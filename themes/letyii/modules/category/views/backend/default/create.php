<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

?>

<!-- Content starts -->
<div class="container">
    <div class="page-content page-posts">

        <h4>Tạo danh mục cho module <?php echo ArrayHelper::getValue($_GET, 'module'); ?></h4>
        <div class="row">

            <div class="col-md-12">
                <!-- Make post Widget -->
                <div class="widget">

                    <!-- Widget head -->
                    <div class="widget-head">
                        <h5><i class="fa fa-desktop"></i> Thông tin </h5>	
                    </div>

                    <?php $form = ActiveForm::begin(); ?>
                    <!-- Widget body -->
                    <div class="widget-body">
                        
                        <?php echo $form->field($model, 'title')->textInput(['maxlength' => 255, 'class' => 'form-control col-lg-8']); ?>
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->field($model, 'position')->dropDownList($position, ['maxlength' => 255, 'class' => 'form-control col-lg-8']); ?>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->field($model, 'relationId')->dropDownList($categorys, ['maxlength' => 255, 'class' => 'form-control col-lg-8']); ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                    <!-- Widget foot -->
                    <div class="widget-foot">
                        <div class="pull-right">
                            <!-- Buttons -->
                            <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        </div>

    </div>
</div>
<!-- Content ends -->				
