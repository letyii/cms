<?php

namespace app\modules\article\models;

use Yii;

/**
 * This is the model class for table "letyii_article".
 *
 * @property string $id
 * @property string $title
 * @property string $image
 * @property string $intro
 * @property string $content
 * @property string $author
 * @property string $source
 * @property string $tags
 * @property string $from_time
 * @property string $to_time
 * @property string $seo_title
 * @property string $seo_url
 * @property string $seo_desc
 * @property string $creator
 * @property string $create_time
 * @property string $editor
 * @property string $update_time
 * @property integer $promotion
 * @property integer $status
 */
class BaseLetArticle extends \app\components\ActiveRecord
{
    /**
     * Get Module Name
     * @return string
     */
    public static function moduleName() {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['from_time', 'to_time', 'create_time', 'update_time'], 'safe'],
            [['creator', 'editor', 'promotion', 'status'], 'integer'],
            [['title', 'image', 'author', 'source', 'seo_url'], 'string', 'max' => 255],
            [['intro', 'tags'], 'string', 'max' => 500],
            [['seo_title'], 'string', 'max' => 70],
            [['seo_desc'], 'string', 'max' => 160]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('article', 'ID'),
            'title' => Yii::t('article', 'Title'),
            'image' => Yii::t('article', 'Image'),
            'intro' => Yii::t('article', 'Intro'),
            'content' => Yii::t('article', 'Content'),
            'author' => Yii::t('article', 'Author'),
            'source' => Yii::t('article', 'Source'),
            'tags' => Yii::t('article', 'Tags'),
            'from_time' => Yii::t('article', 'From Time'),
            'to_time' => Yii::t('article', 'To Time'),
            'seo_title' => Yii::t('article', 'Seo Title'),
            'seo_url' => Yii::t('article', 'Seo Url'),
            'seo_desc' => Yii::t('article', 'Seo Desc'),
            'creator' => Yii::t('article', 'Creator'),
            'create_time' => Yii::t('article', 'Create Time'),
            'editor' => Yii::t('article', 'Editor'),
            'update_time' => Yii::t('article', 'Update Time'),
            'promotion' => Yii::t('article', 'Promotion'),
            'status' => Yii::t('article', 'Status'),
        ];
    }

//    public function deleteItemCategory($item_id) {
//        \app\modules\article\models\LetArticleCategory::deleteAll(['item_id' => $item_id]);
//    }
}
