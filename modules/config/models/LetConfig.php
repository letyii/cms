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
        $configs = self::getListFromDb();
        if (!isset($configs[$key])) { // Neu khong ton tai key trong db
            $config = self::getDefault($key); // Tim trong file config cua module xem co khong
            if (!empty($config)) { // Co trong file config cua module
                $model = new self;
                $model->name = $key;

                $model->value = (string) $config['value'];
                $model->type = $config['type'];
                var_dump($model->save());
                return self::getValueByType($config['value'], $config['type']);
            } else return $defaultValue; // Khong co trong file config cua module
        } else { // Neu ton tai key trong db
            return self::getValueByType($configs[$key]['value'], $configs[$key]['type']);
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

    /**
     * Get configs from db
     * @param boolean $noCache
     * @return array
     */
    public static function getListFromDb($noCache = FALSE) {
        $result = [];
        $configs = self::find()->asArray()->all();
        foreach ($configs as $config) {
            $result[$config['name']] = [
                'value' => $config['value'],
                'type' => $config['type'],
            ];
        }
        return $result;
    }

    /**
     * get value by type
     * @param string $value
     * @param string $type
     * @return mixed
     */
    private static function getValueByType($value, $type = 'string') {
        if ($type == 'string')
            return $value;
        elseif ($type == 'int')
            return (eval('return (' . $value . ');'));
        else return FALSE;
    }

}
