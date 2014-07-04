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
    public function init() {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function afterFind() {
        $cacheKey = self::tableName() . ':findOne:' . $this->primaryKey;
        $cached = Yii::$app->cache->get($cacheKey);
        if ($cached === FALSE) {
            // Category
            if (property_exists($this, 'category_id')) {
                $this->category_id = (new \yii\db\Query())
                        ->select('category_id')
                        ->from('{{%' . $this->moduleName() . '_category}}')
                        ->where('item_id = :item_id', [':item_id' => $this->primaryKey])
                        ->all();
                $this->category_id = ArrayHelper::map($this->category_id, 'category_id', 'category_id');
                $this->category_id = array_values($this->category_id);
            }

            Yii::$app->cache->set($cacheKey, $this);
        } else {
            if (property_exists($this, 'category_id')) {
                $this->category_id = $cached->category_id;
            }
        }
        parent::afterFind();
    }

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
    public function afterSave($insert, $changedAttributes) {
        $cacheKey = self::tableName() . ':findOne:' . $this->primaryKey;
        Yii::$app->cache->delete($cacheKey);

        parent::afterSave($insert, $changedAttributes);
    }

    private function isCategory() {
        if (empty($this->category_id) OR ! is_array($this->category_id))
            $this->category_id = [];

        $sql = "DELETE FROM {{%" . $this->moduleName() . "_category}} WHERE item_id = '" . $this->primaryKey . "'";
        Yii::$app->db->createCommand($sql)->query();

        foreach ($this->category_id as $category_id) {
            $sql = "INSERT INTO {{%" . $this->moduleName() . "_category}} (item_id, category_id) VALUES('" . $this->primaryKey . "', '" . $category_id . "')";
            Yii::$app->db->createCommand($sql)->query();
        }
    }

}
