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

<?php echo $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
<?php echo $form->field($model, 'password')->passwordInput(['maxlength' => 100]) ?>
<?php echo $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>
<?php /*echo $form->field($model, 'content')->widget(letyii\tinymce\Tinymce::className(), [
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
*/?>


<?php ActiveForm::end(); ?>

