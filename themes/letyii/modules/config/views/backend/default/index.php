<?php
use yii\helpers\Html;
use yii\helpers\Url;
use \yii\helpers\Json;
use app\modules\config\models\LetConfig;
?>
<div class="container">
    <div class="page-content page-form">
        <div class="widget">
            <div class="btn-group pull-left" data-toggle="buttons">
                <?php echo Html::button('Lưu thay đổi', [
                    'class' => 'btn btn-success',
                    'onclick' => '$("#formDefault").submit();',
                ]) ?>
                <?php echo Html::button('Reset', [
                    'class' => 'btn btn-default',
                    'onclick' => '$("#formDefault")[0].reset();',
                ]) ?>
            </div>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    Tạo config <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'text']); ?>">Text</a></li>
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'dropdown']); ?>">Dropdown</a></li>
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'checkbox']); ?>">Checkbox</a></li>
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'textarea']); ?>">Textarea</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="page-content page-form">
        <div class="widget">
            <div class="widget-head">
                <div class="pull-left"><h4>Cấu hình</h4></div>
                <div class="pull-right">
                    <?php echo Html::beginForm(['backend/default/index'], 'GET', [ 'role' => 'form', 'class' => 'form-inline']); ?>
                    <div class="form-group">
                        <?php
                        $data = LetConfig::filter();
                        $data = LetConfig::asDataAutocomplete($data, 'name');
                        echo \yii\jui\AutoComplete::widget([
                            'name' => 'keyword',
                            'value' => Yii::$app->request->get('keyword', ''),
                            'clientOptions' => [
                                'source' => $data,
                            ],
                            'options' => [
                                'class' => 'form-control col-lg-2',
                                'onchange' => 'getListKey("' . yii\helpers\Url::toRoute(['backend/ajax/filter']) . '");',
                                'placeholder' => 'Tìm kiếm theo key',
                            ],
                        ]);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo Html::dropDownList('module', Yii::$app->request->get('module', ''), $modules, [
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?php echo Html::submitButton('Lọc', [
                            'class' => 'btn btn-info',
                            'onclick' => '$("#formDefault").submit();',
                        ]) ?>
                        <?php echo Html::a('Reset', ['backend/default/index'], [
                            'class' => 'btn btn-default',
                        ]) ?>
                    </div>
                    <?php echo Html::endForm(); ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <?php echo Html::beginForm('', 'POST', ['id' => 'formDefault', 'role' => 'form', 'class' => 'form-horizontal']); ?>
                <?php foreach ($configs as $config): ?>
                    <?php if ($config['type'] == "text" || $config['type'] == "textarea"): ?>
                    <div class="form-group">
                        <label class="col-lg-3 control-label"><?php echo $config['name']; ?>
                                <a href="<?php echo Url::toRoute(['backend/default/update', 'name' => $config['name']]); ?>"><i class="fa fa-pencil"></i></a>
                            </label>
                            <div class="col-lg-9">
                                <?php echo Html::input($config['type'], 'config[' . $config['name'] . ']', $config['value'], [
                                    'class' => 'form-control',
                                ]) ?>
                            </div>
                    </div>
                    <?php elseif ($config['type'] == "dropdown" AND $config['value'] !== '[]'): ?>
                    <div class="form-group">
                            <label class="col-lg-3 control-label"><?php echo $config['name']; ?>
                                <a href="<?php echo Url::toRoute(['backend/default/update', 'name' => $config['name']]); ?>"><i class="fa fa-pencil"></i></a>
                            </label>
                            <div class="col-lg-9">
                                <?php $values = Json::decode($config['value']); ?>
                                <select class="form-control" name="config[<?php echo $config['name']; ?>]">
                                    <?php foreach ($values as $optionName => $value): ?>
                                    <option value="<?php echo $optionName; ?>" <?php echo $value == TRUE ? "selected" : ""; ?>><?php echo $optionName; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                    </div>
                    <?php elseif ($config['type'] == "checkbox"): ?>
                    <div class="form-group">
                            <label class="col-lg-3 control-label"><?php echo $config['name']; ?>
                                <a href="<?php echo Url::toRoute(['backend/default/update', 'name' => $config['name']]); ?>"><i class="fa fa-pencil"></i></a>
                            </label>
                                <?php $values = json_decode($config['value']); ?>
                            <div class="col-lg-9">
                                <?php foreach ($values as $optionName => $value): ?>
                                <label class="checkbox-inline">
                                    <input <?php echo $value == TRUE ? "checked" : ""; ?>
                                        type="checkbox" name="config[<?php echo $config['name']; ?>][<?php echo $optionName; ?>]" id="config_max_level"
                                        class="" value="<?php echo $optionName; ?>"><?php echo $optionName; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php echo Html::endForm(); ?>
            </div>
        </div>
    </div>
</div>