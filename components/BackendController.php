<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\components;

use Yii;
use yii\web\Controller;
use yii\base\Action;
use yii\base\ActionFilter;

class BackendController extends Controller
{

    public function beforeAction($action)
    {
        // Check access
        if (!Yii::$app->user->can('member.backendLogin') AND !($action->controller->module->id == 'member' AND $action->controller->id == 'backend/auth' AND $action->id == 'login')) {
//            \yii\web\User::setReturnUrl(\Yii::$app->request->getAbsoluteUrl());
            return $this->redirect(['/member/backend/auth/login']);
        }

        return parent::beforeAction($action);
    }

}
