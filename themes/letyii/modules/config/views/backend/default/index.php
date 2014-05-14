<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\config\models\LetConfig;
$this->registerCssFile(\yii\helpers\Url::base() . '/modules/config/assets/css/config.css');
$this->registerCssFile(\yii\helpers\Url::base() . '/modules/config/assets/js/config.js');
?>
<div style="height: 20px"></div>
<div class="container">
     <div class="btn-group pull-left" data-toggle="buttons">
                <button class="btn btn-success" onclick="updateList('<?php echo yii\helpers\Url::toRoute(['backend/ajax/updatelist']); ?>');">
                    Lưu thay đổi
                </button >
            </div>
            <!-- Single button -->
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    Tạo config <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'text']);?>">Text</a></li>
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'dropdown']);?>">Dropdown</a></li>
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'checkbox']);?>">Checkbox</a></li>
                    <li><a href="<?php echo Url::toRoute(['backend/default/create', 'type' => 'textarea']);?>">Textarea</a></li>
                </ul>
            </div>
    <div class="clearfix"></div>
    <div class="page-content page-form">
        <div class="widget">
            <div class="widget-head">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td><h4>Cấu hình hệ thống</h4></td>
                            <td>
                                <?php
                                $data = LetConfig::filter();
                                $data = LetConfig::asDataAutocomplete($data, 'name');
                                echo \yii\jui\AutoComplete::widget([
                                    'name' => 'demo',
                                    'clientOptions' => [
                                        'source' => $data,
                                    ],
                                    'options' => [
                                        'class' => 'form-control',
                                        'size' => 6,
                                        'onchange' => 'getListKey("' . yii\helpers\Url::toRoute(['backend/ajax/filter']) . '");',
                                        'placeholder' => 'Tìm kiếm theo key',
                                    ],
                                ]);
                                ?>
                            </td>
                            <div id="suggestions"></div>
                            <td align="right" style="width: 16%; padding-left: 12px;">
                                

                                
                                <select class="form-control">
                                    <option value="">Chọn Module</option>
                                    <?php foreach ($module as $key => $value): ?>
                                    <option value="<?php echo Html::encode($value['module']);?>"><?php echo Html::encode($value['module']);?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Max Level</label>
                        <div class="col-lg-10">
                            <input type="text" name="config_max_level" id="config_max_level" class="form-control">
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Min Level</label>
                        <div class="col-lg-10">
                            <input type="text" name="config_min_level" id="config_min_level" class="form-control">
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Login Expire</label>
                        <div class="col-lg-10">
                            <input type="text" name="" class="form-control">
                        </div>
                    </div> 
                    
                </form>
            </div>
        </div>
    </div>
</div>