<?php

use yii\helpers\Html;
use app\components\ActiveForm;
use app\components\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\modules\article\models\base\LetArticleBase $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<?php

$form = ActiveForm::begin([
            'id' => 'formDefault',
            'layout' => 'horizontal',
        ]);
?>

<?php echo $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

<?php echo $form->field($model, 'content')->widget(letyii\tinymce\Tinymce::className(), [
    'options' => [
        'id' => 'testid',
        'class' => 'abc',
    ],
    'configs' => [
        'selector' => 'textarea#testid',
        'link_list' => [
            [
                'title' => 'My page 1',
                'value' => 'http://www.tinymce.com',
            ],
            [
                'title' => 'My page 2',
                'value' => 'http://www.tinymce.com',
            ],
        ],
    ],
]);
?>

<?php
echo $form->field($model, 'from_time')->widget(DatePicker::className([
    'clientOptions' => [
        'dateFormat' => 'yy-mm-dd',
    ],
    'options' => ['class' => 'form-control'],
]));
?>
<?php echo $form->field($model, 'from_time')->textInput() ?>

<?php echo $form->field($model, 'to_time')->textInput() ?>

<?php echo $form->field($model, 'creator')->textInput(['maxlength' => 11]) ?>

<?php echo $form->field($model, 'created_time')->textInput() ?>

<?php echo $form->field($model, 'editor')->textInput(['maxlength' => 11]) ?>

<?php echo $form->field($model, 'updated_time')->textInput() ?>

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

<?php ActiveForm::end(); ?>

