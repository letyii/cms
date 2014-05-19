<?php

use yii\helpers\Html;
use app\components\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleBase $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Let Article Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="let-article-base-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('article', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('article', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('article', 'Are you sure you want to delete this item?'),
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
            'created_time',
            'editor',
            'updated_time',
            'promotion',
            'status',
        ],
    ]) ?>
</div>
