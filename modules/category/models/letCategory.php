<?php

namespace app\modules\category\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['root', 'lft', 'rgt', 'level'], 'integer'],
            [['lft', 'rgt', 'level'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('category', 'ID'),
            'root' => Yii::t('category', 'Root'),
            'lft' => Yii::t('category', 'Lft'),
            'rgt' => Yii::t('category', 'Rgt'),
            'level' => Yii::t('category', 'Level'),
        ];
    }
}
