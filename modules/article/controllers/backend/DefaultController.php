<?php

namespace app\modules\article\controllers;

use app\components\BackendController;

class DefaultController extends BackendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
