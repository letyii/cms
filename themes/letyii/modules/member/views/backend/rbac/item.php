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
                    'onclick' => '$("#roleForm").slideToggle()',
                ]);
                echo Html::button('Tạo phân quyền', [
                    'class' => 'btn btn-success',
                    'onclick' => '$("#permissionForm").slideToggle()',
                ]);
                ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel panel-default" id="roleForm" style="display: none">
            <div class="panel-heading">Tạo vai trò</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="roleName">Nhập tên vai trò</label>
                    <?php echo Html::textInput('roleName', '', [
                        'id' => 'roleName',
                        'class' => 'form-control',
                    ]); ?>
                </div>
                <div class="form-group">
                    <label for="roleDescription">Description</label>
                    <?php echo Html::textInput('roleDescription', '', [
                        'id' => 'roleDescription',
                        'class' => 'form-control',
                    ]); ?>
                </div>
                <?php echo Html::button('Tạo mới', [
                    'class' => 'btn btn-success',
                    'onclick' => 'createItem("'.yii\helpers\Url::toRoute(['backend/ajax/createitem']).'", "1");',
                ]); ?>
            </div>
        </div>

        <div class="panel panel-default" id="permissionForm" style="display: none">
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
                <div class="form-group">
                    <label for="permissionDescription">Description</label>
                    <?php echo Html::textInput('permissionDescription', '', [
                        'id' => 'permissionDescription',
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
                    ['class' => 'kartik\grid\SerialColumn'],

                    'name',
                    [
                        'attribute' => 'type',
                        'value' => function ($model, $index, $widget) {
                            if ($model->type == 1) {
                                return 'Vai trò';
                            } elseif ($model->type == 2) {
                                return 'Phân quyền';
                            }
                        },
                    ],
                    'description:ntext',
                    'rule_name',
                    'data:ntext',
                    [
                        'header' => 'Gán quyền',
                        'mergeHeader' => true,
                        'hAlign' => 'center', 
                        'vAlign' => 'middle',
                        'value' => function ($model, $index, $widget) {
                            if ($model->type == 1) {
                                return Html::a('Gán quyền', ['backend/rbac/assign'], [
                                    'class' => 'btn btn-xs btn-success',
                                ]);
                            } else {
                                return '';
                            }
                        },
                        'format'=>'raw',
                    ],
                    [
                        'class' => 'app\components\ActionColumn',
                        'options' => [
                            'width' => '90px',
                        ],
                        'template' => '{delete}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                $url = yii\helpers\Url::toRoute(['backend/ajax/deleteitem']);
                                return Html::a('<i class="glyphicon glyphicon-trash"></i>', NULL, [
                                    'href' => 'javascript:void(0);',
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

