<?php

namespace app\modules\cms\controllers\backend;

use Yii;
use app\components\BackendController;
use yii\helpers\Json;

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

    public function actionDeleteselectedrows()
    {
        $ids = Yii::$app->request->post('ids');
        $ids = Json::decode($ids);
        $ids = implode(',', $ids);
        $table = Yii::$app->request->post('table');
        $sql = "DELETE FROM ".$table." WHERE id IN(".$ids.")";
        Yii::$app->db->createCommand($sql)->query();
        echo 1;
    }
}
