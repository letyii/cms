<?php

use yii\helpers\Html;
use app\components\ActiveForm;
use kartik\widgets\SwitchInput;
use app\components\FieldRange;
use kartik\widgets\FileInput;

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

echo Html::hiddenInput('save_type', 'save');

echo $form->field($model, 'title')->textInput(['maxlength' => 255]);

echo $form->field($model, 'content')->widget(letyii\tinymce\Tinymce::className(), [
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

echo FieldRange::widget([
    'form' => $form,
    'model' => $model,
    'useAddons' => false,
    'label' => 'Time range',
    'attribute1' => 'from_time',
    'attribute2' => 'to_time',
    'type' => FieldRange::INPUT_DATETIME,
]);

//echo $form->field($model, 'from_time')->widget(DateTimePicker::className([
//    'type' => DateTimePicker::TYPE_INPUT,
//    'pluginOptions' => [
//        'autoclose'=>true,
//        'format' => 'dd-mm-yyyy hh:ii'
//    ]
//]));

echo $form->field($model, 'promotion')->widget(SwitchInput::className([
    'type' => SwitchInput::RADIO,
]));

echo $form->field($model, 'status')->widget(SwitchInput::className([
    'type' => SwitchInput::RADIO,
]));

echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'uploads/*'],
    'pluginOptions' => [
        'previewFileType' => 'image',
        'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        'browseClass' => 'btn btn-primary btn-block',
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'browseLabel' =>  'Select Photo'
    ],
]);

echo $form->field($model, 'author')->textInput(['maxlength' => 255]);

echo $form->field($model, 'source')->textInput(['maxlength' => 255]);

echo $form->field($model, 'seo_url')->textInput(['maxlength' => 255]);

echo $form->field($model, 'intro')->textInput(['maxlength' => 500]);

echo $form->field($model, 'tags')->textInput(['maxlength' => 500]);

echo $form->field($model, 'seo_title')->textInput(['maxlength' => 70]);

echo $form->field($model, 'seo_desc')->textInput(['maxlength' => 160]);

ActiveForm::end();

