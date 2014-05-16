<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleBase $model
 */

$this->title = Yii::t('article', 'Create {modelClass}', [
  'modelClass' => 'Let Article Base',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Let Article Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="let-article-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
