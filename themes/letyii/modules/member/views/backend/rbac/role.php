<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li><a href="<?php echo Url::toRoute('backend/rbac/index'); ?>">Cây quan hệ vai trò</a></li>
    <li class="active"><a href="<?php echo Url::toRoute('backend/rbac/role'); ?>">Vai trò</a></li>
    <li><a href="<?php echo Url::toRoute('backend/rbac/permission'); ?>">Phân quyền</a></li>
</ul>

<div class="panel panel-default" style="border-top: 0;"> <!-- Chinh lai sau -->
    <div class="panel-body">
        <div class="margin-bottom">
            <div class="btn-group pull-right" data-toggle="buttons">
                <?php
                echo Html::button('Tạo vai trò', [
                    'class' => 'btn btn-success',
                    'onclick' => 'createRole("'.yii\helpers\Url::toRoute(['backend/ajax/createrole']).'");',
                ])
                ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div>
            <?php echo app\components\GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,                                    
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    'type',
                    'description:ntext',
                    'rule_name',
                    'data:ntext',
                    // 'created_at',
                    // 'updated_at',

                    [
                        'class' => 'app\components\ActionColumn',
                        'options' => [
                            'width' => '90px',
                        ],
                        'buttons' => [
                            'update' => function ($url, $model) {
                                $url = yii\helpers\Url::toRoute(['backend/ajax/updaterole']);
                                return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, [
                                    'class' => 'btn btn-xs btn-danger',
                                    'title' => Yii::t('yii', 'Update'),
                                    'onclick' => "js:updateRole('{$url}', '{$model->name}'); return false;"
                                ]);
                            },          
                            'delete' => function ($url, $model) {
                                $url = yii\helpers\Url::toRoute(['backend/ajax/deleterole']);
                                return Html::a('<i class="glyphicon glyphicon-trash-o"></i>', $url, [
                                    'class' => 'btn btn-xs btn-success',
                                    'title' => Yii::t('yii', 'Delete'),
                                    'onclick' => "js:deleteRole('{$url}', '{$model->name}'); return false;"
                                ]);
                            }
                        ]
                    ],
                ],
            ]); 
            ?>
        </div>
    </div>
</div>

