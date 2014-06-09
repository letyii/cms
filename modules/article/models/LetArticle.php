<?php
namespace app\modules\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\article\models\base\LetArticleBase;
use app\modules\member\models\LetUser;

/**
 * LetArticle represents the model behind the search form about `app\modules\article\models\base\LetArticleBase`.
 */
class LetArticle extends LetArticleBase
{

    public $category_id = [];

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $data = parent::attributeLabels();
        $data['category_id'] = Yii::t('category', 'Category');
        return $data;
    }

    public function rules() {
        $data = [
            [['title'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['content'], 'string'],
            [['from_time', 'to_time', 'create_time', 'update_time'], 'safe'],
            [['creator', 'editor', 'promotion', 'status'], 'integer'],
            [['title', 'image', 'author', 'source', 'seo_url'], 'string', 'max' => 255],
            [['intro', 'tags'], 'string', 'max' => 500],
            [['seo_title'], 'string', 'max' => 70],
            [['seo_desc'], 'string', 'max' => 160],
            [['category_id'], 'safe'],
        ];
        return array_merge(parent::rules(), $data);
    }

    public function scenarios()
    {
        return array_replace_recursive(Model::scenarios(), [
            'search' => ['title', 'creator', 'status'],
        ]);
    }

    public function search($params)
    {
        $query = LetArticle::find();

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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatorBy()
    {
        return $this->hasOne(LetUser::className(), ['id' => 'creator']);
    }
}
