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
<div class="col-lg-12">
    <?php echo $form->field($model, 'module')->dropDownList($modules, ['class' => 'form-control'])->label(); ?>
</div>

<div class="col-lg-12">
    <?php echo $form->field($model, 'key')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập key'])->label(); ?>
</div>

<div class="col-lg-12">
    <?php echo $form->field($model, 'value')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập value'])->label(); ?>
</div>

<div class="clearfix"></div>
<?php ActiveForm::end(); ?>