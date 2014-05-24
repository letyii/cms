<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\modules\member\controllers\backend;

use Yii;
use app\modules\member\models\LetAuthItem;
use app\components\BackendController;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class AjaxController extends BackendController {

    /**
     * Create a role
     */
    public function actionCreateitem() {
        $type = Yii::$app->request->post('type');
        $name = strtolower(Yii::$app->request->post('name'));
        $description = Yii::$app->request->post('description');
        $action = array(
            'status' => 0,
            'message' => ''
        );

        $model = new LetAuthItem;
        if ($type == 1) {
            $model->type = LetAuthItem::TYPE_ROLE;
        } elseif ($type == 2) {
            $model->type = LetAuthItem::TYPE_PERMISSION;
        }
        $model->description = $description;
        $model->name = $name;
        if ($model->save()) {
            $action['status'] = 1;
        } else {
            $action['message'] = $model->errors;
        }

        echo Json::encode($action);
    }

    /**
     * Update a role
     */
    public function actionUpdateitem() {
        $action = array(
            'status' => 0,
            'message' => ''
        );
        
        $model = LetAuthItem::find()->where('name = :id', [':id' => ArrayHelper::getValue($_POST, 'id', '')])->one();
        $model->name = strtolower(ArrayHelper::getValue($_POST, 'name', ''));
        
        if ($model === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        if ($model->save()) {
            $action['status'] = 1;
        } else {
            $action['message'] = $model->errors;
        }

        echo Json::encode($action);
    }

    /**
     * Delete a role
     */
    public function actionDeleteitem() {
        $id = Yii::$app->request->post('id');
        $model = LetAuthItem::find()->where('name = :id', [':id' => $id])->one();
        if ($model === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        echo ($model->delete()) ? 1 : 0;
    }
}
