<?php
namespace app\components;

use Yii;
use app\components\LetHelper;
use app\helpers\FileHelper;
use yii\helpers\ArrayHelper;

class ActiveRecord extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function findOne($condition)
    {
        if (ArrayHelper::isAssociative($condition)) {
            return self::findOne($condition);
        } else {
            $cacheKey = 'ActiveRecord:findOne:' . $condition;
            $cached = Yii::$app->cache->get($cacheKey);
            if ($cached === FALSE) {
                $cached = parent::findOne($condition);
                Yii::$app->cache->set($cacheKey, $cached);
            }
            return $cached;
        }
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        $attributes = array_keys($this->getAttributes());

        // Upload image
        if (in_array('image', $attributes)) {
            $this->image = \yii\web\UploadedFile::getInstance($this,'image');
            $ext = FileHelper::getExtention($this->image);
            if (!empty($ext)) {
                $fileDir = Yii::$app->controller->module->id . '/' . date('Y/m/d/');
                $fileName = LetHelper::string_to_url($this->title) . '.' . $ext;
                $folder = Yii::$app->params['uploadPath'] . '/' . Yii::$app->params['uploadDir'] . '/' . $fileDir;
                FileHelper::createDirectory($folder);
                $this->image->saveAs($folder . $fileName);
                $this->image = $fileDir . $fileName;
            }
        }

        // creator, editor and time
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

    /**
     * @inheritdoc
     */
    public function afterSave($insert) {
        $cacheKey = 'ActiveRecord:findOne:' . $this->primaryKey;
        Yii::$app->cache->delete($cacheKey);

        parent::afterSave($insert);
    }

}
