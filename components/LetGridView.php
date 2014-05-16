<?php

namespace app\components;

use yii\grid\GridView;

class LetGridView extends GridView {
        
    public $layout = "{items}\n{pager}";
    
}
