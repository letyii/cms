<?php

namespace app\components;

use yii\grid\GridView;

class BackendGridView extends GridView {
        
    public $layout = "{items}\n{pager}";
    
}
