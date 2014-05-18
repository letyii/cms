<?php

namespace app\components;

use yii\grid\GridView;
use yii\helpers\Html;

class BackendGridView extends GridView {
    public $title = 'Table list';
            
    public $layout = "
        <div class='widget'>\n
            <div class='widget-head'>\n
                <div class='pull-left'><h5>{title}</h5></div>\n
                <div class='pull-right'>{pager}</div>\n
                <div class='clearfix'></div>\n
            </div>\n
            <div class='widget-body no-padd'><div class='table-responsive'>{items}</div></div>\n
            <div class='widget-foot'>\n
                <div class='pull-left'>{summary}</div>\n
                <div class='pull-right'>{pager}</div>\n
                <div class='clearfix'></div>\n
            </div>\n
        </div>\n";
    
    /**
     * @inheritdoc
     */
    public function renderSection($name)
    {
        switch ($name) {
            case '{title}':
                return $this->title;
            case '{summary}':
                return $this->renderSummary();
            case '{items}':
                return $this->renderItems();
            case '{pager}':
                return $this->renderPager();
            case '{sorter}':
                return $this->renderSorter();
            default:
                return false;
        }
    }
}
