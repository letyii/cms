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
    public function afterFind() {
        if (property_exists($this, 'category_id')) {
            $this->category_id = (new \yii\db\Query())
                    ->select('category_id')
                    ->from('{{%' . $this->getModule() . '_category}}')
                    ->where('item_id = :item_id', [':item_id' => $this->primaryKey])
                    ->all();
            $this->category_id = ArrayHelper::map($this->category_id, 'category_id', 'category_id');
            $this->category_id = array_values($this->category_id);
            parent::afterFind();
        }
    }

    public function init() {
        parent::init();
    }

    /**
     * @inheritdoc
     */
//    public static function findOne($condition) {
//        if (ArrayHelper::isAssociative($condition)) {
//            return parent::findOne($condition);
//        } else {
//            $cacheKey = self::tableName() . ':findOne:' . $condition;
//            $cached = Yii::$app->cache->get($cacheKey);
//            if ($cached === FALSE) {
//                $cached = parent::findOne($condition);
//                Yii::$app->cache->set($cacheKey, $cached);
//            }
//            return $cached;
//        }
//    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        $attributes = array_keys($this->getAttributes());

        if (property_exists($this, 'category_id')) {
            $this->isCategory();
        }

        // Upload image
        if (in_array('image', $attributes)) {
            $this->image = \yii\web\UploadedFile::getInstance($this, 'image');
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

    private function isCategory() {
        if (empty($this->category_id) OR ! is_array($this->category_id))
            $this->category_id = [];

        $sql = "DELETE FROM {{%" . $this->getModule() . "_category}} WHERE item_id = '" . $this->primaryKey . "'";
        Yii::$app->db->createCommand($sql)->query();

        foreach ($this->category_id as $category_id) {
            $sql = "INSERT INTO {{%" . $this->getModule() . "_category}} (item_id, category_id) VALUES('" . $this->primaryKey . "', '" . $category_id . "')";
            Yii::$app->db->createCommand($sql)->query();
        }
    }

}
