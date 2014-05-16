<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\article\models\base\LetArticleSearch $searchModel
 */

$this->title = Yii::t('article', 'Let Article Bases');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="let-article-base-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('article', 'Create {modelClass}', [
  'modelClass' => 'Let Article Base',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'image',
            'intro',
//            'content:ntext',
            // 'author',
            // 'source',
            // 'tags',
            // 'from_time',
            // 'to_time',
            // 'seo_title',
            // 'seo_url:url',
            // 'seo_desc',
            // 'creator',
            // 'created_time',
            // 'editor',
            // 'updated_time',
            // 'promotion',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
