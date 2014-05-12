<?php

use yii\helpers\Html;

\yii\jui\SortableAsset::register($this);
$this->registerCssFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/css/tree.css');
$this->registerJsFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/js/jquery.mjs.nestedSortable.js', [\yii\web\JqueryAsset::className()]);
$this->registerJsFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/js/tree.js', [\yii\web\JqueryAsset::className()]);
?>

<!-- Content starts -->
<div class="container">

    <div class="page-content page-media">
        <div class="alert-result"></div>

        <div>
            <div class="btn-group pull-left" data-toggle="buttons">
                <button class="btn btn-success" onclick="updateList('<?php echo yii\helpers\Url::toRoute(['backend/ajax/updatelist']); ?>');">
                    Lưu thay đổi
                </button >
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
                    <div id="result_ajax"></div>
                    <input type="hidden" id="categoryChangedListJson" value="" />
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

                            echo Html::beginTag('li', array('id' => 'item_' . $category->id));
                            echo Html::beginTag('div');
                            echo Html::beginTag('i', array('class' => 'fa fa-arrows')) . Html::endTag('i') . ' ';
                            echo Html::encode($category->id . ': ');
                            echo Html::beginTag('span');
//                            echo Html::textInput('item_' . $category->id, $category->title, array('style' => 'border:0;'));
                            echo Html::encode($category->title);
                            echo Html::endTag('span') . ' ';

                            // action button
                            echo Html::beginTag('button', array('class' => 'btn btn-xs btn-success', 'onclick' => "createNode('" . yii\helpers\Url::toRoute(['backend/ajax/create']) . "', " . $category->id . ", '" . $category->module . "')"));
                            echo Html::beginTag('i', array('class' => 'fa fa-plus')) . Html::endTag('i') . ' ';
                            echo Html::endTag('button') . ' ';
                            echo Html::beginTag('button', array('class' => 'btn btn-xs btn-primary', 'onclick' => "updateNode('" . yii\helpers\Url::toRoute(['backend/ajax/updatecategory']) . "', " . $category->id . ")"));
                            echo Html::beginTag('i', array('class' => 'fa fa-pencil')) . Html::endTag('i') . ' ';
                            echo Html::endTag('button') . ' ';
                            echo Html::beginTag('button', array('class' => 'btn btn-xs btn-danger', 'onclick' => "deleteNode('" . yii\helpers\Url::toRoute(['backend/ajax/delete']) . "', " . $category->id . ")"));
                            echo Html::beginTag('i', array('class' => 'fa fa-times')) . Html::endTag('i') . ' ';
                            echo Html::endTag('button') . ' ';
                            echo Html::endTag('div');
                            $level = $category->level;
                        }

                        for ($i = $level; $i; $i--) {
                            echo Html::endTag('li') . "\n";
                            echo Html::endTag('ul') . "\n";
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Content ends -->
