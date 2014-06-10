<?php

namespace app\modules\cms\controllers\frontend;

use Yii;
use app\components\FrontendController;
use app\modules\member\models\LoginForm;

class DefaultController extends FrontendController
{
    public function actionIndex()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) AND $model->login()) {
            return $this->goBack();
        } else {
            //$this->layout = '/index';
            return $this->render('index', [
                'model' => $model, // $model ko nhan gia tri moi, ma luon lay gia tri mac dinh. Dang tim hieu them.
            ]);
        }
    }
}
