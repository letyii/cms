<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\modules\member\models\LetUser;

$this->title = 'Quản lý vai trò cho "' . LetUser::findOne($user_id)->getAttribute('username') . '"';
$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Member'), 'url' => ['backend/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="margin-bottom">
    <div class="btn-group pull-right">
        <?php
        echo Html::a('Quay lại', ['backend/default/index'], [
            'class' => 'btn btn-default',
            'onclick' => '$("#permissionForm").slideToggle()',
        ]);
        echo Html::button(Yii::t('yii', 'Save'), [
            'class' => 'btn btn-success',
            'onclick' => '$("#formDefault").submit();',
        ]);
        ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php echo Html::beginForm('', 'POST', ['id' => 'formDefault', 'role' => 'form', 'class' => 'form-horizontal']); ?>
<div class="panel panel-default" id="">
    <div class="panel-heading"><?php echo $this->title; ?></div>
    <div class="panel-body">
        <?php
        echo Html::checkboxList('role', $checked, $itemsRole, [
            'id' => 'assignedRole',
            'class' => '',
        ]);
        ?>
    </div>
</div>
<?php echo Html::endForm(); ?>



