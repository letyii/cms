<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\category\models\search\letCategorySearch $searchModel
 */

$this->title = 'Let Categories';
$this->params['breadcrumbs'][] = $this->title;
//echo yii\helpers\Url::home(); die;
?>
<div class="let-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Let Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'root',
            'lft',
            'rgt',
            'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
