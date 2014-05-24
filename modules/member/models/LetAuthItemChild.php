<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>, CongTS <congts.vn@gmail.com>
 */

namespace app\modules\member\models;

use Yii;

class LetAuthItemChild extends base\LetAuthItemChildBase
{
    public static function getAncestors($items = [], $result = []) {
        // Get parent list of $item
        $list = self::find()->select('parent')->where(['child' => $items])->asArray()->all();
        $list = \yii\helpers\ArrayHelper::map($list, 'parent', 'parent');
        $result += $list;
        if (!empty($list)) {
            return self::getAncestors($list, $result);
        } else {
            return $result;
        }
    }
}
