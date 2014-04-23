<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\category\models\letCategory $model
 */

$this->title = 'Update Let Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Let Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="let-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
