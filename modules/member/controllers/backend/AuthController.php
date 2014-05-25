<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\modules\member\controllers\backend;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\components\BackendController;
use app\models\LoginForm;
use app\models\ContactForm;

class AuthController extends BackendController
{

    public function actionIndex()
    {
        echo 111;
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) AND $model->login()) {
            return $this->goBack();
        } else {
            $this->layout = '/login';
            return $this->render('login', [
                'model' => $model, // $model ko nhan gia tri moi, ma luon lay gia tri mac dinh. Dang tim hieu them.
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['backend/auth/login']);
    }
}
