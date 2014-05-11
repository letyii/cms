<?php

namespace app\modules\category\controllers\backend;

use Yii;
use app\modules\category\models\letCategory;
use app\modules\category\models\base\letCategorySearch;
use app\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DefaultController implements the CRUD actions for letCategory model.
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
     * Lists all letCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data = letCategory::find()->addOrderBy('lft')->all();

//        $searchModel = new letCategorySearch;
//        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'data' => $data,
        ]);
    }

    /**
     * Displays a single letCategory model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new letCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request->post();
        $module = ArrayHelper::getValue($_GET, 'module');
        $assign['categorys'] = letCategory::getCategory($module, '-- ');
        $assign['position'] = array(
            'children' => 'Là thư mục con',
            'before' => 'Đứng trước',
            'after' => 'Đứng sau',
        );
        
        $model = new letCategory;
        if ($model->load($request)) {
            letCategory::saveItem($request);
        }
        
        $assign['model'] = $model;
        return $this->render('create', $assign);
        
        
//        $model = new letCategory;
//        if ($model->load($request)) {
//            $root = letCategory::find()
//                ->where(['module' => $module])
//                ->one();
//            if ($root === null) {
//                $root = new letCategory;
//                $root->title = $module;
//                $root->module = $module;
//                $root->saveNode();
//            }
//            
//            if ($model->appendTo($root)) {
////                return $this->redirect(['view', 'id' => $model->id]);
//                return $this->redirect(['index']);
//            }
//
//        } else {
//            $assign['model'] = $model;
//            return $this->render('create', $assign);
//        }
    }

    /**
     * Updates an existing letCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing letCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the letCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return letCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = letCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
