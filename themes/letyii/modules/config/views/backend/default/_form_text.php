<?php
use app\components\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'formDefault',
    'layout' => 'horizontal',
]);
?>

<?php echo $form->field($model, 'module')->dropDownList($modules, ['class' => 'form-control', 'prompt'=>'Chọn module']); ?>

<?php echo $form->field($model, 'key')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập key']); ?>

<?php echo $form->field($model, 'value')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập value']); ?>

<div class="clearfix"></div>
<?php ActiveForm::end(); ?>