<?php

namespace app\modules\category\models;

class letCategoryQuery extends \yii\db\ActiveQuery
{
    public function behaviors() {
        return [
            'NestedSetBehavior' => [
                'class' => 'app\modules\category\behaviors\nestedset\NestedSetQuery',                
                'hasManyRoots' => true
            ]
        ];
    }
}
