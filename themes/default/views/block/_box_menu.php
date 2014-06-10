<?php
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$home = ['label' => Yii::t('yii', 'Home'), 'url' => Url::home()];
    if (Yii::$app->controller->module->id == 'cms')
        $home['active'] = TRUE;

$items[] = $home;
$items[] = ['label' => Yii::t('article', 'Article list'), 'url' => ['article/frontend/default/list']];
$items[] = ['label' => Yii::t('category', 'Category'), 'url' => ['article/frontend/default/list']];
$items[] = ['label' => Yii::t('yii', 'Contact'), 'url' => ['cms/frontend/contact/index']];


NavBar::begin([
    'brandLabel' => 'LetYii CMS',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-static-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'activateParents' => TRUE,
    'items' => $items,
]);
NavBar::end();
?>
