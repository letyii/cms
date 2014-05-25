<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\modules\member\controllers\backend;

use app\modules\member\models\LetAuthItemChild;
use Yii;
use app\components\BackendController;
use app\modules\member\models\LetAuthItem;
use app\modules\member\models\search\LetAuthItemSearch;

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
        if (Yii::$app->request->post()) {
            $assignedRoles = Yii::$app->request->post('assignedRole');
            $assignedPermissions = Yii::$app->request->post('assignedPermission');
            $id = 'user';
            LetAuthItemChild::deleteChild($id);
            $auth = Yii::$app->authManager;
            $userId = $auth->getRole($id);
            $getChildren = $auth->getChildren($id);
            if (!empty($assignedPermissions)) {
                foreach ($assignedPermissions as $assignedPermission) {
                    if ($id != $assignedPermission) {
                        $permissionChild = $auth->getPermission($assignedPermission);
                        if (empty($getChildren[$assignedPermission]) && $permissionChild->type == 2) {
                            $auth->addChild($userId, $permissionChild);
                            echo $assignedPermission;
                        }
                    }
                }
            }
            if (!empty($assignedRoles)) {
                foreach ($assignedRoles as $assignedRole) {
                    if ($id != $assignedRole) {
                        $roleChild = $auth->getRole($assignedRole);
                        if (empty($getChildren[$assignedRole]) && $roleChild->type == 1) {
                            $auth->addChild($userId, $roleChild);
                            echo $assignedRole;
                        }
                    }
                }
            }
        } else {
            $itemId = Yii::$app->request->get('id');
            $listItems = LetAuthItem::assignEnable($itemId);

            $itemsRole = [];
            $itemsPermission = [];
            foreach($listItems as $listItem) {
                if ($listItem['type'] == 1) {
                    $itemsRole[$listItem['name']] = $listItem['name'];
                } else {
                    $itemsPermission[$listItem['name']] = $listItem['name'];
                }
            }
            return $this->render('updatechild', [
                'itemsRole' => $itemsRole,
                'itemsPermission' => $itemsPermission
            ]);
        }
    }
}
