<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container">
    <div class="page-content page-posts">
        <div class="page-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li><a href="<?php echo Url::toRoute('backend/rbac/index'); ?>">Cây quan hệ vai trò</a></li>
                <li><a href="<?php echo Url::toRoute('backend/rbac/role'); ?>">Vai trò</a></li>
                <li class="active"><a href="<?php echo Url::toRoute('backend/rbac/permission'); ?>">Phân quyền</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Posts tab -->
                <div class="tab-pane fade active in" id="posts">
                    <div class="widget">
                        <div class="widget-head">
                            <h5 class="pull-left"><i class="fa fa-camera"></i> Phân quyền</h5>	
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
