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

    public function beforeSave($insert) {
        if (isset($this->updated_time))
            $this->updated_time = date('Y-m-d H:i:s', time());
        if (isset($this->editor))
            $this->editor = Yii::$app->user->id;
        if ($this->isNewRecord) {
            if (isset($this->creator) AND isset($this->editor))
                $this->creator = $this->editor;
            if (isset($this->updated_time) AND isset($this->created_time))
                $this->created_time = $this->updated_time;
        }
        return parent::beforeSave($insert);
    }
}
