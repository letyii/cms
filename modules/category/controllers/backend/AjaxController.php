<?php

namespace app\modules\category\controllers\backend;

use Yii;
use app\modules\category\models\letCategory;
//use app\modules\category\models\base\letCategorySearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for letCategory model.
 */
class AjaxController extends Controller {

    /**
     * Lists all letCategory models.
     * @return mixed
     */
    public function actionIndex() {
        
    }

    public function actionUpdatelist() {
        try {
            // Nhận mảng biến đầu vào
            $data = json_decode(ArrayHelper::getValue($_POST, 'data'), true);
            
            // Xử lý từng hành động của mảng biến
            if (!empty($data)) { // Kiem tra su ton tai cua data
                foreach ($data as $action) {
                    $model = letCategory::findOne($action['itemId']);
                    if ($model === null)
                        continue;

                    if (!empty($action['beforeId'])) { // Truong hop doi tuong dung sau 1 doi tuong 'beforeId'
                        $model->moveAfter(letCategory::findOne($action['beforeId']));
                    } elseif (!empty($action['afterId'])) { // Truong hop doi tuong dung truoc 1 doi tuong 'afterId'
                        $model->moveBefore(letCategory::findOne($action['afterId']));
                    } elseif (!empty($action['parentId'])) { // Truong hop doi tuong nam trong 1 doi tuong 'parentId'
                        $model->moveAsFirst(letCategory::findOne($action['parentId']));
                    }
                }
            }
            echo 1;
        } catch (ErrorException $e) {
            echo 0;
        }
    }

    public function actionCreate() {
        try {
            $parent_id = (int) ArrayHelper::getValue($_POST, 'parent_id', 0);
            $module = ArrayHelper::getValue($_POST, 'module', null);
            $title = ArrayHelper::getValue($_POST, 'title', '');
            
            if (!empty($module)) {
                $modelParent = letCategory::findOne($parent_id);
                $model = new letCategory;
                $model->title = $title;
                $model->appendTo($modelParent);
                echo $model->id;
            } else
                echo 0;
        } catch (ErrorException $e) {
            echo 0;
        }

    }

    public function actionDelete() {
        try {
            $id = (int) ArrayHelper::getValue($_POST, 'id', 0);
            $model = letCategory::findOne($id);
            if ($model->deleteNode())
                echo 1;
            else
                echo 0;
        } catch (ErrorException $e) {
            echo 0;
        }

    }

}
