<?php

namespace app\modules\cms\controllers\backend;

use Yii;
use \app\components\BackendController;

class CrudController extends BackendController
{
    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');
        $table = Yii::$app->request->post('table');
        $sql = "DELETE FROM ".$table." WHERE id = '".$id."'";
        Yii::$app->db->createCommand($sql)->query();
        echo 1;
    }
}
