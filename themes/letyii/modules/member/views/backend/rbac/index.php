<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Tabs;

\yii\jui\SortableAsset::register($this);
$this->registerCssFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/css/tree.css');

$this->params['breadcrumbs'][] = ['label' => Yii::t('member', 'Member'), 'url' => ['backend/default/index']];
$this->params['breadcrumbs'][] = Yii::t('member', 'Role tree');
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><?php echo Html::a(Yii::t('member', 'Role tree'), ['backend/rbac/index']) ?></li>
    <li><?php echo Html::a(Yii::t('member', 'Role and Permission'), ['backend/rbac/item']) ?></li>
</ul>

<div class="panel panel-default" style="border-top: 0;"> <!-- Chinh lai sau -->
    <div class="panel-body">
        <div class="tree">
            <?php echo $treeHtml; ?>
        </div>
    </div>
</div>