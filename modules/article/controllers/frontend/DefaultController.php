<?php

namespace app\modules\article\controllers\frontend;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
//    	$this->layout = '/article';
        return $this->render('index');
    }
}
