<?php

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
        $assign['type'] = ArrayHelper::getValue($_GET, 'type');
        if (empty($assign['type']))
            return FALSE;
        
        $assign['model'] = new ConfigForm;
        if ($assign['model']->load(Yii::$app->request->post())) {
            echo 'ok';
        } else {            
            echo 'not ok';
        }
        
        return $this->render('create', $assign);
    }
    
}