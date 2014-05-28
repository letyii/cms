<?php
use app\components\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'formDefault',
    'layout' => 'horizontal',
]);
?>
<?php echo $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
<?php echo $form->field($model, 'password')->passwordInput(['maxlength' => 100]) ?>
<?php echo $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>
<?php ActiveForm::end(); ?>

