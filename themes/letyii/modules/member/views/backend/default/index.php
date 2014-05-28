<?php
use yii\helpers\Html;
use app\components\GridView;
use yii\helpers\ArrayHelper;

$this->title = Yii::t(Yii::$app->controller->module->id, 'Member');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="margin-bottom">
    <div class="btn-group pull-left">
        <?php
        echo Html::a(Yii::t('yii', 'Create'), ['backend/default/create'], [
            'class' => 'btn btn-success',
            'onclick' => '$("#formDefault").submit();',
        ]);
        echo Html::a('Nhóm vai trò và phân quyền', ['backend/rbac/index'], [
            'class' => 'btn btn-primary',
        ]); ?>
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
        echo Html::a(Yii::t('yii', 'Delete'), ['backend/default/create'], [
            'class' => 'btn btn-danger',
            'onclick' => '$("#formDefault").submit();',
        ]);
        ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
echo GridView::widget([
    'panel' => [
        'heading' => Html::encode($this->title),
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
        [
            'class' => '\app\components\ActionColumn',
        ],
    ],
    'responsive' => true,
    'hover' => true,
]);
?>