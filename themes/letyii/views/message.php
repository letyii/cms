<?php
if (!empty($messages)) {
    $this->title = Yii::t('yii', 'Error');
    $this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, ucfirst(Yii::$app->controller->module->id)), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['messages'] = $messages;
}
