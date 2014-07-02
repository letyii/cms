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

class BackendController extends Controller
{

    public function beforeAction($action)
    {
        // Check access
        if (!Yii::$app->user->can('member:backendLogin') AND !($action->controller->module->id == 'member' AND $action->controller->id == 'backend/auth' AND $action->id == 'login')) {
            Yii::$app->user->setReturnUrl(Yii::$app->request->getUrl());
            return $this->redirect(['/member/backend/auth/login']);
        }

        return parent::beforeAction($action);
    }

    public function actionSetuprbac()
    {
        $permissions = [
            $this->module->id . ':view',
            $this->module->id . ':create',
            $this->module->id . ':update',
            $this->module->id . ':updateOwn',
            $this->module->id . ':delete',
            $this->module->id . ':deleteOwn',
        ];
        \app\modules\member\models\LetAuthItem::deleteAll(['in', 'name', $permissions]);
        \app\modules\member\models\LetAuthItemChild::deleteAll(['in', 'child', $permissions]);

        $auth = Yii::$app->authManager;

        // Rule
        $rule = $auth->getRule('isAuthor');
        if (empty($rule)) {
            $rule = new \app\rbac\AuthorRule;
            $auth->add($rule);
        }

        // Permission
        $admin = $auth->getRole('admin');
        $member= $auth->getRole('member');
        foreach ($permissions as $permission) {
            $create = $auth->createPermission($permission);
            if ($permission == $this->module->id . ':create') {
                $auth->add($create);
                $auth->addChild($member, $create);
            } elseif ($permission == $this->module->id . ':updateOwn' OR $permission == $this->module->id . ':deleteOwn') {
                $create->ruleName = $rule->name;
                $auth->add($create);
                $auth->addChild($member, $create);
            } else {
                $auth->add($create);
            }
            $auth->addChild($admin, $create);
            unset($create);
        }
        $updateOwn = $auth->getPermission($this->module->id . ':updateOwn');
        $update = $auth->getPermission($this->module->id . ':update');
        $auth->addChild($updateOwn, $update);
    }
}
