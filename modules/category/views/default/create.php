<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\category\models\letCategory $model
 */

$this->title = 'Create Let Category';
$this->params['breadcrumbs'][] = ['label' => 'Let Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="let-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
