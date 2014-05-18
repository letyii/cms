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
        $module = Yii::$app->request->get('module', '');
        $keyword = Yii::$app->request->get('keyword', '');
        $configs = LetConfig::filter($module, $keyword);

        if ($dataPost = Yii::$app->request->post('config')) {
            LetConfig::saveAll($configs, $dataPost);
            $configs = LetConfig::filter($module, $keyword);
        }
        
        $modules = ['' => 'Lọc theo module'];
        foreach (LetConfig::getModuleList(TRUE) as $module) {
            $modules[$module] = $module;
        }
        
        return $this->render('index', [
            'modules' => $modules,
            'configs' => $configs,
        ]);
    }
    
    public function actionCreate() {
        $type = Yii::$app->request->get('type');
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
                $value = [];
                foreach ($model->value as $valueOption) {
                    if (!empty($valueOption)) {
                        $value[$valueOption] = FALSE;
                    }
                }
                $model->value = json_encode($value);
            }
            $model->save();
        }
        
        return $this->render('create', [
            'model' => $model,
            'modules' => $modules,
        ]);
    }

    public function actionUpdate() {
        $name = Yii::$app->request->get('name');
        if (empty($name))
            return FALSE;

        $module = Yii::$app->request->get('module', '');
//        $keyword = Yii::$app->request->get('keyword', '');
        $configs = LetConfig::get($name, "");
//        die;
        // Convert module array
        $ignoreModule = ['gii', 'config', 'debug'];
        foreach (array_keys(Yii::$app->modules) as $module) {
            if (!in_array($module, $ignoreModule))
                $modules[$module] = $module;
        }

        $model = ConfigForm::findOne($name);
        if ($model->load(Yii::$app->request->post())) {
            $model->name = $model->module . '.' . $model->key;
            $model->type = $type;
            $model->save();
        }

        return $this->render('update', [
            'model' => $model,
            'modules' => $modules,
        ]);
    }
}