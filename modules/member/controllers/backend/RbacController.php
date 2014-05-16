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
    
    public function actionRole()
    {
        $searchModel = new LetAuthItemSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('role', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
    public function actionPermission()
    {
        return $this->render('permission');
    }    
}
