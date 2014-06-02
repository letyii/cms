<?php

namespace app\modules\cms\controllers\backend;

use Yii;
use app\components\BackendController;
use yii\helpers\Json;

class DefaultController extends BackendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
