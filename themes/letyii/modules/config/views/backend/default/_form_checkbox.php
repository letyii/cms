<?php
use app\components\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'formDefault',
    'layout' => 'horizontal',
]);
?>

<?php echo $form->field($model, 'module')->dropDownList($modules, ['class' => 'form-control', 'prompt'=>'Chọn module']); ?>

<?php echo $form->field($model, 'key')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập key']); ?>

<div id="option_list">
	<?php echo $form->field($model, 'value[]')->textInput(['class' => 'form-control', 'placeholder' => 'Nhập value']); ?>
</div>

<div class="clearfix"></div>

<?php $add_option = preg_replace('/\r|\n/m','',$form->field($model, "value[]")->textInput(["class" => "form-control", "placeholder" => "Nhập value"])); ?>
<script type="text/javascript">
function add() {
	var add_option = '<?php echo $add_option; ?>';
	$("#option_list").append(add_option);
}
</script>

<div class="pull-right"><button type="button" class="btn btn-default" onclick='add()'>Thêm lựa chọn</button></div>
<div class="clearfix"></div>
<?php ActiveForm::end(); ?>