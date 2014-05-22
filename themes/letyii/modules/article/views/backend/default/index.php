<?php

use yii\helpers\Html;
use app\components\GridView;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\article\models\base\LetArticleSearch $searchModel
 */
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php
// Generate a bootstrap responsive striped table with row highlighted on hover
echo GridView::widget([
    'panel' => [
        'heading' => 'Danh sách tin',
        'after' => '{export}',
    ],
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
            'attribute' => 'creator', 
            'vAlign' => 'middle',
            'value' => function ($model, $index, $widget) { 
        var_dump($model->creator);
//                return Html::a($model->author->name,  
//                    '#', 
//                    [
//                        'title'=>'View author detail', 
//                        'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
//                    ]);
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'), 
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Tìm user'],
            'format'=>'raw'
        ],
        [
            'attribute' => 'status',
            'class' => '\kartik\grid\BooleanColumn',
            'trueLabel' => 'Yes', 
            'falseLabel' => 'No'
        ],
        [
            'class' => '\app\components\ActionColumn',
//            'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
        ],
    ],
    'responsive'=>true,
    'hover'=>true,
]);
?>

