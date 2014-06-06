<?php
namespace app\components;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class ActionColumn extends \kartik\grid\ActionColumn {

    private $_isDropdown = false;

    public $template = '{view} {update} {delete}';

    /**
     * Initializes the default button rendering callbacks
     */
    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model) {
                $options = $this->viewOptions;
                $title = Yii::t('kvgrid', 'View');
                $icon = '<span class="glyphicon glyphicon-eye-open"></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $options += ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0'];
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, $url, $options) . '</li>' . PHP_EOL;
                }
                else {
                    return Html::a($label, $url, $options);
                }
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                if (Yii::$app->user->can($model->getModule() . '.update', ['post' => $model])) {
                    $options = $this->updateOptions;
                    $title = Yii::t('kvgrid', 'Update');
                    $icon = '<span class="glyphicon glyphicon-pencil"></span>';
                    $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                    $options += ['title' => Yii::t('yii', 'Update'), 'data-pjax' => '0'];
                    if ($this->_isDropdown) {
                        $options['tabindex'] = '-1';
                        return '<li>' . Html::a($label, $url, $options) . '</li>' . PHP_EOL;
                    }
                    else {
                        return Html::a($label, $url, $options);
                    }
                }
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                if (Yii::$app->user->can($model->getModule() . '.delete', ['post' => $model])) {
                    $options = $this->deleteOptions;
                    $icon = '<span class="glyphicon glyphicon-trash"></span>';
                    $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                    $options += [
                        'title' => Yii::t('yii', 'Delete'),
                        'style' => 'cursor: pointer',
                        'href' => 'javascript:void(0);',
                        'onclick' => "deleteRow('".Url::to(['/cms/backend/crud/delete'])."', '".$model->tableName()."', '".$model->id."');",
                    ];
                    return Html::a($label, NULL, $options);
                }
            };
        }
    }
}