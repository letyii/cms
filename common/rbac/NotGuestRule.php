<?php

namespace app\rbac;

use yii\rbac\Rule;
use Yii;

class NotGuestRule extends Rule {

    public $name = 'notGuestRule';

    public function execute($params, $data) {
        return !Yii::$app->user->isGuest;
    }

}