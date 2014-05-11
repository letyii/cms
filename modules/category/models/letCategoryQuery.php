<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

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
