<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\modules\category\controllers\backend;

use Yii;
use app\modules\category\models\LetCategory;
use app\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DefaultController implements the CRUD actions for LetCategory model.
 */
class DefaultController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all LetCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $module = Yii::$app->request->get('module');
        if (empty($module))
            throw new NotFoundHttpException('The requested page does not exist.');
        $categories = LetCategory::find()
                ->where(['module' => $module])
                ->addOrderBy('lft')->all();
        return $this->render('index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Finds the LetCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LetCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LetCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
