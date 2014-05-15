<?php
use yii\widgets\ActiveForm;
use app\modules\config\models\LetConfig;
?>
<?php
$form = ActiveForm::begin([
    'id' => 'formDefault',
    'options' => ['role' => 'form', 'class' => 'form-horizontal'],
]);
?>
<div class="form-group">
    <label class="col-lg-2 control-label">Module</label>
    <div class="col-lg-10">
        <?php echo $form->field($model, 'module')->dropDownList($modules, ['class' => 'form-control', 'prompt'=>'Chọn module'])->label(FALSE); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Key</label>
    <div class="col-lg-10">
        <?php echo $form->field($model, 'key')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập key'])->label(FALSE); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Value</label>
    <div class="col-lg-10">
        <?php echo $form->field($model, 'value')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập value'])->label(FALSE); ?>
    </div>
</div>

<div class="clearfix"></div>
<?php ActiveForm::end(); ?>