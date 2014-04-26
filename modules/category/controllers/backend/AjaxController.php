<?php

namespace app\modules\category\controllers\backend;

use Yii;
use app\modules\category\models\letCategory;
use app\modules\category\models\base\letCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for letCategory model.
 */
class DefaultController extends Controller
{

    /**
     * Lists all letCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
    }

}
