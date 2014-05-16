<?php

use yii\helpers\Html;
use yii\helpers\Url;

\yii\jui\SortableAsset::register($this);
$this->registerCssFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/css/tree.css');
$this->registerJsFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/js/jquery.mjs.nestedSortable.js', [\yii\web\JqueryAsset::className()]);
$this->registerJsFile(\yii\helpers\Url::base() . '/modules/member/assets/js/member.js', [\yii\web\JqueryAsset::className()]);
?>
<div class="container">
    <div class="page-content page-posts">

        <div class="page-tabs">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li><a href="<?php echo Url::toRoute('backend/rbac/index'); ?>">Cây quan hệ vai trò</a></li>
                <li class="active"><a href="<?php echo Url::toRoute('backend/rbac/role'); ?>">Vai trò</a></li>
                <li><a href="<?php echo Url::toRoute('backend/rbac/permission'); ?>">Phân quyền</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div class="tab-pane fade active in">
                    <div>
<!--                        <div class="btn-group pull-left" data-toggle="buttons">
                            <button class="btn btn-success" onclick="updateList('<?php echo yii\helpers\Url::toRoute(['backend/ajax/updatelist']); ?>');">
                                Lưu thay đổi
                            </button>
                        </div>-->
                        <div class="btn-group pull-right">
                            <a class="btn btn-success" href="javascript:;" onclick="js:createRole('<?php echo yii\helpers\Url::toRoute(['backend/ajax/createrole']); ?>');">
                                Tạo vai trò
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="widget">

                        <div class="widget-head">
                            <h5 class="pull-left"><i class="fa fa-camera"></i> Posts</h5>	
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body no-padd">
                            <div class="table-responsive">
                                <?= app\components\LetGridView::widget([
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
                                            'class' => 'app\components\LetActionColumn',
                                            'options' => [
                                                'width' => '90px',
                                            ],
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    $url = yii\helpers\Url::toRoute(['backend/ajax/updaterole']);
                                                    return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                                        'class' => 'btn btn-xs btn-danger',
                                                        'title' => Yii::t('yii', 'Update'),
                                                        'onclick' => "js:updateRole('{$url}', '{$model->name}'); return false;"
                                                    ]);
                                                },          
                                                'delete' => function ($url, $model) {
                                                    $url = yii\helpers\Url::toRoute(['backend/ajax/deleterole']);
                                                    return Html::a('<i class="fa fa-trash-o"></i>', $url, [
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
                                
                                <?php /*
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type='checkbox' value='check1' />
                                            </th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>                  
                                                <input type='checkbox' value='check1' />
                                            </td>
                                            <td><a href="#">Vestibulum lacus turpisac viverra id</td>
                                            <td>Ashok</td>
                                            <td>23/12/2012</td>
                                            <td>Published</td>
                                            <td>

                                                <button class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i> </button>
                                                <button class="btn btn-xs btn-info"><i class="fa fa-times"></i> </button>
                                                <button class="btn btn-xs btn-success"><i class="fa fa-trash-o"></i> </button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                */ ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
