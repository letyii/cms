<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="let-article-base-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'intro') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'from_time') ?>

    <?php // echo $form->field($model, 'to_time') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <?php // echo $form->field($model, 'seo_url') ?>

    <?php // echo $form->field($model, 'seo_desc') ?>

    <?php // echo $form->field($model, 'creator') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'updated_time') ?>

    <?php // echo $form->field($model, 'promotion') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t(Yii::$app->controller->module->id, 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t(Yii::$app->controller->module->id, 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
