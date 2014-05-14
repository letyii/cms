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
    
    public function actionRole()
    {
        return $this->render('role');
    }
    
    public function actionPermission()
    {
        return $this->render('permission');
    }
}
