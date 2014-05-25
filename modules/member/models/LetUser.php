<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Mai Ba Duy <maibaduy@gmail.com>
 */

namespace app\modules\member\models;

use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class LetUser extends base\LetUserBase
{
    public function search($params)
    {
        $query = LetUser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'updated_time' => $this->updated_time,
        ]);

        /*$query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
        ->andFilterWhere(['like', 'intro', $this->intro])
        ->andFilterWhere(['like', 'content', $this->content])
        ->andFilterWhere(['like', 'author', $this->author])
        ->andFilterWhere(['like', 'source', $this->source])
        ->andFilterWhere(['like', 'tags', $this->tags])
        ->andFilterWhere(['like', 'seo_title', $this->seo_title])
        ->andFilterWhere(['like', 'seo_url', $this->seo_url])
        ->andFilterWhere(['like', 'seo_desc', $this->seo_desc]);*/

        return $dataProvider;
    }
}
