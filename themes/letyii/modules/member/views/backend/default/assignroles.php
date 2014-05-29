<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

//$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Member'), 'url' => ['backend/default/index']];
//$this->params['breadcrumbs'][] = ['label' => Yii::t(Yii::$app->controller->module->id, 'Role and Permission'), 'url' => ['backend/rbac/item']];
//$this->params['breadcrumbs'][] = 'Gán quyền cho "' . Yii::$app->request->get('item') . '"';
?>

<div class="panel panel-default" style="border-top: 0;">
    <div class="panel-body">
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
            <div class="panel-heading">Thiết lập vai trò</div>
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

    </div>
</div>



