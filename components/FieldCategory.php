<?php

namespace app\components;

use Yii;
use yii\helpers\Html;
use app\modules\category\models\LetCategory;

class FieldCategory extends \yii\widgets\InputWidget {

    public function init() {
    }

	/**
	 * Renders the widget.
	 */
	public function run() {
        $categories = LetCategory::getCategory($this->model->moduleName(), '-- ');
        echo Html::activeCheckboxList($this->model, $this->attribute, $categories, $this->options);
	}
}
