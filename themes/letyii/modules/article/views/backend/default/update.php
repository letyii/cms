<?php
use yii\helpers\Html;

$this->title = Yii::t(Yii::$app->controller->module->id, 'Edit "{title}"', ['title' => $model->title]);
$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Article'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$buttons = Html::button(Yii::t('yii', 'Apply'), [
    'class' => 'btn btn-success',
    'onclick' => '$("input[name=save_type]").val("apply"); $("#formDefault").submit();',
]);
$buttons .= Html::button(Yii::t('yii', 'Save'), [
    'class' => 'btn btn-success',
    'onclick' => '$("#formDefault").submit();',
]);
?>

<div class="margin-bottom">
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="btn-group pull-right">
            <?php echo $buttons; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <?php echo $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
    <div class="panel-footer">
        <div class="btn-group pull-right">
            <?php echo $buttons; ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
