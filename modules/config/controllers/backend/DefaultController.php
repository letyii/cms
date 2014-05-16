<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>, Trinh Ke Thanh <trinh.kethanh@gmail.com>
 */

namespace app\modules\config\controllers\backend;

use Yii;
use app\components\BackendController;
use app\modules\config\models\LetConfig;
use app\modules\config\models\ConfigForm;
use yii\helpers\ArrayHelper;


class DefaultController extends BackendController
{
    public function actionIndex()
    {
        $config = LetConfig::getListFromDb();
        foreach($config as $key => $value) {
            $key_spit = explode('.', $key);
            if(is_string($value['value']) and !isset($_REQUEST['config_'.$key_spit[1]])) {
                $_REQUEST['config_'.$key_spit[1]] = $value['value'];
            }
        }
        $module = LetConfig::getModuleList();
        return $this->render('index', array('module' => $module));
    }
    
    public function actionCreate() {
        $type = ArrayHelper::getValue($_GET, 'type');
        if (empty($type))
            return FALSE;
        
        // Convert module array
        $ignoreModule = ['gii', 'config', 'debug'];
        foreach (array_keys(Yii::$app->modules) as $module) {
            if (!in_array($module, $ignoreModule))
                $modules[$module] = $module;
        }
        
        $model = new ConfigForm;
        if ($model->load(Yii::$app->request->post())) {
            $model->name = $model->module . '.' . $model->key;
            $model->type = $type;
            if ($type == 'dropdown' OR $type == 'checkbox') {
                foreach ($model->value as $valueOption) {
                    $value[$valueOption] = FALSE;
                }
                $model->value = json_encode($value);
            }
            $model->save();
        }
        
        return $this->render('create', [
            'type' => $type,
            'model' => $model,
            'modules' => $modules,
        ]);
    }
    
}