<?php
use yii\helpers\Html;

$this->title = Yii::t('article', 'Create {modelClass}', [
  'modelClass' => 'Let Article Base',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Let Article Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="page-content page-form">
        <div class="btn-group pull-left" data-toggle="buttons">
            <?php echo Html::button('Lưu', [
                'class' => 'btn btn-success',
                'onclick' => '$("#formDefault").submit();',
            ]) ?>
        </div>
        <div class="clearfix"></div>
        <div class="widget">
            <div class="widget-head">
                <h4>Tạo bài viết</h4>
            </div>
            <div class="widget-body">
                <?php echo $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>

