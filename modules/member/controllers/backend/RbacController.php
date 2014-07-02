<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\modules\member\controllers\backend;

use Yii;
use app\components\BackendController;
use app\modules\member\models\LetUser;
use app\modules\member\models\LetAuthItemChild;
use app\modules\member\models\LetAuthItem;
use app\modules\member\models\search\LetAuthItemSearch;
use yii\helpers\ArrayHelper;

class RbacController extends BackendController
{

    public function actionIndex()
    {
        $auth = Yii::$app->authManager;
        $tree = $auth->buildTreeRole();
        $treeHtml = '';
        $auth->createTreeHtml($tree, $treeHtml, ['class' => 'ui-sortable']);
        $assign['treeHtml'] = $treeHtml;
        return $this->render('index', $assign);
    }

    public function actionItem()
    {
        $searchModel = new LetAuthItemSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('item', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    public function actionUpdatechild()
    {
        $item = Yii::$app->request->get('item');
        if (empty($item))
            return $this->redirect(['backend/rbac/item']);

        if (Yii::$app->request->post()) {
            // Delete all child of $item
            LetAuthItemChild::deleteChild($item);

            $auth = Yii::$app->authManager;
            $itemObject = $auth->getRole($item);
            $roles = Yii::$app->request->post('role');
            $permissions = Yii::$app->request->post('permission');

            if (!empty($roles)) {
                foreach ($roles as $role) {
                    $roleObject = $auth->getRole($role);
                    $auth->addChild($itemObject, $roleObject);
                }
            }

            if (!empty($permissions)) {
                foreach ($permissions as $permission) {
                    $permissionObject = $auth->getPermission($permission);
                    $auth->addChild($itemObject, $permissionObject);
                }
            }
        }

        // Get items enable and child list
        $assign['itemsRole'] = ArrayHelper::map(LetAuthItem::assignEnable($item, LetAuthItem::TYPE_ROLE), 'name', 'name');
        $assign['itemsPermission']= ArrayHelper::map(LetAuthItem::assignEnable($item, LetAuthItem::TYPE_PERMISSION), 'name', 'name');
        $assign['child'] = LetAuthItemChild::getChild($item);

        return $this->render('updatechild', $assign);
    }

    public function actionReset()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $backendLogin = $auth->createPermission('member:backendLogin');
        $backendLogin->description = 'Login Backend';
        $auth->add($backendLogin);

        $god = $auth->createRole('god');
        $auth->add($god);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $backendLogin);
        $auth->addChild($god, $admin);

        $member = $auth->createRole('member');
        $auth->add($member);
        $auth->addChild($admin, $member);
        $auth->addChild($member, $backendLogin);

//        $user2 = $auth->createRole('user2');
//        $auth->add($user2);
//        $auth->addChild($admin, $user2);
//
//        $user11 = $auth->createRole('user11');
//        $auth->add($user11);
//        $auth->addChild($user, $user11);
//
//        $user12 = $auth->createRole('user12');
//        $auth->add($user12);
//        $auth->addChild($user, $user12);
//
//        $auth->addChild($user2, $user12);

        $auth->assign($god, 1);
    }

    /**
     * Assign roles to id.
     * @param string
     * @return mixed
     */
    public function actionAssign()
    {
        $auth = Yii::$app->authManager;
        $user_id = Yii::$app->request->get('user_id');
        if (empty($user_id))
            return $this->redirect(['backend/default/index']);

        if (Yii::$app->request->post()) {
            //delete all roles of id
            $auth->revokeAll($user_id);

            $roles = Yii::$app->request->post('role');
            foreach ($roles as $role) {
                $adminRole = $auth->getRole($role);
                $auth->assign($adminRole, $user_id);
            }
        }

        $assign['itemsRole'] = ArrayHelper::map(LetAuthItem::getItems(LetAuthItem::TYPE_ROLE),'name','name');
        $assign['checked'] = ArrayHelper::map($auth->getRolesByUser($user_id),'name','name');
        $assign['user_id'] = $user_id;

        return $this->render('assign', $assign);
    }
}
