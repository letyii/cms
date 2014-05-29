<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Mai Ba Duy <maibaduy@gmail.com>
 */

namespace app\modules\member\models;

use yii\helpers\ArrayHelper;

class LetAuthItem extends base\LetAuthItemBase {

    const TYPE_ROLE = 1;
    const TYPE_PERMISSION = 2;

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['name'], 'unique'],
            ]
        );
    }

    public static function assignEnable($item, $type = NULL)
    {
        $ignoreItems = LetAuthItemChild::getAncestors([$item]);
        $ignoreItems[] = $item;
        $listItems = self::find()->select(['name','type'])
            ->where(['not in', 'name', $ignoreItems]);
        if (!empty($type))
            $listItems = $listItems->andWhere('type = :type', [':type' => $type]);
        $listItems = $listItems->orderBy('type ASC')->asArray()->all();
        return $listItems;
    }

    /**
     * @param
     * @return array $roles
     */
    public static function getItems($type = null)
    {
        return self::find()->select(['name','type'])->where(['type' => $type])->asArray()->all();
    }
}
