<?php

namespace app\modules\member\controllers\backend;

use app\components\BackendController;

class DefaultController extends BackendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
