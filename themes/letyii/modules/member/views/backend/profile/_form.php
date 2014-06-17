<?php
use yii\helpers\Html;
use app\components\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'formDefault',
    'layout' => 'horizontal',
]);
?>
<?php echo $form->field($model, 'password')->passwordInput(['maxlength' => 100])->label('Mật khẩu mới') ?>
<?php ActiveForm::end(); ?>

