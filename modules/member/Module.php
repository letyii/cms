<?php

namespace app\modules\member;

class Module extends \app\components\BackendModule
{
    public $controllerNamespace = 'app\modules\member\controllers';

    public $moduleMenu = [
        'Member' => ['/member/backend/default'],
        'Role tree' => ['/member/backend/rbac/index'],
        'Role and Permission' => ['/member/backend/rbac/item'],
    ];

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
