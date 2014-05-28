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
    public function rules()
    {
        return [
            [['id', 'creator', 'editor', 'promotion', 'status'], 'integer'],
            [['title', 'image', 'intro', 'content', 'author', 'source', 'tags', 'from_time', 'to_time', 'seo_title', 'seo_url', 'seo_desc', 'created_time', 'updated_time'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = LetArticle::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from_time' => $this->from_time,
            'to_time' => $this->to_time,
            'creator' => $this->creator,
            'created_time' => $this->created_time,
            'editor' => $this->editor,
            'updated_time' => $this->updated_time,
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
        $data = $this->hasOne(LetUser::className(), ['id' => 'creator']);
//        var_dump($data); die;
        return $data;
    }
}
