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
 * @property string $title
 * @property string $module
 */
class BaseLetCategory extends \app\components\ActiveRecord
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
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['module'], 'string', 'max' => 50]
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
            'title' => Yii::t('category', 'Title'),
            'module' => Yii::t('category', 'Module'),
        ];
    }
}
