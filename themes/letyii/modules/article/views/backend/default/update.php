<?php
use yii\helpers\Html;

$this->title = Yii::t(Yii::$app->controller->module->id, 'Edit "{title}"', ['title' => $model->title]);
$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Article'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="margin-bottom">
    <div class="btn-group pull-right">
        <?php echo Html::button('Lưu', [
            'class' => 'btn btn-success',
            'onclick' => '$("#formDefault").submit();',
        ]) ?>
    </div>
    <div class="clearfix"></div>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><?php echo Html::encode($this->title); ?></div>
    <div class="panel-body">
        <?php echo $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
