<?php

use yii\helpers\Html;
use app\components\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleBase $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Article'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?php echo Html::encode($this->title) ?></h1>

<p>
    <?php echo Html::a(Yii::t(Yii::$app->controller->module->id, 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php echo Html::a(Yii::t(Yii::$app->controller->module->id, 'Delete'), ['delete', 'id' => $model->id], [
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
        'title',
        'image',
        'intro',
        'content:ntext',
        'author',
        'source',
        'tags',
        'from_time',
        'to_time',
        'seo_title',
        'seo_url:url',
        'seo_desc',
        'creator',
        'create_time',
        'editor',
        'update_time',
        'promotion',
        'status',
    ],
]) ?>
