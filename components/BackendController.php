<?php

namespace app\components;

use Yii;
use yii\web\Controller;
use yii\base\Action;
use yii\base\ActionFilter;

class BackendController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }
    
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
//        ];
//    }
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest AND !($action->controller->module->id == 'member' AND $action->controller->id == 'backend/auth' AND $action->id == 'login')) {
//            echo 111; die;
//            \yii\web\User::setReturnUrl(\Yii::$app->request->getAbsoluteUrl());
            return $this->redirect(\Yii::$app->urlManager->createUrl(['member/backend/auth/login']));
        }
        
        
//        $user = Yii::$app->getUser();
//        echo '<pre>'; var_dump(\Yii::$app->request->getAbsoluteUrl()); echo '</pre>'; return false;

//        // Truong hop co module
//		$controller = $action->controller;
//		if ($controller->module !== null) {
//			if ($user->checkAccess($this->getItemName($controller->module) . $this->separator . '*', $this->params)) {
//				return true;
//			}
//		}
//
//		if ($user->checkAccess($this->getItemName($controller) . $this->separator . '*', $this->params)) {
//			return true;
//		}
//
//		if ($user->checkAccess($itemName = $this->getItemName($action), $this->params)) {
//			return true;
//		}
//
//		if (isset($this->denyCallback)) {
//			call_user_func($this->denyCallback, $itemName, $action);
//		} else {
//			$this->denyAccess($user);
//		}
        
        return parent::beforeAction($action);
    }

}
