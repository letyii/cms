<?php

use yii\helpers\Html;
use app\components\BackendGridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\article\models\base\LetArticleSearch $searchModel
 */
$this->title = Yii::t('article', 'Let Article Bases');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="page-content page-tables">
        <!--<h1><?= Html::encode($this->title) ?></h1>-->
        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
        <p>
            <?php echo Html::a(Yii::t('article', 'Create {modelClass}', [
                        'modelClass' => 'Let Article Base',
                    ]), ['create'], ['class' => 'btn btn-success'])
            ?>
        </p>
        <?php echo BackendGridView::widget([
            'title' => 'Danh sách tin',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id',
                    'options' => [
                        'width' => '60px',
                    ],
                ],
                'title',
                'image',
                'intro',
                [
                    'class' => 'app\components\BackendActionColumn',
                    'options' => [
                        'class' => 'fix_table_width',
                    ],
                    'template' => '{boolean}',
                ],
                [
                    'class' => 'app\components\BackendActionColumn',
                    'options' => [
                        'width' => '90px',
                    ],
                ],
            ],
        ]);
        ?>
    </div>
</div>


<div class="let-article-base-index">



</div>
