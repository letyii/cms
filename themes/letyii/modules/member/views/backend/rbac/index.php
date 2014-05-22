<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Tabs;

\yii\jui\SortableAsset::register($this);
$this->registerCssFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/css/tree.css');
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php echo Url::toRoute('backend/rbac/index'); ?>">Cây quan hệ vai trò</a></li>
    <li><a href="<?php echo Url::toRoute('backend/rbac/role'); ?>">Vai trò</a></li>
    <li><a href="<?php echo Url::toRoute('backend/rbac/permission'); ?>">Phân quyền</a></li>
</ul>

<div class="panel panel-default" style="border-top: 0;"> <!-- Chinh lai sau -->
    <div class="panel-body">
        <div class="tree">
            <?php echo $treeHtml; ?>
        </div>
    </div>
</div>