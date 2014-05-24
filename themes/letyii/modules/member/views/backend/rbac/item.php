<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile(\yii\helpers\Url::base() . '/modules/member/assets/js/member.js', [\yii\web\JqueryAsset::className()]);
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li><a href="<?php echo Url::toRoute('backend/rbac/index'); ?>">Cây quan hệ vai trò</a></li>
    <li class="active"><a href="<?php echo Url::toRoute('backend/rbac/item'); ?>">Vai trò và phân quyền</a></li>
</ul>

<div class="panel panel-default" style="border-top: 0;"> <!-- Chinh lai sau -->
    <div class="panel-body">
        <div class="margin-bottom">
            <div class="btn-group pull-right" data-toggle="buttons">
                <?php
                echo Html::button('Tạo vai trò', [
                    'class' => 'btn btn-success',
                    'onclick' => 'createItem("'.yii\helpers\Url::toRoute(['backend/ajax/createrole']).'", "1");',
                ]);
                echo Html::button('Tạo phân quyền', [
                    'class' => 'btn btn-success',
                    'onclick' => '',
                ]);
                ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel panel-default" id="roleForm" style="display: block">
            <div class="panel-heading">Tạo vai trò</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="roleName">Nhập tên vai trò</label>
                    <?php echo Html::textInput('roleName', '', [
                        'id' => 'roleName',
                        'class' => 'form-control',
                    ]); ?>
                </div>
                <?php echo Html::button('Tạo mới', [
                    'class' => 'btn btn-success',
                    'onclick' => 'createItem("'.yii\helpers\Url::toRoute(['backend/ajax/createitem']).'", "1");',
                ]); ?>
            </div>
        </div>

        <div class="panel panel-default" id="permissionForm" style="display: block">
            <div class="panel-heading">Tạo phân quyền</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="moduleName">Nhập tên Module</label>
                    <?php
                    foreach (array_keys(Yii::$app->modules) as $module) {
                        $modules[$module] = $module;
                    }
                    echo Html::dropDownList('moduleName', '', $modules, [
                        'id' => 'moduleName',
                        'class' => 'form-control',
                    ]); ?>
                </div>
                <div class="form-group">
                    <label for="permissionName">Nhập tên phân quyền</label>
                    <?php echo Html::textInput('permissionName', '', [
                        'id' => 'permissionName',
                        'class' => 'form-control',
                    ]); ?>
                </div>
                <?php echo Html::button('Tạo mới', [
                    'class' => 'btn btn-success',
                    'onclick' => 'createItem("'.yii\helpers\Url::toRoute(['backend/ajax/createitem']).'", "2");',
                ]); ?>
            </div>
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
                                $url = yii\helpers\Url::toRoute(['backend/ajax/updateitem']);
                                return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, [
                                    'class' => 'btn btn-xs btn-danger',
                                    'title' => Yii::t('yii', 'Update'),
                                    'onclick' => "js:updateRole('{$url}', '{$model->name}'); return false;"
                                ]);
                            },          
                            'delete' => function ($url, $model) {
                                $url = yii\helpers\Url::toRoute(['backend/ajax/deleteitem']);
                                return Html::a('<i class="glyphicon glyphicon-trash-o"></i>', $url, [
                                    'class' => 'btn btn-xs btn-success',
                                    'title' => Yii::t('yii', 'Delete'),
                                    'onclick' => "js:deleteItem('{$url}', '{$model->name}'); return false;"
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

