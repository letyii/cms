<?php
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'formDefault',
    'options' => ['role' => 'form'],
]);
?>
<div class="form-group">
    <label class="col-lg-2 control-label">Module</label>
    <div class="col-lg-10">
        <select class="form-control" name="module">
            <option value="0">Chọn module</option>
            <?php foreach (app\modules\config\models\LetConfig::getModuleList() as $k => $v): ?>
                <option value="<?php echo \yii\helpers\Html::encode($v['module']); ?>"><?php echo \yii\helpers\Html::encode($v['module']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>     
<div class="form-group">
    <label class="col-lg-2 control-label">Key</label>
    <div class="col-lg-10">
        <?php echo $form->field($model, 'key')->textInput(['placeholder' => 'Input Box'])->label('Key'); ?>
        <input type="text" class="form-control" placeholder="Input Box" name="key">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Value</label>
    <div class="col-lg-10">
        <input type="text" class="form-control" placeholder="Input Box" name="value">
    </div>
</div>
</form>