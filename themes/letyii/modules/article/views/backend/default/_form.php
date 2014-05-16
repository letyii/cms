<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleBase $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="let-article-base-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'from_time')->textInput() ?>

    <?= $form->field($model, 'to_time')->textInput() ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'updated_time')->textInput() ?>

    <?= $form->field($model, 'creator')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'editor')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'promotion')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 70]) ?>

    <?= $form->field($model, 'seo_desc')->textInput(['maxlength' => 160]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('article', 'Create') : Yii::t('article', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
