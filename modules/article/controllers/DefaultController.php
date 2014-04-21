<?php

namespace app\modules\article\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        echo 111;
        return $this->render('index');
    }
}
