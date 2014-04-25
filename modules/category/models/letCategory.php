<?php

namespace app\modules\category\models;

use Yii;
use app\modules\category\models\letCategoryQuery;

/**
 * This is the model class for table "letyii_category".
 *
 * @property string $id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 */
class letCategory extends base\letCategoryBase
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'letyii_category';
    }
    
    public function behaviors() {
        return [
            'NestedSetBehavior' => [
                'class' => 'app\modules\category\behaviors\nestedset\NestedSet',
                'hasManyRoots' => true
            ]
        ];
    }
    
    public static function find()
    {
        return new letCategoryQuery(get_called_class());
    }
      
}
