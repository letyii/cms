<?php

namespace app\modules\category\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LetCategorySearch represents the model behind the search form about `app\modules\category\models\LetCategory`.
 */
class LetCategorySearch extends LetCategory
{
    public function rules()
    {
        return [
            [['id', 'root', 'lft', 'rgt', 'level'], 'integer'],
            [['title', 'module'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = LetCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'root' => $this->root,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'module', $this->module]);

        return $dataProvider;
    }
}
