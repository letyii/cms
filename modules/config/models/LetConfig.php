<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>, Trinh Ke Thanh <trinh.kethanh@gmail.com>
 */

namespace app\modules\config\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class LetConfig extends base\LetConfigBase {

    private static $cacheListFromDb = 'config.ListFromDb';
    
    private static $cacheModuleList = 'config.ModuleList';

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        Yii::$app->cache->delete(self::$cacheListFromDb);
        Yii::$app->cache->delete(self::$cacheModuleList);
        return parent::beforeSave($insert);
    }
    
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
                $model->save();
                
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
        $configs = Yii::$app->cache->get(self::$cacheListFromDb);
        if ($configs === FALSE OR $noCache === TRUE) {
            $configs = self::find()->asArray()->all();
            Yii::$app->cache->set(self::$cacheListFromDb, $configs);
        }
        
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
    
     /**
     * get list module from table config
     * @return array
     */
    public static function getModuleList($noCache = FALSE) {
        $module = Yii::$app->cache->get(self::$cacheModuleList); 
        if ($module === FALSE OR $noCache === TRUE) {
            $sql = "SELECT DISTINCT SUBSTRING(name, 1, INSTR(name, '.') - 1) as module FROM `letyii_config`";
            $module = Yii::$app->db->createCommand($sql)->queryAll();
            if (empty($module))
                return false;
            Yii::$app->cache->set(self::$cacheModuleList, $module);
        }
        return $module;
    }
    
    public static function filter($module = '', $keyword = '') {
        $data = self::find();
        if (!empty($module) AND in_array($module, self::getModuleList())) {
            $data->andWhere('name LIKE :module', [':module' => $module . '.%']);
        }
        if (!empty($keyword)) {
            $data->andWhere('name LIKE :keyword', [':keyword' => '%.%' . $keyword . '%']);
        }
        return $data->asArray()->all();
    }

    public static function asDataAutocomplete ($data, $attribute) {
        $result = [];
        foreach ($data as $item) {
            if (isset($item[$attribute])) {
                $config = explode('.', $item[$attribute]);
                if (isset($config[1]))
                    $result[] = $config[1];
                else
                    $result[] = $config[0];
            }
        }
        return $result;
    }

    /**
     * Save all data
     * @param array $dataDb is data get from DB
     * @param array $dataPost is data get from $_POST
     */
    public static function saveAll ($dataDb, $dataPost) {
        foreach ($dataDb as $config) {
            if (!isset($dataPost[$config['name']])) // Gia tri cua name trong db khong ton tai tren form thi bo qua
                continue;
            if (in_array($config['type'], ['text', 'textarea'])) { // Truong hop luu dang text va textarea
                $valueToDb = Html::encode($dataPost[$config['name']]);
            } elseif ($config['type'] == 'dropdown') { // Truong hop luu dang dropdown
                $valueDb = Json::decode($config['value']);
                foreach ($valueDb as $optionNameDb => $optionValueDb) { // Xu ly tung Option lay trong db cua moi config
                    if ($dataPost[$config['name']] == $optionNameDb)
                        $valueToDb[$optionNameDb] = TRUE;
                    else
                        $valueToDb[$optionNameDb] = FALSE;
                }
                $valueToDb = Json::encode($valueToDb);
            } elseif ($config['type'] == 'checkbox') { // Truong hop luu dang checkbox
                $valueDb = Json::decode($config['value']);
                foreach ($valueDb as $optionNameDb => $optionValueDb) { // Xu ly tung Option lay trong db cua moi config
                    if (in_array($optionNameDb, $dataPost[$config['name']]))
                        $valueToDb[$optionNameDb] = TRUE;
                    else
                        $valueToDb[$optionNameDb] = FALSE;
                }
                $valueToDb = Json::encode($valueToDb);
            }
            $model = self::findOne($config['name']);
            $model->value = $valueToDb;
            $model->save();
            unset($valueToDb);
        }
    }
}