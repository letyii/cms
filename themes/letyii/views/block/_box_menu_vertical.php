<?php
use yii\helpers\Url;
use kartik\widgets\SideNav;

$home = ['label' => Yii::t('yii', 'Home'), 'url' => Url::home()];
    if (Yii::$app->controller->module->id == 'cms')
        $home['active'] = TRUE;
$items[] = $home;


foreach (array_keys(Yii::$app->modules) as $module){
    if (in_array($module, ['cms', 'category']))
        continue;

    if ($module == 'gii')
        $items[] = ['label' => 'Gii', 'url' => ['/' . $module]];
    else {
        $moduleObj = Yii::$app->getModule($module);
        if (! ($moduleObj instanceof app\components\BackendModule))
            continue;

        $thisModule = ['label' => Yii::t($module, ucfirst($module)), 'url' => ['/' . $module . '/backend/default']];
        if (Yii::$app->controller->module->id == $module)
            $thisModule['active'] = TRUE;

        $moduleMenu = Yii::$app->getModule($module)->moduleMenu;
        if (!empty($moduleMenu) AND is_array($moduleMenu)) {
            foreach ($moduleMenu as $label => $moduleUrl) {
                $thisModule['items'][] = ['label' => Yii::t($module, $label), 'url' => $moduleUrl];
            }
        }

        $items[] = $thisModule;
    }
}

echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'items' => $items,
]);