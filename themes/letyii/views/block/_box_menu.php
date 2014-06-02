<?php
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$modules = [];
foreach (array_keys(Yii::$app->modules) as $module){
    if (in_array($module, ['cms', 'debug', 'gridview']))
        continue;

    if ($module == 'gii')
        $modules[] = ['label' => 'Gii', 'url' => ['/' . $module]];
    else {
        $thisModule = ['label' => Yii::t($module, ucfirst($module)), 'url' => ['/' . $module . '/backend/default']];
        if (Yii::$app->controller->module->id == $module)
            $thisModule['active'] = TRUE;
        $modules[] = $thisModule;
    }
}
if (!empty($modules))  {
    $modules = ['label' => 'Modules', 'items' => $modules];
}

$home = ['label' => 'Home', 'url' => Url::home()];
    if (Yii::$app->controller->module->id == 'cms')
        $home['active'] = TRUE;

$items[] = $home;
$items[] = $modules;
$items[] = ['label' => Yii::t('yii', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
            'url' => ['/member/backend/auth/logout'],
            'linkOptions' => ['data-method' => 'post']];

NavBar::begin([
    'brandLabel' => 'LetYii CMS 1.0 Alpha',
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
