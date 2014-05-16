<?php

namespace app\components;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;

class LetActionColumn extends ActionColumn {
    
    public $template = '{update} {view} {delete}';

    /**
     * Initializes the default button rendering callbacks
     */
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model) {
                return Html::a('<i class="fa fa-times"></i>', $url, [
                    'class' => 'btn btn-xs btn-info',
                    'title' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                ]);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                return Html::a('<i class="fa fa-pencil"></i>', $url, [
                    'class' => 'btn btn-xs btn-danger',
                    'title' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                ]);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                return Html::a('<i class="fa fa-trash-o"></i>', $url, [
                    'class' => 'btn btn-xs btn-success',
                    'title' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            };
        }
    }
    
}
