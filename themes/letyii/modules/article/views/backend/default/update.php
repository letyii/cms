<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleBase $model
 */

$this->title = Yii::t('article', 'Update {modelClass}: ', [
  'modelClass' => 'Let Article Base',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Let Article Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('article', 'Update');
?>
<div class="let-article-base-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
