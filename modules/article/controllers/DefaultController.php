<?php

namespace app\modules\article\controllers;

use app\components\BackendController;

class DefaultController extends BackendController
{
    public function actionIndex()
    {
        echo 111;
        return $this->render('index');
    }
}
