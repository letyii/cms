<?php

namespace app\modules\cms\controllers\backend;

use app\components\BackendController;

class TestController extends BackendController
{
    public function actionIndex()
    {
        $string = 'Cộng hòa   $##@ xã hội chủ nghĩa Việt Nam';
        echo \app\components\LetHelper::string_to_url($string);
    }
}
