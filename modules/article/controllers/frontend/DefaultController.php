<?php

namespace app\modules\article\controllers\frontend;

use app\components\BackendController;

class DefaultController extends BackendController
{
    public function actionIndex()
    {
//    	$this->layout = '/article';
        return $this->render('index');
    }
}
