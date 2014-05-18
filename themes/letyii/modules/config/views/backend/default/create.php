<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\config\models\LetConfig;
$this->registerCssFile(\yii\helpers\Url::base() . '/modules/config/assets/css/config.css');
$this->registerJsFile(\yii\helpers\Url::base() . '/modules/config/assets/js/config.js', [\yii\web\JqueryAsset::className()]);
?>
<div style="height: 20px"></div>
<div class="container">
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
    <div class="page-content page-form">
        <div class="widget">
            <div class="widget-head">
                <h4>Tạo config</h4>
            </div>
            <div class="widget-body">
                <?php echo $this->render('_create_' . $type, [
                    'type' => $type,
                    'model' => $model,
                    'modules' => $modules,
                ]); ?>
            </div>
        </div>
    </div>
</div>
