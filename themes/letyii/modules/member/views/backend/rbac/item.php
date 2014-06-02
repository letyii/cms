<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\GridView;
$this->registerJsFile(\yii\helpers\Url::base() . '/modules/member/assets/js/member.js', [\yii\web\JqueryAsset::className()]);

$this->title = Yii::t(Yii::$app->controller->module->id, 'Role and Permission');
$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Member'), 'url' => ['backend/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li><?php echo Html::a(Yii::t(Yii::$app->controller->module->id, 'Role tree'), ['backend/rbac/index']) ?></li>
    <li class="active"><?php echo Html::a(Yii::t(Yii::$app->controller->module->id, 'Role and Permission'), ['backend/rbac/item']) ?></li>
</ul>

<div class="panel panel-default" style="border-top: 0;">
    <div class="panel-body">
        <div class="margin-bottom">
            <div class="btn-group pull-right" data-toggle="buttons">
                <?php
                echo Html::button('Tạo vai trò', [
                    'class' => 'btn btn-success',
                    'onclick' => '$("#roleForm,#permissionForm").hide(); $("#roleForm").show();',
                ]);
                echo Html::button('Tạo phân quyền', [
                    'class' => 'btn btn-success',
                    'onclick' => '$("#roleForm,#permissionForm").hide(); $("#permissionForm").show();',
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
                    <label for="roleDescription">Mô tả</label>
                    <?php echo Html::textInput('roleDescription', '', [
                        'id' => 'roleDescription',
                        'class' => 'form-control',
                    ]); ?>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <?php
                    echo Html::button(Yii::t('yii', 'Cancel'), [
                        'class' => 'btn',
                        'onclick' => '$("#roleForm").hide();',
                    ]);
                    echo Html::button(Yii::t('yii', 'Save'), [
                        'class' => 'btn btn-success',
                        'onclick' => 'createItem("'.yii\helpers\Url::toRoute(['backend/ajax/createitem']).'", "1");',
                    ]);
                    ?>
                </div>
                <div class="clearfix"></div>
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
                    <label for="permissionDescription">Mô tả</label>
                    <?php echo Html::textInput('permissionDescription', '', [
                        'id' => 'permissionDescription',
                        'class' => 'form-control',
                    ]); ?>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <?php
                    echo Html::button(Yii::t('yii', 'Cancel'), [
                        'class' => 'btn',
                        'onclick' => '$("#permissionForm").hide();',
                    ]);
                    echo Html::button(Yii::t('yii', 'Save'), [
                        'class' => 'btn btn-success',
                        'onclick' => 'createItem("'.yii\helpers\Url::toRoute(['backend/ajax/createitem']).'", "2");',
                    ]);
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

        <div>
            <?php
            echo GridView::widget([
                'panel' => [
                    'heading' => $this->title,
                    'after' => '{export}',
                    'tableOptions' => [
                        'id' => 'listDefault',
                    ],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
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
                    [
                        'header' => 'Gán quyền',
                        'mergeHeader' => true,
                        'hAlign' => 'center',
                        'vAlign' => 'middle',
                        'value' => function ($model, $index, $widget) {
                            if ($model->type == 1) {
                                return Html::a('Gán quyền', ['backend/rbac/updatechild', 'item' => $model->name], [
                                    'class' => 'btn btn-xs btn-primary'
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
                                $url = Url::to(['backend/ajax/deleteitem']);
                                return Html::a('<i class="glyphicon glyphicon-trash"></i>', NULL, [
                                    'href' => 'javascript:void(0);',
                                    'title' => Yii::t('yii', 'Delete'),
                                    'onclick' => "js:deleteItem('{$url}', '{$model->name}'); return false;"
                                ]);
                            }
                        ]
                    ],
                ],
                'responsive' => true,
                'hover' => true,
            ]);
            ?>
        </div>
    </div>
</div>

