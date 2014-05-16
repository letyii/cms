<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\modules\config\models;

use Yii;
use app\modules\config\models\LetConfig;

/**
 * LoginForm is the model behind the login form.
 */
class ConfigForm extends LetConfig
{
    public $module;
    
    public $key;
    
//    public $saveType = 1; // 1 - save to list | 0 - apply to edit


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'module', 'key'], 'required'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['type'], 'string', 'max' => 20]
        ];
    }
}
