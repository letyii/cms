<?php

namespace app\modules\article;

class Module extends \app\components\BackendModule
{
    public $moduleMenu = [
        'Manager article' => ['/article/backend/default'],
        'Create article' => ['/article/backend/default/create'],
        'Manager category' => ['/category/backend/default', 'module' => 'article'],
    ];

    public $controllerNamespace = 'app\modules\article\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
