<?php

namespace app\modules\test\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%test}}".
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
class BaseLetTest extends \app\components\ActiveRecord
{

    /**
     * Get Module Name
     * @return string
     */
    public static function getModule() {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required', 'on' => self::SCENARIO_DEFAULT],
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
    public function scenarios()
    {
        return array_replace_recursive(Model::scenarios(), [
            'search' => ["id","title","image","intro","content","author","source","tags","from_time","to_time","seo_title","seo_url","seo_desc","creator","create_time","editor","update_time","promotion","status"],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'intro' => 'Intro',
            'content' => 'Content',
            'author' => 'Author',
            'source' => 'Source',
            'tags' => 'Tags',
            'from_time' => 'From Time',
            'to_time' => 'To Time',
            'seo_title' => 'Seo Title',
            'seo_url' => 'Seo Url',
            'seo_desc' => 'Seo Desc',
            'creator' => 'Creator',
            'create_time' => 'Create Time',
            'editor' => 'Editor',
            'update_time' => 'Update Time',
            'promotion' => 'Promotion',
            'status' => 'Status',
        ];
    }

    public function search($params)
    {
        $query = LetTest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) AND $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from_time' => $this->from_time,
            'to_time' => $this->to_time,
            'creator' => $this->creator,
            'create_time' => $this->create_time,
            'editor' => $this->editor,
            'update_time' => $this->update_time,
            'promotion' => $this->promotion,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_url', $this->seo_url])
            ->andFilterWhere(['like', 'seo_desc', $this->seo_desc]);

        return $dataProvider;
    }
}
