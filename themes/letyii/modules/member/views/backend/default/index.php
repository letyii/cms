<?php
use yii\helpers\Html;
?>

<div class="margin-bottom">
<!--    <div class="btn-group pull-left" data-toggle="buttons">
        <button class="btn btn-success" onclick="updateList('<?php echo yii\helpers\Url::toRoute(['backend/ajax/updatelist']); ?>');">
            Lưu thay đổi
        </button>
    </div>-->
    <div class="btn-group pull-right">
        <?php echo Html::a('Nhóm vai trò và phân quyền', ['backend/rbac/index'], [
            'class' => 'btn btn-success',
        ]); ?>
    </div>
    <div class="clearfix"></div>
</div>
