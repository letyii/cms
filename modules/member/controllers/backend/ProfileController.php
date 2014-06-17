<?php

namespace app\modules\member\controllers\backend;

use Yii;
use app\components\BackendController;
use app\modules\member\models\LetUser;
use app\modules\member\models\LetAuthItem;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class ProfileController extends BackendController
{
    public function actionIndex()
    {
        echo 123;
    }

    public function actionPassword()
    {
        $id = Yii::$app->request->get('id');
        if (empty($id))
            return $this->redirect(['backend/profile/index']);

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) AND $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('password', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LetUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
