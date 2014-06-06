<?php

namespace app\modules\cms\controllers\frontend;

use Yii;
use yii\web\Controller;

class ErrorController extends Controller
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
