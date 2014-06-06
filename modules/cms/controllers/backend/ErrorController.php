<?php

namespace app\modules\cms\controllers\backend;

use Yii;
use app\components\BackendController;

class ErrorController extends BackendController
{

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
