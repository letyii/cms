<?php

use yii\helpers\Html;
use app\components\GridView;
use yii\helpers\ArrayHelper;
use app\modules\member\models\LetUser;

$this->title = Yii::t(Yii::$app->controller->module->id, 'Article');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="margin-bottom">
    <div class="btn-group pull-left">
        <?php
        echo Html::a(Yii::t('yii', 'Delete'), ['backend/default/create'], [
            'class' => 'btn btn-danger',
            'onclick' => '$("#formDefault").submit();',
        ]);
        ?>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo Yii::t('yii', 'Status'); ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Active</a></li>
                <li><a href="#">Inactive</a></li>
            </ul>
        </div>
        <?php
        echo Html::a(Yii::t('yii', 'Create'), ['backend/default/create'], [
            'class' => 'btn btn-success',
            'onclick' => '$("#formDefault").submit();',
        ]);
        ?>
    </div>
    <div class="clearfix"></div>
</div>

<?php
echo GridView::widget([
    'panel' => [
        'heading' => Yii::t(Yii::$app->controller->module->id, 'Article'),
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
            return Html::a($model->creatorBy->username, '#', [
                'title' => 'View author detail',
                'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")'
            ]);
        },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(LetUser::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Tìm user'],
            'format' => 'raw'
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
    'responsive' => true,
    'hover' => true,
]);
?>

