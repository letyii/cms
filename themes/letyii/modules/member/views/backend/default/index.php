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
        ]);
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
        ['class' => 'kartik\grid\CheckboxColumn'],
        [
            'attribute' => 'id',
            'mergeHeader' => TRUE,
            'hAlign' => 'center',
        ],
        'username',
        'email',
        [
            'header' => 'Vai trò',
            'mergeHeader' => TRUE,
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'value' => function ($model, $index, $widget) {
                return Html::a('Quản lý vai trò', ['backend/rbac/assign', 'user_id' => $model->id], [
                    'class' => 'btn btn-xs btn-primary'
                ]);
            },
            'format'=>'raw',
        ],
        [
            'class' => '\app\components\ActionColumn',
        ],
    ],
    'responsive' => true,
    'hover' => true,
]);
?>