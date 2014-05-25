<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>, CongTS <congts.vn@gmail.com>
 */

namespace app\modules\member\models;

use yii\helpers\ArrayHelper;

use Yii;

class LetAuthItemChild extends base\LetAuthItemChildBase
{
    public static function getAncestors($items = [], $result = []) {
        // Get parent list of $item
        $list = self::find()->select('parent')->where(
            ['in', 'child', $items])->asArray()->all();
        $list = ArrayHelper::map($list, 'parent', 'parent');
        $list = array_values($list);
        $result = array_merge($result, $list);
        if (!empty($list)) {
            return self::getAncestors($list, $result);
        } else {
            return $result;
        }
    }

    public static function deleteChild($parent) {
        self::deleteAll('parent = :parent', [':parent' => $parent]);
    }
}
