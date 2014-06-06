<?php

namespace app\components;

use Yii;

class BooleanColumn extends \kartik\grid\BooleanColumn {

    public function init() {
        if (empty($this->trueLabel)) {
            $this->trueLabel = Yii::t('yii', 'Yes');
        }
        if (empty($this->falseLabel)) {
            $this->falseLabel = Yii::t('yii', 'No');
        }
        parent::init();
    }

}
