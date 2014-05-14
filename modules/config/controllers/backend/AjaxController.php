<?php

/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\modules\config\controllers\backend;

use Yii;
use app\modules\config\models\LetConfig;
use app\components\BackendController;
use yii\helpers\ArrayHelper;

class AjaxController extends BackendController {

    public function actionIndex() {
        
    }

    public function actionFilter() {

        try {
            $module = ArrayHelper::getValue($_POST, 'module', '');
            $keyword = ArrayHelper::getValue($_POST, 'keyword', '');
            $data = LetConfig::filter($module, $keyword);
            $result = [];
            foreach ($data as $config) {
                $config = explode('.', $config->name);
                if (isset($config[1]))
                    $result[] = $config[1];
                else
                    $result[] = $config[0];
            }
            var_dump($result);
        } catch (ErrorException $e) {
            echo 0;
        }
    }

    public function actionKeylist() {
        try {
            $data = LetConfig::filter();
            $result = [];
            foreach ($data as $config) {
                $config = explode('.', $config->name);
                if (isset($config[1]))
                    $result[] = $config[1];
                else
                    $result[] = $config[0];
            }
            var_dump($result);
        } catch (ErrorException $e) {
            echo 0;
        }
    }
}
