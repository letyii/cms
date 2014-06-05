<?php

namespace app\modules\config\models\base;

use Yii;

/**
 * This is the model class for table "letyii_config".
 *
 * @property string $name
 * @property string $value
 * @property string $type
 */
class LetConfigBase extends \app\components\ActiveRecord
{
    public static function getModule() {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['type'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'value' => 'Value',
            'type' => 'Type',
        ];
    }
}
