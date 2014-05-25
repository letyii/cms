<?php
use yii\helpers\Html;
use app\components\GridView;
use yii\helpers\ArrayHelper;
?>

<div class="margin-bottom">
<!--    <div class="btn-group pull-left" data-toggle="buttons">
        <button class="btn btn-success" onclick="updateList('<?php echo yii\helpers\Url::toRoute(['backend/ajax/updatelist']); ?>');">
            Lưu thay đổi
        </button>
    </div>-->
    <div class="btn-group pull-right">
        <?php echo Html::a('Nhóm vai trò và phân quyền', ['backend/rbac/index'], [
            'class' => 'btn btn-success',
        ]); ?>
    </div>
    <div class="clearfix"></div>
</div>
<div class="margin-bottom">
    <div class="btn-group pull-right">
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
        'username',
        'email',
        'role',
/*        [
            'attribute' => 'creator',
            'vAlign' => 'middle',
            'value' => function ($model, $index, $widget) {
                    return Html::a($model->creatorBy->username, '#', [
                        'title' => 'View author detail',
                        'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")'
                    ]);
                },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
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
        ],*/
        [
            'class' => '\app\components\ActionColumn',
//            'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
        ],
    ],
    'responsive' => true,
    'hover' => true,
]);
?>