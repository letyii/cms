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
}
