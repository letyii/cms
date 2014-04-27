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
class AjaxController extends Controller
{

    /**
     * Lists all letCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
    }
    
    public function actionUpdatelist()
    {
        // Nhận mảng biến đầu vào
        $data = json_decode(ArrayHelper::getValue($_POST, 'data'), true); // *

//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
//        exit();
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
    }
    
    public function actionDelete() {
        $id = (int) ArrayHelper::getValue($_POST, 'id', 0); // *
        $model = letCategory::findOne($id);
        $model->deleteNode();
    }

}
