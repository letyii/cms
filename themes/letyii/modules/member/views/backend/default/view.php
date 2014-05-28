<?php

use yii\helpers\Html;
use app\components\DetailView;

$this->title = 'Thông tin thành viên "' . $model->username . '"';
$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Member'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?php echo Html::encode($this->title) ?></h1>
<p>
    <?php echo Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php echo Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t(Yii::$app->controller->module->id, 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p>

<?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'email',
        'status',
    ],
]) ?>
