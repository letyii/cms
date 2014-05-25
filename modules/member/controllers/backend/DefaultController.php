<?php

namespace app\modules\member\controllers\backend;

use Yii;
use app\modules\member\models\LetUser;
use app\components\BackendController;

class DefaultController extends BackendController
{
    public function actionIndex()
    {
        $searchModel = new LetUser();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new LetUser;
var_dump($model->save());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['backend/default/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}
