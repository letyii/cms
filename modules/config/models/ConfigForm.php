<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>, Trinh Ke Thanh <trinh.kethanh@gmail.com>
 */

namespace app\modules\config\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ConfigForm extends Model
{
    public $type;
    public $module;
    public $key;
    public $value;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['module', 'key'], 'required'],
        ];
    }
}
