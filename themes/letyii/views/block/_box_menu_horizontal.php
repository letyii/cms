<?php
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$items[] = [
    'label' => Yii::t('yii', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
    'url' => ['/member/backend/auth/logout'],
];

NavBar::begin([
    'brandLabel' => 'LetYii CMS 1.0 Alpha',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-static-top',
    ],
    'innerContainerOptions' => [
        'class' => 'container-fluid',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'activateParents' => TRUE,
    'items' => $items,
]);
NavBar::end();
?>
