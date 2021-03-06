<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\config\models\LetConfig;
$this->registerCssFile(\yii\helpers\Url::base() . '/modules/config/assets/css/config.css');
$this->registerJsFile(\yii\helpers\Url::base() . '/modules/config/assets/js/config.js', [\yii\web\JqueryAsset::className()]);
?>
<div class="margin-bottom">
    <div class="btn-group pull-left" data-toggle="buttons">
        <?php echo Html::button('Lưu thay đổi', [
            'class' => 'btn btn-success',
            'onclick' => '$("#formDefault").submit();',
        ]) ?>
    </div>
    <div class="btn-group pull-right">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            Tạo config <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'text']);?>">Text</a></li>
            <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'dropdown']);?>">Dropdown</a></li>
            <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'checkbox']);?>">Checkbox</a></li>
            <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'textarea']);?>">Textarea</a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Tạo config</div>
    <div class="panel-body">
        <?php echo $this->render('_form_' . Yii::$app->request->get('type'), [
            'model' => $model,
            'modules' => $modules,
        ]); ?>
    </div>
</div>