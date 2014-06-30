<?php

namespace app\modules\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%article_category}}".
 *
 * @property string $id
 * @property string $item_id
 * @property string $category_id
 */
class BaseLetArticleCategory extends \app\components\ActiveRecord
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
        return '{{%article_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'category_id'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['item_id', 'category_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return array_replace_recursive(Model::scenarios(), [
            'search' => ["id","item_id","category_id"],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'category_id' => 'Category ID',
        ];
    }

    public function search($params)
    {
        $query = LetArticleCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) AND $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'item_id' => $this->item_id,
            'category_id' => $this->category_id,
        ]);

        return $dataProvider;
    }
}
