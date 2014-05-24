<?php

namespace app\modules\member\controllers\backend;

use Yii;
use app\components\BackendController;

class DefaultController extends BackendController
{
    public function actionIndex() {
        $auth = Yii::$app->authManager;
        $auth->clearAll();
        
        $backendLogin = $auth->createPermission('member.backendLogin');
        $backendLogin->description = 'Login Backend';
        $auth->add($backendLogin);
        
        $god = $auth->createRole('god');
        $auth->add($god);
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $backendLogin);
        $auth->addChild($god, $admin);
        
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($admin, $user);
        
        $user2 = $auth->createRole('user2');
        $auth->add($user2);
        $auth->addChild($admin, $user2);
        
        $user11 = $auth->createRole('user11');
        $auth->add($user11);
        $auth->addChild($user, $user11);
        
        $user12 = $auth->createRole('user12');
        $auth->add($user12);
        $auth->addChild($user, $user12);
        
        $auth->addChild($user2, $user12);
        
        $auth->assign($god, 1);
        
        return $this->render('index');
    }
    
    public function actionTest() {
        $items = ['user12'];
        $list = \app\modules\member\models\LetAuthItemChild::getAncestors($items);
        var_dump($list);
    }
}
