<?php

namespace app\modules\category\models\base;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\category\models\letCategory;

/**
 * letCategorySearch represents the model behind the search form about `app\modules\category\models\letCategory`.
 */
class letCategorySearch extends letCategory
{
    public function rules()
    {
        return [
            [['id', 'root', 'lft', 'rgt', 'level'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = letCategory::find();

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

        return $dataProvider;
    }
}
