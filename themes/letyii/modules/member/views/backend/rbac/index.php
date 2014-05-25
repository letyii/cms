<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Tabs;

\yii\jui\SortableAsset::register($this);
$this->registerCssFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/css/tree.css');
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><?php Html::a('Cây quan hệ vai trò', ['backend/rbac/index']) ?></li>
    <li><?php Html::a('Vai trò và phân quyền', ['backend/rbac/item']) ?></li>
</ul>

<div class="panel panel-default" style="border-top: 0;"> <!-- Chinh lai sau -->
    <div class="panel-body">
        <div class="tree">
            <?php echo $treeHtml; ?>
        </div>
    </div>
</div>