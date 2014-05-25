<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<?php echo Html::beginForm('', 'POST', ['id' => 'formDefault', 'role' => 'form', 'class' => 'form-horizontal']); ?>
<div class="panel panel-default" id="">
    <div class="panel-heading">Thiết lập vai trò</div>
    <div class="panel-body">
        <?php
        echo Html::checkboxList('assignedRole', '', $itemsRole, [
            'id' => 'assignedRole',
            'class' => '',
        ]);
        ?>
    </div>
</div>

<div class="panel panel-default" id="">
    <div class="panel-heading">Thiết lập phân quyền</div>
    <div class="panel-body">
        <?php
        echo Html::checkboxList('assignedPermission', '', $itemsPermission, [
            'id' => 'assignedPermission',
            'class' => '',
        ]);
        ?>
    </div>
</div>
<?php echo Html::button('Lưu thiếp lập', [
    'class' => 'btn btn-success',
    'onclick' => '$("#formDefault").submit();',
]); ?>
<?php echo Html::endForm(); ?>