<?php
use yii\helpers\Html;
use yii\helpers\Url;

\yii\jui\SortableAsset::register($this);
$this->registerCssFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/css/tree.css');
//$this->registerJsFile(\yii\helpers\Url::base() . '/assetbundle/nestedset/js/jquery.mjs.nestedSortable.js', [\yii\web\JqueryAsset::className()]);
//$this->registerJsFile(\yii\helpers\Url::base() . '/modules/member/assets/js/member.js', [\yii\web\JqueryAsset::className()]);
?>

<div class="container">
    <div class="page-content page-posts">
        <div class="page-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="<?php echo Url::toRoute('backend/rbac/index'); ?>">Cây quan hệ vai trò</a></li>
                <li><a href="<?php echo Url::toRoute('backend/rbac/role'); ?>">Vai trò</a></li>
                <li><a href="<?php echo Url::toRoute('backend/rbac/permission'); ?>">Phân quyền</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Posts tab -->
                <div class="tab-pane fade active in" id="posts">
                    <div class="widget">
                        <div class="widget-head">
                            <h5 class="pull-left"><i class="fa fa-camera"></i> Cây quan hệ vai trò</h5>	
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body">
                            <div class="tree">
                                <?php echo $treeHtml; ?>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Make post tab -->
                <div class="tab-pane fade" id="makepost">

                    <h4>Make Post</h4>
                    <div class="row">

                        <div class="col-md-7">
                            <!-- Make post Widget -->
                            <div class="widget">

                                <!-- Widget head -->
                                <div class="widget-head">
                                    <h5><i class="fa fa-desktop"></i> Make Post</h5>	
                                </div>

                                <!-- Widget body -->
                                <div class="widget-body">
                                    <!-- Post title area -->
                                    <label>Enter Title</label>
                                    <input type="text" class="form-control col-lg-8" placeholder="Enter Title">
                                    <div class="clearfix"></div>
                                    <!-- Post content area -->
                                    <label>Enter Content</label>
                                    <textarea class="form-control" rows="8" name="input"></textarea>	
                                    <div class="clearfix"></div>												
                                </div>

                                <!-- Widget foot -->
                                <div class="widget-foot">
                                    <div class="pull-left">Word Count : 253</div>
                                    <div class="pull-right">
                                        <!-- Buttons -->
                                        <button class="btn btn-default btn-xs">Save Draft</button> 
                                        <button class="btn btn-info btn-xs">Publish</button>
                                        <button class="btn btn-danger btn-xs">Trash</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-5">
                            <!-- Make post Widget -->
                            <div class="widget">

                                <!-- Widget head -->
                                <div class="widget-head">
                                    <h5>Post Details</h5>	
                                </div>

                                <!-- Widget body -->
                                <div class="widget-body">
                                    <strong>Category</strong>
                                    <div class="check-box">
                                        <label><input type='checkbox' value='check1' /> General</label>
                                    </div>
                                    <div class="check-box">
                                        <label><input type='checkbox' value='check2' /> Latest News</label>
                                    </div>
                                    <div class="check-box">
                                        <label><input type='checkbox' value='check3' /> Health</label>
                                    </div>

                                    <hr />
                                    <strong>Tags</strong>
                                    <input class="col-lg-12 form-control" type="text" placeholder="Tags"><br />
                                    <div class="clearfix"></div>
                                </div>

                                <!-- Widget foot -->
                                <div class="widget-foot">

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
