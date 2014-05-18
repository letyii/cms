<?php
use yii\bootstrap\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'formDefault',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class='col-lg-10'>{input}\n{hint}\n{error}</div>",
        'horizontalCssClasses' => [
            'label' => 'col-lg-2',
        ],
    ],
]);
?>

<?php echo $form->field($model, 'module')->dropDownList($modules, ['class' => 'form-control', 'prompt'=>'Chọn module']); ?>

<?php echo $form->field($model, 'key')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập key']); ?>

<?php echo $form->field($model, 'value')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập value']); ?>

<div class="clearfix"></div>
<?php ActiveForm::end(); ?>