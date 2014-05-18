<?php

use yii\helpers\Html;
use app\components\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\article\models\base\LetArticleSearch $searchModel
 */
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="page-content page-tables">
        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
        <p>
            <?php echo Html::a(Yii::t('article', 'Create {modelClass}', [
                        'modelClass' => 'Let Article Base',
                    ]), ['create'], ['class' => 'btn btn-success'])
            ?>
        </p>
        <?php echo GridView::widget([
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
                    'class' => 'app\components\ActionColumn',
                    'options' => [
                        'class' => 'fix_table_width',
                    ],
                    'template' => '{boolean}',
                ],
                [
                    'class' => 'app\components\ActionColumn',
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
