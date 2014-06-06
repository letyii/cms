<?php

namespace app\modules\article\controllers\backend;

use Yii;
use app\modules\article\models\LetArticle;
use app\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * Lists all models.
     * @return mixed
     */
    public function actionIndex()
    {
        $queryParams = Yii::$app->request->getQueryParams();
        if (!Yii::$app->user->can('article.view'))
            $queryParams['LetArticle']['creator'] = Yii::$app->user->id;
        $searchModel = new LetArticle;
        $searchModel->scenario = 'search';
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can('article.create'))
            return $this->render('//message', ['messages' => ['danger' => Yii::t('yii', 'You are not allowed to perform this action.')]]);

        $model = new LetArticle;

        if ($model->load(Yii::$app->request->post()) AND $model->save()) {
            if (Yii::$app->request->post('save_type') == 'apply')
                return $this->redirect(['update', 'id' => $model->id]);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (!Yii::$app->user->can('article.update', ['post' => $model]))
            return $this->render('//message', ['messages' => ['danger' => Yii::t('yii', 'You are not allowed to perform this action.')]]);

        if ($model->load(Yii::$app->request->post()) AND $model->save()) {
            if (Yii::$app->request->post('save_type') == 'apply')
                return $this->redirect(['update', 'id' => $model->id]);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can('article.delete'))
            return $this->render('//message', ['messages' => ['danger' => Yii::t('yii', 'You are not allowed to perform this action.')]]);

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LetArticle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
