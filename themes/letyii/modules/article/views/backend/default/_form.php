<?php

use yii\helpers\Html;
use app\components\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleBase $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<?php $form = ActiveForm::begin([
    'id' => 'formDefault',
    'layout' => 'horizontal',
]);
?>

<?php echo $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

<?php echo $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<?php echo $form->field($model, 'from_time')->textInput() ?>

<?php echo $form->field($model, 'to_time')->textInput() ?>

<?php echo $form->field($model, 'created_time')->textInput() ?>

<?php echo $form->field($model, 'updated_time')->textInput() ?>

<?php echo $form->field($model, 'creator')->textInput(['maxlength' => 11]) ?>

<?php echo $form->field($model, 'editor')->textInput(['maxlength' => 11]) ?>

<?php echo $form->field($model, 'promotion')->textInput() ?>

<?php echo $form->field($model, 'status')->textInput() ?>

<?php echo $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

<?php echo $form->field($model, 'author')->textInput(['maxlength' => 255]) ?>

<?php echo $form->field($model, 'source')->textInput(['maxlength' => 255]) ?>

<?php echo $form->field($model, 'seo_url')->textInput(['maxlength' => 255]) ?>

<?php echo $form->field($model, 'intro')->textInput(['maxlength' => 500]) ?>

<?php echo $form->field($model, 'tags')->textInput(['maxlength' => 500]) ?>

<?php echo $form->field($model, 'seo_title')->textInput(['maxlength' => 70]) ?>

<?php echo $form->field($model, 'seo_desc')->textInput(['maxlength' => 160]) ?>

<!--<div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('article', 'Create') : Yii::t('article', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>-->

<?php ActiveForm::end(); ?>

