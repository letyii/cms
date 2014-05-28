<?php
namespace app\components;

use Yii;

class ActiveRecord extends \yii\db\ActiveRecord {
//
//    public $creator;
//
//    public $created_time;
//
//    public $editor;
//
//    public $updated_time;

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        $attributes = array_keys($this->getAttributes());
        $now = date('Y-m-d H:i:s', time());

        if (in_array('update_time', $attributes))
            $this->update_time = $now;
        if (in_array('editor', $attributes))
            $this->editor = Yii::$app->user->id;
        if ($this->isNewRecord) {
            if (in_array('creator', $attributes))
                $this->creator = Yii::$app->user->id;
            if (in_array('create_time', $attributes))
                $this->create_time = $now;
        }
        return parent::beforeSave($insert);
    }
}
