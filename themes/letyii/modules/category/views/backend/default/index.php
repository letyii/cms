<?php

use yii\helpers\Html;

$this->registerCssFile(\yii\helpers\Url::base() . '/modules/category/assets/css/tree.css');
$this->registerJsFile(\yii\helpers\Url::base() . '/modules/category/assets/js/tree.js', [\yii\web\JqueryAsset::className()]);
?>

<!-- Content starts -->
<div class="container">
    <div class="page-content page-media">

        <div>
            <div class="btn-group pull-left" data-toggle="buttons">
                <button class="btn btn-primary">
                    Kích hoạt
                </button >
                <button class="btn btn-black">
                    Vô hiệu hóa
                </button>
                <button class="btn btn-primary">
                    Tiêu điểm
                </button>
                <button class="btn btn-black">
                    Bỏ tiêu điểm
                </button>
                <button class="btn btn-warning">
                    Di chuyển
                </button>
                <button class="btn btn-danger">
                    Xóa
                </button>
            </div>
            <!-- Single button -->
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    Tạo danh mục <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <?php foreach (\app\modules\category\models\letCategory::getModules() as $module): ?>
                        <li><a href="<?php echo yii\helpers\Url::toRoute(['backend/default/create', 'module' => $module]); ?>"><?php echo ucfirst($module); ?></a></li>
<?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="widget">
            <div class="widget-head">
                <h5 class="pull-left"><i class="fa fa-camera"></i> Media</h5>	
                <div class="clearfix"></div>
            </div>
            <div class="widget-body no-padd">
                <div class="table-responsive">

                    <div class="tree">
                        <?php
                        $categories = \app\modules\category\models\letCategory::find()->addOrderBy('lft')->all();
                        $level = 0;

                        foreach ($categories as $n => $category) {
                            if ($category->level == $level) {
                                echo Html::endTag('li') . "\n";
                            } elseif ($category->level > $level) {
                                echo Html::beginTag('ul') . "\n";
                            } else {
                                echo Html::endTag('li') . "\n";

                                for ($i = $level - $category->level; $i; $i--) {
                                    echo Html::endTag('ul') . "\n";
                                    echo Html::endTag('li') . "\n";
                                }
                            }

                            //<span><i class="fa fa-plus"></i> Grand Child</span>
                            echo Html::beginTag('li');
                            echo Html::beginTag('span');
                            echo Html::beginTag('i', array('class' => 'fa fa-plus')).Html::endTag('i') . ' ';
                            echo Html::encode($category->title);
                            echo Html::endTag('span');
                            $level = $category->level;
                        }

                        for ($i = $level; $i; $i--) {
                            echo Html::endTag('li') . "\n";
                            echo Html::endTag('ul') . "\n";
                        }
                        ?>
                        
                        <ul>
                            <li>
                                <span><i class="fa fa-plus"></i> Parent</span> <a href="">Goes somewhere</a>
                                <ul>
                                    <li>
                                        <span><i class="fa fa-minus"></i> Child</span> <a href="">Goes somewhere</a>
                                        <ul>
                                            <li>
                                                <span><i class="fa fa-plus"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-minus"></i> Child</span> <a href="">Goes somewhere</a>
                                        <ul>
                                            <li>
                                                <span><i class="fa fa-plus"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-minus"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                                <ul>
                                                    <li>
                                                        <span><i class="fa fa-minus"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                                        <ul>
                                                            <li>
                                                                <span><i class="fa fa-plus"></i> Great great Grand Child</span> <a href="">Goes somewhere</a>
                                                            </li>
                                                            <li>
                                                                <span><i class="fa fa-plus"></i> Great great Grand Child</span> <a href="">Goes somewhere</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-plus"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-plus"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-plus"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <span><i class="icon-folder-open"></i> Parent2</span> <a href="">Goes somewhere</a>
                                <ul>
                                    <li>
                                        <span><i class="fa fa-plus"></i> Child</span> <a href="">Goes somewhere</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>


        <div class="widget">
            <div class="widget-head">
                <h5 class="pull-left"><i class="fa fa-camera"></i> Media</h5>	
                <div class="clearfix"></div>
            </div>

            <div class="widget-body no-padd">
                <div class="table-responsive">
                    <table class="table table-bordered fix_table_width">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" value="check1" class="checkall" />
                                </th>
                                <th class="td_free">Tiêu đề</th>
                                <th>Tiêu điểm</th>
                                <th>Điều khiển</th>
                            </tr>
                        </thead>
                        <tbody>
<?php foreach ($data as $n => $category): ?>
                                <tr>
                                    <td>                  
                                        <input type="checkbox" value="check1" class="checkone" />
                                    </td>
                                    <td class="td_free">
                                        <strong><a href="edit.php"><?php echo str_repeat("-- ", ($category->level - 1)); ?> <?php echo Html::encode($category->title); ?></a></strong>
                                    </td>
                                    <td><button class="btn btn-xs"><i class="fa fa-times"></i> </button></td>
                                    <td>
                                        <button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> </button>
                                        <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Content ends -->
