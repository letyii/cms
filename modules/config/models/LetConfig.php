<?php

namespace app\modules\config\models;

use Yii;
use yii\helpers\ArrayHelper;

class LetConfig extends base\LetConfigBase {

    private $defaultConfigs = [];

    /**
     * Get value by key
     * @param string $key
     * @param string $defaultValue
     * @return string
     */
    public static function get($key, $defaultValue = '') {
        $model = self::findOne($key);
        if ($model === null) {
            $model = new self;
            $model->name = $key;
            $config = self::getDefault($key);

            if (!empty($config)) {
                $model->value = $config['value'];
                $model->type = $config['type'];
            } else {
                $model->value = '';
                $model->type = 'string';
            }
            if ($model->save())
                return $config['value'];
            else
                return $defaultValue;
        } else {
            if ($model->type == 'string')
                return $model->value;
            elseif ($model->type == 'int')
                return (eval('return (' . $model->value . ');'));
        }
    }

    /**
     * Get default value from config file module
     * @param string $key
     * @return mixed
     */
    public static function getDefault($key) {
        $keys = explode('.', $key);
        if (isset($keys[1])) {
            $module = $keys[0];
            $moduleConfig = require(__DIR__ . '/../../' . $module . '/config/default.php');
            return $config = ArrayHelper::getValue($moduleConfig, $key, NULL);
        }
        else
            return FALSE;
    }

}
